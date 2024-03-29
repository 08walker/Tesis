<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnidadMRequest;
use App\TipoUnidadMedida;
use App\Traza;
use App\UnidadMedida;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        $this->authorize('view',new UnidadMedida);

        $unidadmedida = UnidadMedida::activos()->get();        
        return view('unidadmedida.index',compact('unidadmedida'));
    }

    public function create()
    {
        $unidadmedida = new UnidadMedida;
        $this->authorize('create',$unidadmedida);
        $tipoUnidades = TipoUnidadMedida::activos()->get();
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
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La unidad de medida {$unidad->name} ha sido creada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('unidadmedida')->with('success','Unidad de medida creada con éxito');
        }
        return back()->withInput()->with('demo','Error al crear la nueva Unidad de medida');
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
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La unidad de medida {$unidadMedida->name} ha sido actualizada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('unidadmedida')->with('success','Unidad de medidas actualizada con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar la unidad de medida');
    }

    public function destroy(UnidadMedida $unidadMedida)
    {
        $this->authorize('delete',$unidadMedida);
        
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $unidadMedida->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $unidadMedida->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "La unidad de medida {$unidadMedida->name} ha sido desactivada por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('unidadmedida')
                        ->with('success', 'La unidad de medida ha sido desactivada');   
               }
               return redirect()->route('unidadmedida')
                    ->with('demo', 'La unidad de medida no ha sido ser eliminada');
        }
            Traza::create([
            'description'=> "La unidad de medida {$unidadMedida->name} ha sido eliminada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        return redirect()->route('unidadmedida')
                    ->with('success', 'La unidad de medida ha sido eliminada con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new UnidadMedida);        
        return view('unidadmedida.desactivados')
        ->with('unidadmedida', UnidadMedida::noactivos()->get());
    }

    public function activar(Request $request, UnidadMedida $unidadMedida)
    {
        $this->authorize('update',$unidadMedida);
        if ($request['activo']) {
            $data['activo'] = 1;
            $unidadMedida->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La unidad de medida {$unidadMedida->name} ha sido activada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'La unidad de medida ha sido activada con éxito');
        }
        return back()->with('demo', 'La unidad de medida no se ha activado');
    }
}
