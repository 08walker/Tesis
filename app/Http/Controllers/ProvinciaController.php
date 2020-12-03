<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProvinciaRequest;
use App\Provincia;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index()
    {
            $this->authorize('view',new Provincia);
            
            return view('provincia.index')
            ->with('provincias', Provincia::activos()->get());
    }    

    public function create()
    {
        $provincia = new Provincia;
        $this->authorize('create',$provincia);
        return view('provincia.create',compact('provincia'));
    }

    public function store(StoreProvinciaRequest $request)
    {   
        $this->authorize('create',new Provincia);
        $provincia = Provincia::create($request->all());

        if ($provincia) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La provincia {$provincia->name} ha sido creada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('provincias')->with('success','Provincia creada con éxito');
        }
        return back()->withInput()->with('demo','Error al crear la nueva provincia');
    }

        public function show(Provincia $provincia)
    {   
        //$provincia = Provincia::findOrFail($id);
        return view('provincia.show',compact('provincia'));
    }

    public function edit(Provincia $provincia)
    {   
        $this->authorize('update',$provincia);
        return view('provincia.edit',['provincia'=>$provincia]);
    }

    public function update(StoreProvinciaRequest $request, Provincia $provincia)
    {   
        $this->authorize('update',$provincia);
        $data = request()->all();
        $provincia->update($data);

        if ($provincia) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La provincia {$provincia->name} ha sido actualizada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('provincias')->with('success','Provincia actualizada con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar la provincia');
    }

    public function destroy(Provincia $provincia)
    {
        $this->authorize('delete',$provincia);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $provincia->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $provincia->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "La provincia {$provincia->name} ha sido desactivada por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('provincias')
                        ->with('success', 'El provincia ha sido desactivado');   
               }
               return redirect()->route('provincias')
                    ->with('demo', 'La provincia no ha sido ser eliminada');
        }
        
        Traza::create([
        'description'=> "La provincia {$provincia->name} eliminada por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('provincias')
                    ->with('success', 'La provincia ha sido eliminada con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new provincia);        
        return view('provincia.desactivados')
        ->with('provincias', provincia::noactivos()->get());
    }

    public function activar(Request $request, Provincia $provincia)
    {
        $this->authorize('update',$provincia);
        if ($request['activo']) {
            $data['activo'] = 1;
            $provincia->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La provincia {$provincia->name} ha sido activada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'La provincia ha sido activada con éxito');
        }
        return back()->with('demo', 'La provincia no se ha activado');
    }
}