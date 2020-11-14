<?php

namespace App\Http\Controllers;

use App\Arrastre;
use App\ArrastreTranspor;
use App\Chofer;
use App\Envase;
use App\Equipo;
use App\Hito;
use App\TipoHito;
use App\Transportacion;
use App\Traza;
use Illuminate\Http\Request;

class TransportacionController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Transportacion);
        return view('transportacion.index')
            ->with('transportaciones', Transportacion::all());
    }

    public function create()
    {   
        $this->authorize('create',new Transportacion);
        $transportacion = new Transportacion;
        $equipos = Equipo::all();
        return view('transportacion.create',compact('transportacion','equipos'));
    }

    public function store(Request $request)
    {
        $this->authorize('create',new Transportacion);
    $data = request()->validate([
        'numero'=>'required|min:1',
        'equipo_id'=>'required'
    ],
    [   'numero.required'=>'El número es obligatorio',
        'numero.min'=>'El número debe tener más de 1 caracter',
        'equipo_id.required'=>'Debe seleccionar el equipo'
    ]);
    //dd($data);
        $data = request()->all();
        $transp = Transportacion::create([
            'numero'=> $data['numero'],
            'observacion'=> $data['observacion'],
            'equipo_id'=> $data['equipo_id'],
        ]);
        if ($transp) {
            return redirect()->route('transportaciones.show', ['transp'=>$transp->id]);
        }
        return back()->withInput()->with('errors','Error al crear la transportación');
    }

    public function show($id)
    {
        $this->authorize('create',new Transportacion);
        $transportacion = Transportacion::find($id);
        $choferes = Chofer::all();
        $arrastres = Arrastre::all();
        $envases = Envase::all();
        return view('transportacion.llenar',compact('transportacion','choferes','arrastres','envases'));
    }

    public function edit(Transportacion $transportacion)
    {
        $equipos = Equipo::all();
        return view('transportacion.edit',compact('transportacion','equipos'));
    }

    public function update(Request $request, Transportacion $transportacion)
    {
        $transportacion->update($request->all());        
        return redirect()->route('transportaciones.show',$transportacion);
    }

    public function destroy(Transportacion $transportacion)
    {
        //
    }

    public function llenar($value='')
    {
        return view('transportacion.llenar');        
    }

    public function storechofer(Request $request,Transportacion $transportacion)
    {
        $this->authorize('create',new Transportacion);
        //$transportacion->choferes()->attach($request->get('lchofer'));
        //$transportacion->syncChofer($request->get('lchofer'));
        $transportacion->choferes()->sync($request->get('lchofer'));
        return back();
    }

    public function storearrastre(Request $request,Transportacion $transportacion)
    {
        $this->authorize('create',new Transportacion);

        if ($request->get('larrastre')) {
            $arrastres = $request->get('larrastre');
            foreach ($arrastres as $arrastre) {
                //dd($municipio->provincia->name);
            $asdasd = ArrastreTranspor::create([
                'transportacion_id'=>$transportacion->id,
                'arrastre_id'=>$arrastre,
                ]);                
            }
            //dd($asdasd);
          //dd($transportacion->arrastretranspor->getAll());
        }
        //$transportacion->arrastres()->sync($request->get('larrastre'));
        
        return back();
    }

    public function storeenvase(Request $request,Transportacion $transportacion)
    {
        
    }

    public function incidencia(Transportacion $transportacion)
    {
        $this->authorize('create',new Transportacion);

        $incidencia = new Hito;
        $thitos = TipoHito::all();

        return view('transportacion.incidencia',compact('transportacion','incidencia','thitos'));
    }

    public function storeincidencia(Transportacion $transportacion)
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
        $data = request()->all();
        $hito = Hito::create([
            'fyh_ini'=> $data['fyh_ini'],
            'description'=> $data['description'],
            'tipo_hito_id'=> $data['tipo_hito_id'],
            'transportacion_id'=> $transportacion->id,
        ]);

        if ($hito) {
            $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "El usuario {$nombre} ha creado una incidencia en la transportacion número {$transportacion->numero} ",
            ]);
            return redirect()->route('transportaciones.show',$transportacion);
        }
        return back()->withInput()->with('error','Error al crear la incidencia');

    }
}
