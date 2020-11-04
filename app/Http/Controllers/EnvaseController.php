<?php

namespace App\Http\Controllers;

use App\Envase;
use App\Http\Requests\StoreEnvaseRequest;
use App\Organizacion;
use App\Tercero;
use App\Traza;
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
        $this->authorize('view',new Envase);
        
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
        $envase = new Envase;
        $this->authorize('create',$envase);
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('envase.create',compact('terceros','organizaciones','envase'));
    }

    public function store(StoreEnvaseRequest $request)
    {   
        $this->authorize('create',new Envase);

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
            $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "Envase {$envase->identificador} creado por el usuario {$nombre}",
            ]);

            return redirect()->route('envases')->with('success','Envase creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo envase');
    }

    public function edit(Envase $envase)
    {
        $this->authorize('update',$envase);

        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('envase.edit',['envase'=>$envase,'terceros'=>$terceros,'organizaciones'=>$organizaciones]);
    }

    public function update(StoreEnvaseRequest $request, Envase $envase)
    {
        $this->authorize('update',$envase);

        $data = request()->all();
        //dd($data);
        $envase->update($data);

        if ($envase) {
            $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "Envase {$envase->identificador} actualizado por el usuario {$nombre}",
            ]);
        return redirect()->route('envases')->with('success','Envase actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el envase');
    }

    public function destroy(Envase $envase)
    {
        $this->authorize('delete',$envase);

        $envase->delete();

        $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "Envase {$envase->identificador} eliminado por el usuario {$nombre}",
            ]);

        return redirect()->route('envases')
                    ->with('success', 'El envase ha sido eliminado');
    }
}