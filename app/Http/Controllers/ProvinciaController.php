<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProvinciaRequest;
use App\Provincia;
use App\Traza;
//use Illuminate\Http\Request;

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
        $provincia->delete();

        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "La provincia {$provincia->name} ha sido eliminada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

        return redirect()->route('provincias')
                    ->with('success', 'La provincia ha sido eliminada');
    }
}