<?php

namespace App\Http\Controllers;

use App\Directivo;
use App\Events\HitoFueCreado;
use App\Hito;
use App\TipoHito;
use App\Transportacion;
use App\Traza;
use Illuminate\Http\Request;

class HitoController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Transportacion $transportacion)
    {
        $this->authorize('create',new Transportacion);
        $incidencia = new Hito;
        $thitos = TipoHito::all();
        return view('hito.create',compact('transportacion','incidencia','thitos'));
    }

    public function store(Request $request,Transportacion $transportacion)
    {
    $this->authorize('create',new Transportacion);
        $data = request()->validate([
        'fyh_ini'=>'required',
        'description'=>'required',
        'tipo_hito_id'=>'required',
    ],
    [   
        'fyh_ini.required'=>'Debe seleccionar la fecha',
        'description.required'=>'Debe escribir la descripción',
        'tipo_hito_id.required'=>'Debe seleccionar el tipo de incidencia'
    ]);
        //$data = request()->all();
        $hito = Hito::create([
            'fyh_ini'=> $data['fyh_ini'],
            'description'=> $data['description'],
            'tipo_hito_id'=> $data['tipo_hito_id'],
            'transportacion_id'=> $transportacion->id,
        ]);

        if ($hito) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El usuario {$nombre} ha creado una incidencia en la transportación número {$transportacion->numero}",
            'ip'=>$ip,
            ]);
            $directivos = Directivo::activos()->get();
            foreach ($directivos as $directivo) {
                $correos[] = $directivo->user->email;
            }
            //dd($correos);
            HitoFueCreado::dispatch($hito,$correos);
            return redirect()->route('transportaciones.formllenar',$transportacion)->with('success','Incidencia creada con éxito');
        }
        return back()->withInput()->with('demo','Error al crear la incidencia');
    }

    public function show(Hito $hito)
    {
        //
    }

    public function edit(Hito $hito)
    {
        //
    }

    public function update(Request $request, Hito $hito)
    {
        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "Hito {$hito->description} actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
    }

    public function destroy(Hito $hito)
    {
        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "Hito {$hito->description} eliminado por el usuario {$nombre}",
            'ip'=>$ip,
            ]); 
    }
}
