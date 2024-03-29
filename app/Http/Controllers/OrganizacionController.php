<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizacionRequest;
use App\Municipio;
use App\Organizacion;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrganizacionController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Organizacion);

        return view('organizacion.index')
        ->with('organizaciones', Organizacion::activos()->get());
    }
    public function show(Organizacion $organizacion)
    {
        return view('organizacion.show',compact('organizacion'));
    }

    public function create()
    {   
        $organizacion = new Organizacion;
        $this->authorize('create',$organizacion);
        $municipios = Municipio::activos()->get();
        return view('organizacion.create',compact('municipios','organizacion'));
    }

    public function store(StoreOrganizacionRequest $request)
    {           
        $this->authorize('create',new Organizacion);
        $data = request()->all(); 
        //dd($data);

        $organizacion = Organizacion::create([
            'name'=> $data['name'],
            'identificador'=> $data['identificador'],
            'municipio_id'=> $data['municipio_id'],
        ]);
        
        if ($organizacion) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();            
            Traza::create([
            'description'=> "La organizacion {$organizacion->name} creada por el usuario {$nombre}",
            'ip'=>$ip,            
            ]);
            return redirect()->route('organizaciones')->with('success','Organización creada con éxito');
        }
        return back()->withInput()->with('demo','Error al crear la nueva organización');
    }

    public function edit(Organizacion $organizacion)
    {
        $this->authorize('update',$organizacion);
        $municipios = Municipio::all();
        return view('organizacion.edit',['organizacion'=>$organizacion,'municipios'=>$municipios]);
    }

    public function update(StoreOrganizacionRequest $request, Organizacion $organizacion)
    {   
        $this->authorize('update',$organizacion);
        $data = request()->all(); 
        //dd($data);

        $organizacion->update($data);

        if ($organizacion) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();            
            Traza::create([
            'description'=> "La organizacion {$organizacion->name} actualizada por el usuario {$nombre}",
            'ip'=>$ip,            
            ]);
            return redirect()->route('organizaciones')->with('success','Organización actualizada con éxito');
           }
        return back()->withInput()->with('demo','Error al actualizar la organización');
    }

    public function destroy(Organizacion $organizacion)
    {
        $this->authorize('delete',$organizacion);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $organizacion->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $organizacion->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "La organización {$organizacion->name} ha sido desactivada por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('organizaciones')
                        ->with('success', 'La organización ha sido desactivada');   
               }
               return redirect()->route('organizaciones')
                    ->with('demo', 'La organización no ha sido ser eliminada');
        }
        
        Traza::create([
        'description'=> "La organización {$organizacion->name} ha sido eliminada por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('organizaciones')
                    ->with('success', 'La organización ha sido eliminada con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new Organizacion);        
        return view('organizacion.desactivados')
        ->with('organizaciones', Organizacion::noactivos()->get());
    }

    public function activar(Request $request, Organizacion $organizacion)
    {
        $this->authorize('update',$organizacion);
        if ($request['activo']) {
            $data['activo'] = 1;
            $organizacion->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La organización {$organizacion->name} ha sido activada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'La organización ha sido activada con éxito');
        }
        return back()->with('demo', 'El organizacion no se ha activado');
    }
}