<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTerceroRequest;
use App\Municipio;
use App\Tercero;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TerceroController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Tercero);
        
        return view('tercero.index')
        ->with('terceros', Tercero::activos()->get());
    }
    public function show(Tercero $tercero)
    {
        return view('tercero.show',compact('tercero'));
    }

    public function create()
    {   
        $tercero = new Tercero;
        $this->authorize('create',$tercero);
        $municipios = Municipio::activos()->get();
        return view('tercero.create',compact('municipios','tercero'));
        //return view('tercero.create');
    }

    public function store(StoreTerceroRequest $request)
    {   
        $this->authorize('create',new Tercero);
        $data = request()->all();
        //dd($data);
        
        $tercero = Tercero::create([
            'name'=> $data['name'],
            'identificador'=> $data['identificador'],
            'municipio_id'=> $data['municipio_id'],
        ]);

        if ($tercero) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tercero {$tercero->name} ha sido creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('terceros')->with('success','Tercero creado con éxito');
        }
        return back()->withInput()->with('demo','Error al crear la agencia');
    }

    public function edit(Tercero $tercero)
    {
        $this->authorize('update',$tercero);
        $municipios = Municipio::all();
        return view('tercero.edit',['tercero'=>$tercero,'municipios'=>$municipios]);
    }

    public function update(StoreTerceroRequest $request, Tercero $tercero)
    {
        $this->authorize('update',$tercero);
        $data = request()->all();
        //dd($data);

        $tercero->update($data);
        
        if ($tercero) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tercero {$tercero->name} ha sido actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('terceros')->with('success','Tercero actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar la agencia');   
    }

    public function destroy(Tercero $tercero)
    {
        $this->authorize('delete',$tercero);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $tercero->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $tercero->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El tercero {$tercero->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('terceros')
                        ->with('success', 'El tercero ha sido desactivado');   
               }
               return redirect()->route('terceros')
                    ->with('demo', 'El tercero no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El tercero {$tercero->name} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('terceros')
                    ->with('success', 'El tercero ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new Tercero);
        return view('tercero.desactivados')
        ->with('terceros', Tercero::noactivos()->get());
    }

    public function activar(Request $request, tercero $tercero)
    {
        $this->authorize('update',$tercero);
        if ($request['activo']) {
            $data['activo'] = 1;
            $tercero->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El tercero {$tercero->name} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El tercero ha sido activado con éxito');
        }
        return back()->with('demo', 'El tercero no se ha activado');
    }
}