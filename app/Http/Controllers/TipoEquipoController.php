<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTEquipoRequest;
use App\TipoEquipo;
use App\Traza;
use Illuminate\Http\Request;

class TipoEquipoController extends Controller
{
    public function index()
    {
        $this->authorize('view',new TipoEquipo);

        return view('tipoequipo.index')
            ->with('tipoequipo', TipoEquipo::all());
    }

    public function create()
    {
        $tipoEquipo = new TipoEquipo;
        $this->authorize('create',$tipoEquipo);
        return view('tipoequipo.create',compact('tipoEquipo'));
    }

    public function store(StoreTEquipoRequest $request)
    {
        $this->authorize('create',new TipoEquipo);
        $tipoEquipo = TipoEquipo::create($request->all());

        if ($tipoEquipo) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de equipo {$tipoEquipo->name} ha sido creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipoequipo')->with('success','Tipo de equipo creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo tipo');
    }

    public function edit(TipoEquipo $tipoEquipo)
    {
        $this->authorize('update',$tipoEquipo);
        return view('tipoequipo.edit',['tipoEquipo'=>$tipoEquipo]);
    }

    public function update(StoreTEquipoRequest $request, TipoEquipo $tipoEquipo)
    {
        $this->authorize('update',$tipoEquipo);
        $data = request()->all();
        $tipoEquipo->update($data);

        if ($tipoEquipo) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de equipo {$tipoEquipo->name} ha sido actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipoequipo')->with('success','Tipo de equipo actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el tipo de equipo');
    }

    public function destroy(TipoEquipo $tipoEquipo)
    {
        $this->authorize('delete',$tipoEquipo);
        $tipoEquipo->delete();

        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de equipo {$tipoEquipo->name} ha sido eliminado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

        return redirect()->route('tipoequipo')
                    ->with('success', 'El tipo arrastre ha sido eliminado');
    }
}