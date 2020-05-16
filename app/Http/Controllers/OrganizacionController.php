<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizacionRequest;
use App\Municipio;
use App\Organizacion;
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
        $municipios = Municipio::all();
        return view('organizacion.create',compact('municipios','organizacion'));
    }

    public function store(StoreOrganizacionRequest $request)
    {           
        $data = request()->all(); 
        //dd($data);

        $organizacion = Organizacion::create([
            'name'=> $data['name'],
            'identificador'=> $data['identificador'],
            'municipio_id'=> $data['municipio_id'],
        ]);
        
        if ($organizacion) {
            return redirect()->route('organizaciones')->with('success','Organización creada con éxito');
        }
        return back()->withInput()->with('error','Error al crear la nueva organización');
    }

    public function edit(Organizacion $organizacion)
    {
        $municipios = Municipio::all();
        return view('organizacion.edit',['organizacion'=>$organizacion,'municipios'=>$municipios]);
    }

    public function update(StoreOrganizacionRequest $request, Organizacion $organizacion)
    {   
        $data = request()->all(); 
        //dd($data);

        $organizacion->update($data);

        if ($organizacion) {
            return redirect()->route('organizaciones')->with('success','Organización actualizada con éxito');
           }
        return back()->withInput()->with('error','Error al actualizar la organización');
    }

    public function destroy(Organizacion $organizacion)
    {
        $organizacion->delete();

        return redirect()->route('organizaciones')
                    ->with('success', 'La organización ha sido eliminada');
    }
}
