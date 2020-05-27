<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTerceroRequest;
use App\Municipio;
use App\Tercero;
use Illuminate\Http\Request;

class TerceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tercero.index')
        ->with('terceros', Tercero::all());
    }
    public function show(Tercero $tercero)
    {
        return view('tercero.show',compact('tercero'));
    }

    public function create()
    {   
        $tercero = new Tercero;
        $this->authorize('create',$tercero);
        $municipios = Municipio::all();
        return view('tercero.create',compact('municipios','tercero'));
        //return view('tercero.create');
    }

    public function store(StoreTerceroRequest $request)
    {   
        $this->authorize('create',new Tercero);
        $data = request()->all();
        //dd($data);
        
        $tercero = Tercero::create([
            'name'=> $data['name'],
            'identificador'=> $data['identificador'],
            'municipio_id'=> $data['municipio_id'],
        ]);

        if ($tercero) {
            return redirect()->route('terceros')->with('success','Tercero creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear la agencia');
    }

    public function edit(Tercero $tercero)
    {
        $this->authorize('update',$tercero);
        $municipios = Municipio::all();
        return view('tercero.edit',['tercero'=>$tercero,'municipios'=>$municipios]);
    }

    public function update(StoreTerceroRequest $request, Tercero $tercero)
    {
        $this->authorize('update',$tercero);
        $data = request()->all();
        //dd($data);

        $tercero->update($data);
        
        if ($tercero) {
            return redirect()->route('terceros')->with('success','Tercero actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar la agencia');   
    }

    public function destroy(Tercero $tercero)
    {
        $this->authorize('delete',$tercero);
        $tercero->delete();

        return redirect()->route('terceros')
                    ->with('success', 'Tercero eliminado');
    }
}