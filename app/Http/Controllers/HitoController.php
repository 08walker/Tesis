<?php

namespace App\Http\Controllers;

use App\Directivo;
use App\Events\HitoFueCreado;
use App\Hito;
use App\TipoHito;
use App\Transportacion;
use App\Traza;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HitoController extends Controller
{

    public function index()
    {
        $this->authorize('view',new Hito);
        
        $incidencias = Hito::all();
        return view('hito.index',compact('incidencias'));
    }

    public function create($id)
    {
        $this->authorize('create',new Transportacion);
        $incidencia = new Hito;
        $thitos = TipoHito::all();
        $transportacion = Transportacion::find($id);
        return view('hito.create',compact('transportacion','incidencia','thitos'));
    }

    public function store(Request $request,Transportacion $transportacion)
    {
    $this->authorize('create',new Transportacion);
        $data = request()->validate([
        'fyh_ini'=>'required|date',
        'description'=>'required',
        'tipo_hito_id'=>'required',
    ],
    [   
        'fyh_ini.required'=>'Debe seleccionar la fecha',
        'fyh_ini.date'=>'Debe intruducir una fecha válida',
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

    public function edit(Hito $hito)
    {
        $this->authorize('update',new Hito);     
        $thitos = TipoHito::all();
        return view('hito.edit',compact('hito','thitos'));
    }

    public function update(Request $request, Hito $hito)
    {
        $this->authorize('create',new Transportacion);
        request()->validate([
        //'fyh_ini'=>'required',
        'description'=>'required',
        'tipo_hito_id'=>'required',
        ],
        [   
        //'fyh_ini.required'=>'Debe seleccionar la fecha',
        'description.required'=>'Debe escribir la descripción',
        'tipo_hito_id.required'=>'Debe seleccionar el tipo de incidencia'
        ]);
        $data = $request->all();

        if ($request['fyh_ini']) {
            if(Carbon::parse($request['fyh_ini'])->isAfter(Carbon::now())){
            return redirect()->route('incidencias.edit',$hito)->with('demo','La fecha introducida debe ser menor a la fecha actual');
             }
            $hito->update($data);
        }
        else
        {
            $data['fyh_ini']= $hito->fyh_ini;
            $hito->update($data);
        }
        if ($hito) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "La incidencia con la descripción: {$hito->description}, perteneciente a la transportacion número {$hito->transportacion->numero}, ha sido actualizada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            $directivos = Directivo::activos()->get();
            foreach ($directivos as $directivo) {
                $correos[] = $directivo->user->email;
            }
            HitoFueCreado::dispatch($hito,$correos);
            return redirect()->route('incidencias')->with('success','Incidencia actualizada con éxito');
        }
    }

    public function lista($id)
    {
        $this->authorize('view',new Hito);
        $transportacion = Transportacion::find($id);        
        $incidencias = $transportacion->hito;
        return view('hito.lista',compact('incidencias','transportacion'));
    }

    public function destroy(Hito $hito)
    {
        $this->authorize('delete',$hito);
        $hito->delete();

        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "La incidencia con la descripción: {$hito->description}, perteneciente a la transportacion número {$hito->transportacion->numero}, ha sido eliminada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        return redirect()->route('incidencias')->with('success', 'La incidencia ha sido eliminada');
    }
}
