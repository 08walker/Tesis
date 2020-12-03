<?php

namespace App\Http\Controllers;

use App\Envase;
use App\Http\Requests\StoreEnvaseRequest;
use App\Organizacion;
use App\Tercero;
use App\Traza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EnvaseController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Envase);
        
        return view('envase.index')
        ->with('envases', Envase::activos()->get());
    }
    public function show($id)
    {
        $envase = Envase::findOrFail($id);
        return view('envase.show',compact('envase'));
    }
    
    public function create()
    {
        $envase = new Envase;
        $this->authorize('create',$envase);
        $organizaciones = Organizacion::activos()->get();
        $terceros = Tercero::activos()->get();
        return view('envase.create',compact('terceros','organizaciones','envase'));
    }

    public function store(StoreEnvaseRequest $request)
    {   
        $this->authorize('create',new Envase);

        $data = request()->all(); 

        //dd($data);        
        $envase = Envase::create([
            'identificador'=> $data['identificador'],
            //'es_propio'=> $data['es_propio'],
            'volumen_max_carga'=> $data['volumen_max_carga'],
            'tara'=> $data['tara'],
            'tercero_id'=> $data['tercero_id'],
            'organizacion_id'=>$data['organizacion_id'],
        ]);
        if ($envase) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Envase {$envase->identificador} creado por el usuario {$nombre}",
            'ip'=>$ip,            
            ]);

            return redirect()->route('envases')->with('success','Envase creado con éxito');
        }
        return back()->withInput()->with('demo','Error al crear el nuevo envase');
    }

    public function edit(Envase $envase)
    {
        $this->authorize('update',$envase);

        $organizaciones = Organizacion::all();
        $terceros = Tercero::all();
        return view('envase.edit',['envase'=>$envase,'terceros'=>$terceros,'organizaciones'=>$organizaciones]);
    }

    public function update(StoreEnvaseRequest $request, Envase $envase)
    {
        $this->authorize('update',$envase);

        $data = request()->all();
        //dd($data);
        $envase->update($data);

        if ($envase) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();            
            Traza::create([
            'description'=> "Envase {$envase->identificador} actualizado por el usuario {$nombre}",
            'ip'=>$ip,            
            ]);
        return redirect()->route('envases')->with('success','Envase actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el envase');
    }

    public function destroy(Envase $envase)
    {
        $this->authorize('delete',$envase);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $envase->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $envase->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El envase {$envase->identificador} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('envases')
                        ->with('success', 'El envase ha sido desactivado');   
               }
               return redirect()->route('envases')
                    ->with('demo', 'El envase no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El envase {$envase->identificador} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('envases')
                    ->with('success', 'El envase ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new Envase);        
        return view('envase.desactivados')
        ->with('envases', Envase::noactivos()->get());
    }

    public function activar(Request $request, envase $envase)
    {
        $this->authorize('update',$envase);
        if ($request['activo']) {
            $data['activo'] = 1;
            $envase->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El envase {$envase->identificador} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El envase ha sido activado con éxito');
        }
        return back()->with('demo', 'El envase no se ha activado');
    }
}