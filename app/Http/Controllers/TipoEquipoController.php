<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTEquipoRequest;
use App\TipoEquipo;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipoEquipoController extends Controller
{
    public function index()
    {
        $this->authorize('view',new TipoEquipo);

        return view('tipoequipo.index')
            ->with('tipoequipo', TipoEquipo::activos()->get());
    }

    public function create()
    {
        $tipoEquipo = new TipoEquipo;
        $this->authorize('create',$tipoEquipo);
        return view('tipoequipo.create',compact('tipoEquipo'));
    }

    public function store(StoreTEquipoRequest $request)
    {
        $this->authorize('create',new TipoEquipo);
        $tipoEquipo = TipoEquipo::create($request->all());

        if ($tipoEquipo) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de equipo {$tipoEquipo->name} ha sido creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipoequipo')->with('success','Tipo de equipo creado con éxito');
        }
        return back()->withInput()->with('demo','Error al crear el nuevo tipo');
    }

    public function edit(TipoEquipo $tipoEquipo)
    {
        $this->authorize('update',$tipoEquipo);
        return view('tipoequipo.edit',['tipoEquipo'=>$tipoEquipo]);
    }

    public function update(StoreTEquipoRequest $request, TipoEquipo $tipoEquipo)
    {
        $this->authorize('update',$tipoEquipo);
        $data = request()->all();
        $tipoEquipo->update($data);

        if ($tipoEquipo) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de equipo {$tipoEquipo->name} ha sido actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipoequipo')->with('success','Tipo de equipo actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el tipo de equipo');
    }

    public function destroy(TipoEquipo $tipoEquipo)
    {
        $this->authorize('delete',$tipoEquipo);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $tipoEquipo->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $tipoEquipo->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El tipo de equipo {$tipoEquipo->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('tipoequipo')
                        ->with('success', 'El tipo de equipo ha sido desactivado');   
               }
               return redirect()->route('tipoequipo')
                    ->with('demo', 'El tipo de equipo no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El tipo de equipo {$tipoEquipo->name} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('tipoequipo')
                    ->with('success', 'El tipo de equipo ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new tipoEquipo);        
        return view('tipoEquipo.desactivados')
        ->with('tipoequipo', TipoEquipo::noactivos()->get());
    }

    public function activar(Request $request, TipoEquipo $tipoEquipo)
    {
        $this->authorize('update',$tipoEquipo);
        if ($request['activo']) {
            $data['activo'] = 1;
            $tipoEquipo->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de equipo {$tipoEquipo->name} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El tipo de equipo ha sido activado con éxito');
        }
        return back()->with('demo', 'El tipo de equipo no se ha activado');
    }
}