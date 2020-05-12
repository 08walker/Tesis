<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Organizacion;
use App\Tercero;
use App\TipoEquipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('equipo.index')
        ->with('equipos', Equipo::all());
    }
    public function show($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipo.show',compact('equipo'));
    }
    
    public function create()
    {   
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        $tipoequipo = TipoEquipo::all();
        return view('equipo.create',compact('terceros','organizaciones','tipoequipo'));
    }

    public function store(StoreEquipoRequest $request)
    {   
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
            return redirect()->route('equipos')->with('success','Equipo creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo equipo');
    }

    public function edit(Equipo $equipo)
    {
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        $tipoequipo = TipoEquipo::all();
        return view('equipo.edit',['equipo'=>$equipo,'terceros'=>$terceros,'organizaciones'=>$organizaciones,'tipoequipo'=>$tipoequipo]);
    }

    public function update(StoreEquipoRequest $request, Equipo $equipo)
    {
        $data = request()->all(); 
        //dd($data);

        $equipo->update($data);

        if ($equipo) {
            return redirect()->route('equipos')->with('success','Equipo actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el equipo');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return redirect()->route('equipos')
                    ->with('success', 'El equipo ha sido eliminado');
    }
}