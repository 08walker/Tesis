<?php

namespace App\Http\Controllers;

use App\Arrastre;
use App\Equipo;
use App\Http\Requests\StoreArrastreRequest;
use App\Organizacion;
use App\Tercero;
use App\TipoArrastre;
use App\Traza;
use Illuminate\Http\Request;

class ArrastreController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Arrastre);
        
        return view('arrastre.index')
        ->with('arrastres', Arrastre::activos()->get());
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
        $organizaciones = Organizacion::activos()->get();
        $terceros = Tercero::activos()->get();
        $equipos = Equipo::activos()->get();
        $tipoarrastre = TipoArrastre::activos()->get();
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
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Arrastre {$arrastre->identificador} creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
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
        
        if ($arrastre) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Arrastre {$arrastre->identificador} actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

        return redirect()->route('arrastres')->with('success','Arrastre actualizado con éxito');
        }

        return back()->withInput()->with('error','Error al actualizar el arrastre');
    }

    public function destroy(Arrastre $arrastre)
    {
        
        //arreglar este metodo

        //$this->authorize('update',$arrastre);
        $delet = $arrastre;
        $arrastre->delete();
        //$municipio->delete();
        
        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "Arrastre {$delet->identificador} eliminado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

        return redirect()->route('arrastres')
                    ->with('success', 'El arrastre ha sido eliminado');
    }
}