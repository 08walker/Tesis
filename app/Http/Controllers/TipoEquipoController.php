<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTEquipoRequest;
use App\TipoEquipo;
use Illuminate\Http\Request;

class TipoEquipoController extends Controller
{
    public function index()
    {
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
            return redirect()->route('tipoequipo')->with('success','Tipo de equipo creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo tipo');
    }

    public function show(TipoEquipo $tipoEquipo)
    {
        //
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
            return redirect()->route('tipoequipo')->with('success','Tipo de equipo actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el tipo de equipo');
    }

    public function destroy(TipoEquipo $tipoEquipo)
    {
        $this->authorize('delete',$tipoEquipo);
        $tipoEquipo->delete();

        return redirect()->route('tipoequipo')
                    ->with('success', 'El tipo arrastre ha sido eliminado');
    }
}
