<?php

namespace App\Http\Controllers;

use App\Arrastre;
use App\Equipo;
use App\Http\Requests\StoreArrastreRequest;
use App\Organizacion;
use App\Tercero;
use App\TipoArrastre;
use Illuminate\Http\Request;

class ArrastreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new Arrastre);
        
        return view('arrastre.index')
        ->with('arrastres', Arrastre::all());
    }
    public function show($id)
    {
        $arrastre = Arrastre::findOrFail($id);
        return view('arrastre.show',compact('arrastre'));
    }

    public function create()
    {
        $arrastre = new Arrastre;   
        $this->authorize('create',$arrastre);
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        $equipos = Equipo::all();
        $tipoarrastre = TipoArrastre::all();
        return view('arrastre.create',
            compact('terceros','equipos','organizaciones','tipoarrastre','arrastre'));
    }

    public function store(StoreArrastreRequest $request)
    { 
        $this->authorize('create',new Arrastre);
        $data = request()->all(); 

        //dd($data);
        $arrastre = Arrastre::create([
            'identificador'=> $data['identificador'],
            'description'=>$data['description'],
            'volumen_max_carga'=>$data['volumen_max_carga'],
            'peso_max_carga'=>$data['peso_max_carga'],
            'tara'=> $data['tara'],
            //'es_propio'=>$data['es_propio'],
            'equipo_id'=>$data['equipo_id'],
            'tercero_id'=>$data['tercero_id'],
            'tipo_arrastre_id'=>$data['tipo_arrastre_id'],
            'organizacion_id'=>$data['organizacion_id'],
        ]);

        if ($arrastre) {
            return redirect()->route('arrastres')->with('success','Arrastre creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo arrastre');
    }

    public function edit(Arrastre $arrastre)
    {
        $this->authorize('update',$arrastre);
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        $equipos = Equipo::all();
        $tipoarrastre = TipoArrastre::all();
        return view('arrastre.edit',['arrastre'=>$arrastre,'organizaciones'=>$organizaciones,'terceros'=>$terceros,'equipos'=>$equipos,'tipoarrastre'=>$tipoarrastre]);
    }

    public function update(StoreArrastreRequest $request, Arrastre $arrastre)
    {
        $this->authorize('update',$arrastre);
        $data = request()->all(); 

        //dd($data);

        $arrastre->update($data);
        return redirect()->route('arrastres')->with('success','Arrastre actualizado con éxito');

        return back()->withInput()->with('error','Error al actualizar el arrastre');
    }

    public function destroy(Arrastre $arrastre)
    {
        $this->authorize('update',$arrastre);
        $arrastre->delete();

        return redirect()->route('arrastres')
                    ->with('success', 'El arrastre ha sido eliminado');
    }
}