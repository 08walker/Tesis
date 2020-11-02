<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnidadMRequest;
use App\TipoUnidadMedida;
use App\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        $unidadmedida = UnidadMedida::all();        
        return view('unidadmedida.index',compact('unidadmedida'));
    }

    public function create()
    {
        $unidadmedida = new UnidadMedida;
        $this->authorize('create',$unidadmedida);
        $tipoUnidades = TipoUnidadMedida::all();
        return view('unidadmedida.create',compact('unidadmedida', 'tipoUnidades'));
    }

    public function store(StoreUnidadMRequest $request)
    {
        $this->authorize('create',new UnidadMedida);
        $data = request()->all();        
        $unidad = UnidadMedida::create([
            'name'=> $data['name'],
            'identificador'=> $data['identificador'],
            'tipo_unidad_medida_id'=> $data['tipo_unidad_medida_id'],
        ]);
        if ($unidad) {
            return redirect()->route('unidadmedida')->with('success','Unidad de medida creada con éxito');
        }
        return back()->withInput()->with('error','Error al crear la nueva Unidad de medida');
    }

    public function show(UnidadMedida $unidadMedida)
    {
        //
    }

    public function edit(UnidadMedida $unidadMedida)
    {
        $this->authorize('update',$unidadMedida);
        $tipoUnidades = TipoUnidadMedida::all();
        return view('unidadmedida.edit',['unidadmedida'=>$unidadMedida,'tipoUnidades'=>$tipoUnidades]);
    }

    public function update(StoreUnidadMRequest $request, UnidadMedida $unidadMedida)
    {
        $this->authorize('update',$unidadMedida);
        $data = request()->all();
        //dd($data);
        $unidadMedida->update($data);
        
        if ($unidadMedida) {
            return redirect()->route('unidadmedida')->with('success','Unidad de medidaas actualizada con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar la unidad de medida');
    }

    public function destroy(UnidadMedida $unidadMedida)
    {
        $this->authorize('delete',$unidadMedida);
        try {
         $unidadMedida->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $unidadMedida->update(['activo'=>'0']);
                    return redirect()->route('unidadmedida')
                        ->with('success', 'La unidad de medida ha sido desactivada');   
               }
               return redirect()->route('unidadmedida')
                    ->with('errors', 'La unidad de medida no ha sido ser eliminada');
        }
        return redirect()->route('unidadmedida')
                    ->with('success', 'La unidad de medida ha sido eliminada con éxito');
    }
}
