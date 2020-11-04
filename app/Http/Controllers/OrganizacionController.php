<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizacionRequest;
use App\Municipio;
use App\Organizacion;
use App\Traza;
use Illuminate\Http\Request;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new Organizacion);

        return view('organizacion.index')
        ->with('organizaciones', Organizacion::all());
    }
    public function show(Organizacion $organizacion)
    {
        return view('organizacion.show',compact('organizacion'));
    }

    public function create()
    {   
        $organizacion = new Organizacion;
        $this->authorize('create',$organizacion);
        $municipios = Municipio::all();
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
            Traza::create([
            'description'=> "La organizacion {$organizacion->name} creada por el usuario {$nombre}",
            ]);
            return redirect()->route('organizaciones')->with('success','Organización creada con éxito');
        }
        return back()->withInput()->with('error','Error al crear la nueva organización');
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
            Traza::create([
            'description'=> "La organizacion {$organizacion->name} actualizada por el usuario {$nombre}",
            ]);
            return redirect()->route('organizaciones')->with('success','Organización actualizada con éxito');
           }
        return back()->withInput()->with('error','Error al actualizar la organización');
    }

    public function destroy(Organizacion $organizacion)
    {
        $this->authorize('delete',$organizacion);
        $organizacion->delete();

        $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "La organizacion {$organizacion->name} eliminada por el usuario {$nombre}",
            ]);

        return redirect()->route('organizaciones')
                    ->with('success', 'La organización ha sido eliminada');
    }
}
