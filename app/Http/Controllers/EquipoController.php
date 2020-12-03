<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Organizacion;
use App\Tercero;
use App\TipoEquipo;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Equipo);
        
        return view('equipo.index')
        ->with('equipos', Equipo::activos()->get());
    }
    public function show($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipo.show',compact('equipo'));
    }
    
    public function create()
    {   
        $equipo = new Equipo;
        $this->authorize('create',$equipo);
        $organizaciones = Organizacion::activos()->get();
        $terceros = Tercero::activos()->get();
        $tipoequipo = TipoEquipo::activos()->get();
        return view('equipo.create',compact('terceros','organizaciones','tipoequipo','equipo'));
    }

    public function store(StoreEquipoRequest $request)
    {   
        $this->authorize('create',new Equipo);

        $data = request()->all(); 
        //dd($data);
        $equipo = Equipo::create([
            'identificador'=> $data['identificador'],
            'description'=> $data['description'],
            'volumen_max_carga'=> $data['volumen_max_carga'],
            'peso_max_carga'=> $data['peso_max_carga'],
            'tara'=> $data['tara'],
            //'puede_cargar'=> $data['puede_cargar'],
            //'es_propio'=> $data['es_propio'],
            'tipo_equipo_id'=> $data['tipo_equipo_id'],
            'tercero_id'=> $data['tercero_id'],
            'organizacion_id'=> $data['organizacion_id'],
        ]);
        
        if ($equipo) {

            $nombre = auth()->user()->name;
            $ip = request()->ip();            
            Traza::create([
            'description'=> "Equipo {$equipo->identificador} creado por el usuario {$nombre}",
            'ip'=>$ip,            
            ]);

            return redirect()->route('equipos')->with('success','Equipo creado con éxito');
        }
        return back()->withInput()->with('demo','Error al crear el nuevo equipo');
    }

    public function edit(Equipo $equipo)
    {
        $this->authorize('update',$equipo);

        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        $tipoequipo = TipoEquipo::all();
        return view('equipo.edit',['equipo'=>$equipo,'terceros'=>$terceros,'organizaciones'=>$organizaciones,'tipoequipo'=>$tipoequipo]);
    }

    public function update(StoreEquipoRequest $request, Equipo $equipo)
    {
        $this->authorize('update',$equipo);
        
        $data = request()->all(); 
        $equipo->update($data);

        if ($equipo) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();            
            Traza::create([
            'description'=> "Equipo {$equipo->identificador} actualizado por el usuario {$nombre}",
            'ip'=>$ip,            
            ]);
            return redirect()->route('equipos')->with('success','Equipo actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el equipo');
    }

    public function destroy(Equipo $equipo)
    {
        $this->authorize('delete',$equipo);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $equipo->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $equipo->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El equipo {$equipo->identificador} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('equipos')
                        ->with('success', 'El equipo ha sido desactivado');   
               }
               return redirect()->route('equipos')
                    ->with('demo', 'El equipo no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El equipo {$equipo->identificador} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('equipos')
                    ->with('success', 'El equipo ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new Equipo);        
        return view('equipo.desactivados')
        ->with('equipos', Equipo::noactivos()->get());
    }

    public function activar(Request $request, equipo $equipo)
    {
        $this->authorize('update',$equipo);
        if ($request['activo']) {
            $data['activo'] = 1;
            $equipo->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El equipo {$equipo->identificador} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El equipo ha sido activado con éxito');
        }
        return back()->with('demo', 'El equipo no se ha activado');
    }
}