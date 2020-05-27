<?php

namespace App\Http\Controllers;

use App\TipoArrastre;
use Illuminate\Http\Request;

class TipoArrastreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipoarrastre.index')
            ->with('tipoArrastre', TipoArrastre::all());
    }

    public function create()
    {
        $tipoArrastre = new TipoArrastre;
        $this->authorize('create',$tipoArrastre);
        return view('tipoarrastre.create',compact('tipoArrastre'));
    }

    public function store(Request $request)
    {
        $this->authorize('create',new TipoArrastre);
        $tipoArrastre = TipoArrastre::create($request->all());

        if ($tipoArrastre) {
            return redirect()->route('tipoarrastre')->with('success','Tipo de arrastre creada con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo tipo');
    }

    public function show(TipoArrastre $tipoArrastre)
    {
        //
    }

    public function edit(TipoArrastre $tipoArrastre)
    {
        $this->authorize('update',$tipoArrastre);
        return view('tipoarrastre.edit',['tipoArrastre'=>$tipoArrastre]);
    }

    public function update(Request $request, TipoArrastre $tipoArrastre)
    {
        $this->authorize('update',$tipoArrastre);
        $data = request()->all();
        $tipoArrastre->update($data);

        if ($tipoArrastre) {
            return redirect()->route('tipoarrastre')->with('success','Tipo arrastre actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el tipo de arrastre');
    }

    public function destroy(TipoArrastre $tipoArrastre)
    {
        $this->authorize('delete',$tipoArrastre);
        $tipoArrastre->delete();

        return redirect()->route('tipoarrastre')
                    ->with('success', 'El tipo arrastre ha sido eliminado');
    }
}
