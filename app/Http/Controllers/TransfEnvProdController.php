<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdTransfEnvRequest;
use App\Producto;
use App\TransfEnviada;
use App\Transf_Env_Prod;
use App\Traza;
use Illuminate\Http\Request;

class TransfEnvProdController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $this->authorize('create',new TransfEnviada);
        $transfer = new Transf_Env_Prod;
        $productos = Producto::activos()->get();
        return view('tenviada.llenar',compact('transfer','productos','id'));
    }

    public function store(StoreProdTransfEnvRequest $request,$id)
    {
        $this->authorize('create',new TransfEnviada);
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
            $transferencia = $dat->transfenviada;
            // $transferencia = TransfEnviada::find($id);
            //dd($transferencia->transfenvprod);
            return redirect()->route('tenv.show',$transferencia);

        }
        return back()->withInput()->with('demo','Error al llenar la transferencia');
    }

    public function edit($id)
    {
        $transfer = Transf_Env_Prod::find($id);
        $this->authorize('update',new TransfEnviada);        
        $productos = Producto::activos()->get();
        return view('tenviada.editllenar',compact('transfer','productos'));
    }

    public function update(StoreProdTransfEnvRequest $request, $id)
    {
        $transfer = Transf_Env_Prod::find($id);
        $data = request()->all();
        $transfer->update($data);
        if ($transfer) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Actualizado producto en la transferencia {$transfer->transfenviada->num_fact} por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
            // dd($transfer->transfenviada);
            // $transferencia = $transfer->transfenviada;
            return redirect()->route('tenv.show',$transfer->transfenviada)->with('success','Producto actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el transfer');
        
    }

    public function destroy($id)
    {
        $this->authorize('create',new TransfEnviada);
        
        $transfer = Transf_Env_Prod::find($id);
        $nameprod = $transfer->producto->name;
        $transfer->delete();
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        Traza::create([
            'description'=> "Eliminado producto {$nameprod} de la transferencia {$transfer->transfenviada->num_fact} por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        
        return back();
    }
}
