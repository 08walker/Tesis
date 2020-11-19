<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdTransfEnvRequest;
use App\Http\Requests\StoreTransfEnvRequest;
use App\Lugar;
use App\Producto;
use App\TransfEnviada;
use App\Transf_Env_Prod;
use App\Transportacion;
use App\Traza;
use Illuminate\Http\Request;

class TransfEnviadaController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Transportacion);
        $todas = TransfEnviada::all();        
        return view('tenviada.index',compact('todas'));
    }

    public function create($id)
    {
        $this->authorize('create',new Transportacion);
        $transfer = new TransfEnviada;
        $lugares = Lugar::activos()->get();
        return view('tenviada.create',compact('id','transfer','lugares'));
    }

    public function store(StoreTransfEnvRequest $request,$id)
    {
        $this->authorize('create',new Transportacion);
        $data = $request->all();

        //dd($data = request()->all());
        $transf = TransfEnviada::create([
            'fyh_salida'=> $data['fyh_salida'],
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

            return redirect()->route('tenv.llenar',$id)->with('success','Transferencia creada con éxito');
        }
        return back()->withInput()->with('error','Error al crear la transferencia');
    }

    public function show(TransfEnviada $transfEnviada)
    {
        //
    }

    public function edit(TransfEnviada $transfEnviada)
    {
        //
    }

    public function update(Request $request, TransfEnviada $transfEnviada)
    {
        //
    }

    public function destroy(TransfEnviada $transfEnviada)
    {
        //
    }

    public function llenar($id)
    {
        $transfer = new Transf_Env_Prod;
        $productos = Producto::activos()->get();
        return view('tenviada.llenar',compact('transfer','productos','id'));
    }

    public function storeproducto(StoreProdTransfEnvRequest $request,$id)
    {
        $data = request()->all();
        //$data = $request->all();

        $dat = Transf_Env_Prod::create([
            'cantidad_bultos'=> $data['cantidad_bultos'],
            'peso_kg'=> $data['peso_kg'],
            'volumen_m3'=> $data['volumen_m3'],
            'observacion'=> $data['observacion'],
            'producto_id'=> $data['producto_id'],
            'transf_enviada_id'=> $id,
        ]);
        if ($dat) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Producto {$dat->producto->name} añadido a la transferencia número {$dat->transfenviada->num_fact} creada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tenv');  

        }
        return back()->withInput()->with('errors','Error al llenar la transferencia');
    }
}
