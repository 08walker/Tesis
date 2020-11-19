<?php

namespace App\Http\Controllers;

use App\Directivo;
use App\Organizacion;
use App\Traza;
use App\User;
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
        return back()->withInput()->with('error','Error al crear el nuevo directivo');
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
        return back()->withInput()->with('error','Error al actualizar el directivo');
    }

    public function destroy(Directivo $directivo)
    {
        $this->authorize('delete',$directivo);
        $directivo->delete();

        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "Directivo {$directivo->name} eliminado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

        return redirect()->route('directivo.index')
                    ->with('success', 'El directivo ha sido eliminado');
    }
}
