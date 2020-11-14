<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTArrastreRequest;
use App\TipoArrastre;
use App\Traza;
use Illuminate\Http\Request;

class TipoArrastreController extends Controller
{
    public function index()
    {
        $this->authorize('view',new TipoArrastre);
        
        return view('tipoarrastre.index')
            ->with('tipoArrastre', TipoArrastre::all());
    }

    public function create()
    {
        $tipoArrastre = new TipoArrastre;
        $this->authorize('create',$tipoArrastre);
        return view('tipoarrastre.create',compact('tipoArrastre'));
    }

    public function store(StoreTArrastreRequest $request)
    {
        $this->authorize('create',new TipoArrastre);
        $tipoArrastre = TipoArrastre::create($request->all());

        if ($tipoArrastre) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de arrastre {$tipoArrastre->name} ha sido creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipoarrastre')->with('success','Tipo de arrastre creada con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo tipo');
    }

    public function edit(TipoArrastre $tipoArrastre)
    {
        $this->authorize('update',$tipoArrastre);
        return view('tipoarrastre.edit',['tipoArrastre'=>$tipoArrastre]);
    }

    public function update(StoreTArrastreRequest $request, TipoArrastre $tipoArrastre)
    {
        $this->authorize('update',$tipoArrastre);
        $data = request()->all();
        $tipoArrastre->update($data);

        if ($tipoArrastre) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de arrastre {$tipoArrastre->name} ha sido actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('tipoarrastre')->with('success','Tipo arrastre actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el tipo de arrastre');
    }

    public function destroy(TipoArrastre $tipoArrastre)
    {
        $this->authorize('delete',$tipoArrastre);
        $tipoArrastre->delete();

        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de arrastre {$tipoArrastre->name} ha sido eliminado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

        return redirect()->route('tipoarrastre')
                    ->with('success', 'El tipo arrastre ha sido eliminado');
    }
}
