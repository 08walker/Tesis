<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTUnidadMRequest;
use App\TipoUnidadMedida;
use App\Traza;
use Illuminate\Http\Request;

class TipoUnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new TipoUnidadMedida);
        
        return view('tipounidadmedida.index')
            ->with('tipoum', TipoUnidadMedida::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoum = new TipoUnidadMedida;
        $this->authorize('create',$tipoum);
        return view('tipounidadmedida.create',compact('tipoum'));
    }

    public function store(StoreTUnidadMRequest $request)
    {
        $this->authorize('create',new TipoUnidadMedida);
        $tipoum = TipoUnidadMedida::create($request->all());

        if ($tipoum) {
            $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "El tipo de unidad de medida {$tipoum->name} ha sido creada por el usuario {$nombre}",
            ]);
            return redirect()->route('tipounidad')->with('success','Tipo de unidad de medida creada con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo tipo');
    }

    public function show(TipoUnidadMedida $tipoUnidadMedida)
    {
        //
    }

    public function edit(TipoUnidadMedida $tipoUnidadMedida)
    {
        $this->authorize('update',$tipoUnidadMedida);
        return view('tipounidadmedida.edit',['tipoum'=>$tipoUnidadMedida]);
    }

    public function update(StoreTUnidadMRequest $request, TipoUnidadMedida $tipoUnidadMedida)
    {
        //$this->authorize('update',$tipoUnidadMedida);
        $data = request()->all();
        $tipoUnidadMedida->update($data);

        if ($tipoUnidadMedida) {
            $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "El tipo de unidad de medida {$tipoUnidadMedida->name} ha sido actualizada por el usuario {$nombre}",
            ]);
            return redirect()->route('tipounidad')->with('success','Tipo de unidad actualizada con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el tipo de unidad');
    }

    public function destroy(TipoUnidadMedida $tipoUnidadMedida)
    {
        $this->authorize('delete',$tipoUnidadMedida);
        $tipoUnidadMedida->delete();

        $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "El tipo de unidad de medida {$tipoUnidadMedida->name} ha sido eliminada por el usuario {$nombre}",
            ]);

        return redirect()->route('tipounidad')
                    ->with('success', 'El tipo de unidad ha sido eliminado');
    }
}
