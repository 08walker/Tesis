<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMunicipioRequest;
use App\Municipio;
use App\Provincia;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Municipio);
        
        // $todos = Municipio::all();
        // $municipios = $todos->filter(function ($value,$key){
        //     return data_get($value,'activo') == 1;
        // })->sortBy('provincia_id');
        
        //Con el scope de activos
        $municipios = Municipio::activos()->get();
        
        return view('municipio.index',compact('municipios'));
    }

    public function show(Municipio $municipio)
    {
        return view('municipio.show',compact('municipio'));
    }

    public function create()
    {   
        $municipio = new Municipio;
        $this->authorize('create',$municipio);
        $provincias = Provincia::all();
        return view('municipio.create',compact('provincias', 'municipio'));
        //return view('municipio.create');
    }

    public function store(StoreMunicipioRequest $request)
    {   
        $this->authorize('create',new Municipio);
        $data = request()->all();
        $municipio = Municipio::create([
            'name'=> $data['name'],
            'provincia_id'=> $data['provincia_id'],
        ]);

        if ($municipio) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El municipio {$municipio->name} creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
            return redirect()->route('municipios')->with('success','Municipio creado con éxito');
        }
        return back()->withInput()->with('demo','Error al crear el nuevo municipio');
    }
    
    public function edit(Municipio $municipio)
    {
        $this->authorize('update',$municipio);
        $provincias = Provincia::all();
        return view('municipio.edit',['municipio'=>$municipio,'provincias'=>$provincias]);
    }

    public function update(StoreMunicipioRequest $request, Municipio $municipio)
    {
        $this->authorize('update',$municipio);
        $data = request()->all();
        $municipio->update($data);
        
        if ($municipio) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El municipio {$municipio->name} actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('municipios')->with('success','Municipio actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el municipio');
    }

    public function destroy(Municipio $municipio)
    {
        $this->authorize('delete',$municipio);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $municipio->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $municipio->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El municipio {$municipio->name} desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('municipios')
                        ->with('success', 'El municipio ha sido desactivado');   
               }
               return redirect()->route('municipios')
                    ->with('demo', 'El municipio no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El municipio {$municipio->name} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('municipios')
                    ->with('success', 'El municipio ha sido eliminado con éxito');
    }
}