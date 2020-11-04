<?php

namespace App\Http\Controllers;

use App\Directivo;
use App\Organizacion;
use App\User;
use Illuminate\Http\Request;

class DirectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new Directivo);
        
        return view('directivo.index')
            ->with('directivos', Directivo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directivo = new Directivo;
        $this->authorize('create',$directivo);
        $users = User::all();
        $organizaciones = Organizacion::all();
        return view('directivo.create',compact('users','organizaciones','directivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->route('directivo.index')->with('success','Directivo creado con éxito');
        }
        return back()->withInput()->with('error','Error al crear el nuevo directivo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Directivo  $directivo
     * @return \Illuminate\Http\Response
     */
    public function show(Directivo $directivo)
    {
        return view('directivo.show',compact('directivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Directivo  $directivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Directivo $directivo)
    {
        $this->authorize('update',$directivo);
        $users = User::all();
        $organizaciones = Organizacion::all();
        return view('directivo.edit',['directivo'=>$directivo,'users'=>$users,'organizaciones'=>$organizaciones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Directivo  $directivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directivo $directivo)
    {
        $this->authorize('update',$directivo);
        $data = request()->all();
        //dd($data);
        $directivo->update($data);
        
        if ($directivo) {
            return redirect()->route('directivo.index')->with('success','Directivo actualizado con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar el directivo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Directivo  $directivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directivo $directivo)
    {
        $this->authorize('delete',$directivo);
        $directivo->delete();

        return redirect()->route('directivo.index')
                    ->with('success', 'El directivo ha sido eliminado');
    }
}
