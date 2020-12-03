<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransfEnvRequest;
use App\Lugar;
use App\Producto;
use App\TransfEnviada;
use App\Transf_Env_Prod;
use App\Transportacion;
use App\Traza;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransfEnviadaController extends Controller
{
    public function index($id)
    {
        $this->authorize('view',new TransfEnviada);
        //$todas = TransfEnviada::all();
        $transportacion = Transportacion::find($id);   
        return view('tenviada.index',compact('transportacion'));
    }

    public function index2()
    {
        $this->authorize('view',new TransfEnviada);
        return view('trecibida.index')->with('tranferencias',TransfEnviada::recibidas()->get());
    }

    public function create($id)
    {
        $this->authorize('create',new TransfEnviada);
        $transfer = new TransfEnviada;
        $lugares = Lugar::activos()->get();
        return view('tenviada.create',compact('id','transfer','lugares'));
    }

    public function store(StoreTransfEnvRequest $request,$id)
    {
        $this->authorize('create',new Transportacion);
        $data = $request->all();

        if(Carbon::parse($request['fyh_salida'])->isAfter(Carbon::now())){
            return redirect()->route('tenv.create',$id)->with('demo','La fecha introducida debe ser menor a la fecha actual');
        }
        //dd($data = request()->all());

        $transf = TransfEnviada::create([
            'fyh_salida'=> Carbon::parse($data['fyh_salida']),
            'num_fact'=> $data['num_fact'],
            'origen_id'=> $data['origen_id'],
            'destino_id'=> $data['destino_id'],
            'transportacion_id'=>$id,
        ]);
        if ($transf) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Transferencia número {$transf->num_fact} creada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return redirect()->route('tenv.llenar',$transf)->with('success','Transferencia creada con éxito');
        }
        return back()->withInput()->with('demo','Error al crear la transferencia');
    }

    public function show(TransfEnviada $transferencia)
    {
        $this->authorize('view',new TransfEnviada);
        return view('tenviada.show',compact('transferencia'));
    }

    public function edit($id)
    {
        $this->authorize('update',new TransfEnviada);     
        $transfEnviada = TransfEnviada::find($id);
        $lugares = Lugar::activos()->get();
        return view('tenviada.edit',compact('transfEnviada','lugares'));
    }

    public function update(StoreTransfEnvRequest $request, TransfEnviada $transfEnviada)
    {
        //no tiene validaciones por php
        $this->authorize('update',new TransfEnviada);     
        $data = $request->all();

        //si la fecha viene llena
        if ($request['fyh_salida']) {
            if(Carbon::parse($request['fyh_salida'])->isAfter(Carbon::now())){
            return redirect()->route('tenv.edit',$transfEnviada)->with('demo','La fecha introducida debe ser menor a la fecha actual');
             }
            $transfEnviada->update($data);
        }
        //si la fecha viene vacia
        else
        {
            $data['fyh_salida']= $transfEnviada->fyh_salida;
            //dd($data);
            $transfEnviada->update($data);
        }
        //$transfEnviada->update($request->all());
        if ($transfEnviada) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Actualizado transferencia número {$transfEnviada->num_fact} por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
            return redirect()->route('home')->with('success','Transferencia actualizada con éxito');
        }
    }

    public function editRecibo($id)
    {
        $this->authorize('update',new TransfEnviada);     
        $transfEnviada = TransfEnviada::find($id);
        return view('trecibida.recibir',compact('transfEnviada'));
    }

    public function updateRecibo(Request $request, TransfEnviada $transfEnviada)
    {
        //no tiene validaciones por php
        $this->authorize('update',new TransfEnviada);     
        $data = request()->validate([
        'fyh_llegada'=>'required',
        ],
        [   
            'fyh_llegada.required'=>'Debe seleccionar la fecha',
        ]);

        if(Carbon::parse($request['fyh_llegada'])->isAfter(Carbon::now()))
        {
            return redirect()->route('tenv.recibir',$transfEnviada)->with('demo','La fecha introducida debe ser menor a la fecha actual');
         }elseif (Carbon::parse($request['fyh_llegada']) < (Carbon::parse($transfEnviada->fyh_salida)) ) {
             return redirect()->route('tenv.recibir',$transfEnviada)->with('demo','La fecha de llegada debe ser posterior a la fecha salida');
         }else{
             $transfEnviada->update($data); 
         }

        if ($transfEnviada) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Se recibió la transferencia número {$transfEnviada->num_fact} por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            //actualizar el estado de la transportacion
            $tranp = $transfEnviada->transportacion;
            $var = false;
            //dd($tranp->transfenviada->count());
            foreach ($tranp->transfenviada as $value) {
                if (is_null($value->fyh_llegada)) {
                    $var = true;
                }
            }
            if ($var) {
                return redirect()->route('home')->with('success','Transferencia recibida con éxito');
            }else{
                $tranp->terminada='1';
                $tranp->save();
                return redirect()->route('home')->with('success','Transferencia recibida con éxito');
            }
        }
    }

    public function detalles(TransfEnviada $transferencia)
    {
        $this->authorize('view',new TransfEnviada);
        return view('trecibida.show',compact('transferencia'));
    }

    public function destroy($id)
    {
        $this->authorize('delete',new TransfEnviada);
        $data = TransfEnviada::find($id);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        if ($data->transfenvprod->count()>0) {
            foreach ($data->transfenvprod as $producto) {
                Transf_Env_Prod::destroy($producto->id);
            }
        }
        $data->delete();

        Traza::create([
        'description'=> "La transferencia enviada número {$data->num_fact} ha sido eliminada por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return back()->with('success', 'La transferencia ha sido eliminada con éxito');
    }
}
