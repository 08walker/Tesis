<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLugarRequest;
use App\Lugar;
use App\Municipio;
use App\Organizacion;
use App\Tercero;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Lugar);
        
        return view('lugar.index')
        ->with('lugares', Lugar::activos()->get());
    }
    public function show($id)
    {
        $lugar = Lugar::findOrFail($id);
        return view('lugar.show',compact('lugar'));
    }

    public function create()
    {   
        $lugar = new Lugar;
        $this->authorize('create',$lugar);
        $municipios = Municipio::activos()->get();
        $organizaciones = Organizacion::activos()->get();
        $terceros = Tercero::activos()->get();
        return view('lugar.create',compact('municipios','terceros','organizaciones','lugar'));
    }

    public function store(StoreLugarRequest $request)
    {   
        $this->authorize('create',new Lugar);
        $data = request()->all(); 
        //dd($data);

        $lugar = Lugar::create([
            'name'=> $data['name'],
            'municipio_id'=> $data['municipio_id'],
            'tercero_id'=>$data['tercero_id'],
            'organizacion_id'=>$data['organizacion_id'],
        ]);

        if ($lugar) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Lugar {$lugar->name} creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
            return redirect()->route('lugares')->with('success','Lugar creado con éxito');
        }
        return back()->withInput()->with('demo','Error al insertar el nuevo lugar');
    }

    public function edit(Lugar $lugar)
    {
        $this->authorize('update',$lugar);
        $municipios = Municipio::all();
        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('lugar.edit',['lugar'=>$lugar,'terceros'=>$terceros,'organizaciones'=>$organizaciones,'municipios'=>$municipios]);
    }

    public function update(StoreLugarRequest $request, Lugar $lugar)
    {
        $this->authorize('update',$lugar);
        $data = request()->all(); 
        //dd($data);

        $lugar->update($data);

        if ($lugar) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Lugar {$lugar->name} actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
            return redirect()->route('lugares')->with('success','Lugar actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el lugar');
    }

    public function destroy(Lugar $lugar)
    {
        $this->authorize('delete',$lugar);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $lugar->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $lugar->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El lugar {$lugar->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('lugares')
                        ->with('success', 'El lugar ha sido desactivado');   
               }
               return redirect()->route('lugares')
                    ->with('demo', 'El lugar no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El lugar {$lugar->name} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('lugares')
                    ->with('success', 'El lugar ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new lugar);
        return view('lugar.desactivados')
        ->with('lugares', lugar::noactivos()->get());
    }

    public function activar(Request $request, lugar $lugar)
    {
        $this->authorize('update',$lugar);
        if ($request['activo']) {
            $data['activo'] = 1;
            $lugar->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El lugar {$lugar->name} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El lugar ha sido activado con éxito');
        }
        return back()->with('demo', 'El lugar no se ha activado');
    }
}
