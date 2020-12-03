<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTArrastreRequest;
use App\TipoArrastre;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipoArrastreController extends Controller
{
    public function index()
    {
        $this->authorize('view',new TipoArrastre);
        
        return view('tipoarrastre.index')
            ->with('tipoArrastre', TipoArrastre::activos()->get());
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
        return back()->withInput()->with('demo','Error al crear el nuevo tipo');
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
        return back()->withInput()->with('demo','Error al actualizar el tipo de arrastre');
    }

    public function destroy(TipoArrastre $tipoArrastre)
    {
        $this->authorize('delete',$tipoArrastre);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $tipoArrastre->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $tipoArrastre->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El tipo de arrastre {$tipoArrastre->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('tipoarrastre')
                        ->with('success', 'El tipo de arrastre ha sido desactivado');   
               }
               return redirect()->route('tipoarrastre')
                    ->with('demo', 'El tipo de arrastre no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El tipo de arrastre {$tipoArrastre->name} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('tipoarrastre')
                    ->with('success', 'El tipo de arrastre ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new TipoArrastre);
        $tipoArrastre = TipoArrastre::noactivos()->get();
        return view('tipoArrastre.desactivados',['tipoArrastre'=>$tipoArrastre]);
    }

    public function activar(Request $request, TipoArrastre $tipoArrastre)
    {
        $this->authorize('update',$tipoArrastre);
        if ($request['activo']) {
            $data['activo'] = 1;
            $tipoArrastre->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tipo de arrastre {$tipoArrastre->name} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El tipo de arrastre ha sido activado con éxito');
        }
        return back()->with('demo', 'El tipo de arrastre no se ha activado');
    }
}
