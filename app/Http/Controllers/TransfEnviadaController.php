<?php

namespace App\Http\Controllers;

use App\Lugar;
use App\Producto;
use App\TransfEnviada;
use App\Transf_Env_Prod;
use App\Transportacion;
use App\Traza;
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

    public function create($id)
    {
        $this->authorize('create',new TransfEnviada);
        $transfer = new TransfEnviada;
        $lugares = Lugar::activos()->get();
        return view('tenviada.create',compact('id','transfer','lugares'));
    }

    public function store(Request $request,$id)
    {
        $this->authorize('create',new TransfEnviada);
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

    public function show(TransfEnviada $transferencia)
    {
        $this->authorize('view',new TransfEnviada);
        return view('tenviada.show',compact('transferencia'));
    }

    public function edit($id)
    {
        $this->authorize('update',new TransfEnviada);     
        // dd($id);
        $transfEnviada = TransfEnviada::find($id);
        //dd($transfEnviada);
        $lugares = Lugar::activos()->get();
        return view('tenviada.edit',compact('transfEnviada','lugares'));
    }

    public function update(StoreTransfEnvRequest $request, TransfEnviada $transfEnviada)
    {
        //no tiene validaciones por php
        $this->authorize('update',new TransfEnviada);     
        $transfEnviada->update($request->validated());
        if ($transfEnviada) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Actualizado transferencia número {$transfEnviada->num_fact} por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
            return redirect()->route('tenv.show',$transfEnviada)->with('success','Transferencia actualizada con éxito');
        }
    }

    public function destroy(TransfEnviada $transfEnviada)
    {
        $this->authorize('delete',new TransfEnviada);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $transfEnviada->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   //$transfEnviada->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El usuario {$nombre} intento borrar la transferencia enviada {$transfEnviada->num_fact}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('home')
                        ->with('error', 'La transferencia no se ha podido eliminar');   
               }
               return redirect()->route('home')
                    ->with('errors', 'El transfEnviada no ha sido ser eliminado');
        }        
        Traza::create([
        'description'=> "La transferencia enviada {$transfEnviada->num_fact} ha sido eliminada por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('contacto')
                    ->with('success', 'La transferencia ha sido eliminada con éxito');
    }
}
