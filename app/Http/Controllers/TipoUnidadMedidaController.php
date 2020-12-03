<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTUnidadMRequest;
use App\TipoUnidadMedida;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipoUnidadMedidaController extends Controller
{
    public function index()
    {
        $this->authorize('view',new TipoUnidadMedida);
        
        return view('tipounidadmedida.index')
            ->with('tipoum', TipoUnidadMedida::activos()->get());
    }
    public function create()
    {
        $tipoum = new TipoUnidadMedida;
        $this->authorize('create',$tipoum);
        return view('tipounidadmedida.create',compact('tipoum'));
    }

    public function store(StoreTUnidadMRequest $request)
    {
        $this->authorize('create',new TipoUnidadMedida);
        $tipoum = TipoUnidadMedida::create($request->all());

        if ($tipoum) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de unidad de medida {$tipoum->name} ha sido creada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipounidad')->with('success','Tipo de unidad de medida creada con éxito');
        }
        return back()->withInput()->with('demo','Error al crear el nuevo tipo');
    }

    public function edit(TipoUnidadMedida $tipoUnidadMedida)
    {
        $this->authorize('update',$tipoUnidadMedida);
        return view('tipounidadmedida.edit',['tipoum'=>$tipoUnidadMedida]);
    }

    public function update(StoreTUnidadMRequest $request, TipoUnidadMedida $tipoUnidadMedida)
    {
        $this->authorize('update',new TipoUnidadMedida);
        $data = request()->all();
        $tipoUnidadMedida->update($data);

        if ($tipoUnidadMedida) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de unidad de medida {$tipoUnidadMedida->name} ha sido actualizada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipounidad')->with('success','Tipo de unidad actualizada con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el tipo de unidad');
    }

    public function destroy(TipoUnidadMedida $tipoUnidadMedida)
    {
        $this->authorize('delete',$tipoUnidadMedida);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $tipoUnidadMedida->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $tipoUnidadMedida->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El tipo de unidad de medida {$tipoUnidadMedida->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('tipounidad')
                        ->with('success', 'El tipoUnidadMedida ha sido desactivado');   
               }
               return redirect()->route('tipounidad')
                    ->with('demo', 'El tipo de unidad de medida no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El tipo de unidad de medida {$tipoUnidadMedida->name} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('tipounidad')
                    ->with('success', 'El tipo de unidad de medida ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new TipoUnidadMedida);        
        return view('tipoUnidadMedida.desactivados')
        ->with('tipoum', TipoUnidadMedida::noactivos()->get());
    }

    public function activar(Request $request, TipoUnidadMedida $tipoUnidadMedida)
    {
        $this->authorize('update',$tipoUnidadMedida);
        if ($request['activo']) {
            $data['activo'] = 1;
            $tipoUnidadMedida->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de unidad de medida {$tipoUnidadMedida->name} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El tipo de unidad de medida ha sido activado con éxito');
        }
        return back()->with('demo', 'El tipo de unidad de medida no se ha activado');
    }
}
