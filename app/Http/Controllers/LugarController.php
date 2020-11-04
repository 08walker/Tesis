<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLugarRequest;
use App\Lugar;
use App\Municipio;
use App\Organizacion;
use App\Tercero;
use App\Traza;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new Lugar);
        
        return view('lugar.index')
        ->with('lugares', Lugar::all());
    }
    public function show($id)
    {
        $lugar = Lugar::findOrFail($id);
        return view('lugar.show',compact('lugar'));
    }

    public function create()
    {   
        $lugar = new Lugar;
        $this->authorize('create',$lugar);
        $municipios = Municipio::all();
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('lugar.create',compact('municipios','terceros','organizaciones','lugar'));
    }

    public function store(StoreLugarRequest $request)
    {   
        $this->authorize('create',new Lugar);
        $data = request()->all(); 
        //dd($data);

        $lugar = Lugar::create([
            'name'=> $data['name'],
            'municipio_id'=> $data['municipio_id'],
            'tercero_id'=>$data['tercero_id'],
            'organizacion_id'=>$data['organizacion_id'],
        ]);

        if ($lugar) {
            $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "Lugar {$lugar->name} creado por el usuario {$nombre}",
            ]); 
            return redirect()->route('lugares')->with('success','Lugar creado con éxito');
        }
        return back()->withInput()->with('error','Error al insertar el nuevo lugar');
    }

    public function edit(Lugar $lugar)
    {
        $this->authorize('update',$lugar);
        $municipios = Municipio::all();
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('lugar.edit',['lugar'=>$lugar,'terceros'=>$terceros,'organizaciones'=>$organizaciones,'municipios'=>$municipios]);
    }

    public function update(StoreLugarRequest $request, Lugar $lugar)
    {
        $this->authorize('update',$lugar);
        $data = request()->all(); 
        //dd($data);

        $lugar->update($data);

        if ($lugar) {
            $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "Lugar {$lugar->name} actualizado por el usuario {$nombre}",
            ]); 
            return redirect()->route('lugares')->with('success','Lugar actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el lugar');
    }

    public function destroy(Lugar $lugar)
    {
        $this->authorize('delete',$lugar);
        $lugar->delete();
        
        $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "Lugar {$lugar->name} eliminado por el usuario {$nombre}",
            ]); 

        return redirect()->route('lugares')
                    ->with('success', 'El lugar ha sido eliminado');
    }
}
