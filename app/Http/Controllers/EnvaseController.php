<?php

namespace App\Http\Controllers;

use App\Envase;
use App\Http\Requests\StoreEnvaseRequest;
use App\Organizacion;
use App\Tercero;
use Illuminate\Http\Request;

class EnvaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('envase.index')
        ->with('envases', Envase::all());
    }
    public function show($id)
    {
        $envase = Envase::findOrFail($id);
        return view('envase.show',compact('envase'));
    }
    
    public function create()
    {
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('envase.create',compact('terceros','organizaciones'));
    }

    public function store(StoreEnvaseRequest $request)
    {   
        $data = request()->all(); 

        //dd($data);        
        $envase = Envase::create([
            'identificador'=> $data['identificador'],
            //'es_propio'=> $data['es_propio'],
            'volumen_max_carga'=> $data['volumen_max_carga'],
            'tara'=> $data['tara'],
            'tercero_id'=> $data['tercero_id'],
            'organizacion_id'=>$data['organizacion_id'],
        ]);
        if ($envase) {
            return redirect()->route('envases')->with('success','Envase creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo envase');
    }

    public function edit(Envase $envase)
    {
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('envase.edit',['envase'=>$envase,'terceros'=>$terceros,'organizaciones'=>$organizaciones]);
    }

    public function update(StoreEnvaseRequest $request, Envase $envase)
    {
        $data = request()->all();
        //dd($data);
        $envase->update($data);

        if ($envase) {
        return redirect()->route('envases')->with('success','Envase actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el envase');
    }

    public function destroy(Envase $envase)
    {
        $envase->delete();

        return redirect()->route('envases')
                    ->with('success', 'El envase ha sido eliminado');
    }
}