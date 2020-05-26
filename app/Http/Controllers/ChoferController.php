<?php

namespace App\Http\Controllers;

use App\Chofer;
use App\Equipo;
use App\Http\Requests\StoreChoferRequest;
use App\Organizacion;
use App\Tercero;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('view');
        return view('chofer.index')
        ->with('choferes', Chofer::all());
    }
    public function show($id)
    {
        $chofer = Chofer::findOrFail($id);
        return view('chofer.show',compact('chofer'));
    }

    public function create()
    {
        $chofer = new Chofer;
        $this->authorize('create',$chofer);
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        $equipos = Equipo::all();
        return view('chofer.create',compact('terceros','equipos','organizaciones','chofer'));
    }

    public function store(StoreChoferRequest $request)
     {  
        $this->authorize('create',$chofer);
        $data = request()->all(); 
        //dd($data);
        
        $chofer = Chofer::create([
            'name'=> $data['name'],
            'apellido'=> $data['apellido'],
            'ci'=> $data['ci'],
            'licencia'=> $data['licencia'],
            'telefono'=> $data['telefono'],
            //'es_propio'=> $data['es_propio'],
            'equipo_id'=> $data['equipo_id'],
            'tercero_id'=> $data['tercero_id'],
            'organizacion_id'=>$data['organizacion_id'],
            ]);

        if ($chofer) {
            return redirect()->route('choferes')->with('success','EL chofer ha sido creado con éxito');
        }
        return back()->withInput()->with('error','Error al insertar el nuevo chofer');
    }

    public function edit(Chofer $chofer)
    {
        $this->authorize('update',$chofer);
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        $equipos = Equipo::all();
        return view('chofer.edit',['chofer'=>$chofer,'equipos'=>$equipos,'terceros'=>$terceros,'organizaciones'=>$organizaciones]);
    }

    public function update(StoreChoferRequest $request, Chofer $chofer)
    {   
        $this->authorize('update',$chofer);
        $data = request()->all(); 
        //dd($data);
    
        $chofer->update($data);
        if ($chofer) {
            return redirect()->route('choferes')->with('success','Chofer actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el chofer');
    }

    public function destroy(Chofer $chofer)
    {
        $this->authorize('delete',$chofer);
        $chofer->delete();

        return redirect()->route('choferes')
                    ->with('success', 'El chofer ha sido eliminado');
    }
}