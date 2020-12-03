<?php

namespace App\Http\Controllers;

use App\Directivo;
use App\Organizacion;
use App\Traza;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DirectivoController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Directivo);
        
        return view('directivo.index')
            ->with('directivos', Directivo::activos()->get());
    }
  
    public function create()
    {
        $directivo = new Directivo;
        $this->authorize('create',$directivo);
        $users = User::activos()->get();
        $organizaciones = Organizacion::activos()->get();
        return view('directivo.create',compact('users','organizaciones','directivo'));
    }

    public function store(Request $request)
    {
        $this->authorize('create',new Directivo);
        $data = request()->all();
        //dd($data);
        $directivo = Directivo::create([
            'name'=> $data['name'],
            'user_id'=> $data['user_id'],
            'organizacion_id'=> $data['organizacion_id'],
        ]);
        if ($directivo) {

            $nombre = auth()->user()->name;
            $ip = request()->ip();            
            Traza::create([
            'description'=> "Directivo {$directivo->name} creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('directivo.index')->with('success','Directivo creado con éxito');
        }
        return back()->withInput()->with('demo','Error al crear el nuevo directivo');
    }

    public function show(Directivo $directivo)
    {
        return view('directivo.show',compact('directivo'));
    }

    public function edit(Directivo $directivo)
    {
        $this->authorize('update',$directivo);
        $users = User::all();
        $organizaciones = Organizacion::all();
        return view('directivo.edit',['directivo'=>$directivo,'users'=>$users,'organizaciones'=>$organizaciones]);
    }

    public function update(Request $request, Directivo $directivo)
    {
        $this->authorize('update',$directivo);
        $data = request()->all();
        //dd($data);
        $directivo->update($data);
        
        if ($directivo) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Directivo {$directivo->name} actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('directivo.index')->with('success','Directivo actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar el directivo');
    }

    public function destroy(Directivo $directivo)
    {
        $this->authorize('delete',$directivo);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        try {
         $directivo->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $directivo->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El directivo {$directivo->user->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('directivo.index')
                        ->with('success', 'El directivo ha sido desactivado');   
               }
               return redirect()->route('directivo.index')
                    ->with('demo', 'El directivo no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El directivo {$directivo->user->name} ha sido eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('directivo.index')
                    ->with('success', 'El directivo ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new Directivo);
        $directivos = Directivo::noactivos()->get();
        return view('directivo.desactivados',compact('directivos'));
    }

    public function activar(Request $request, Directivo $directivo)
    {
        $this->authorize('update',$directivo);
        if ($request['activo']) {
            $data['activo'] = 1;
            $directivo->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El directivo {$directivo->user->name} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El directivo ha sido activado con éxito');
        }
        return back()->with('demo', 'El directivo no se ha activado');
    }
}
