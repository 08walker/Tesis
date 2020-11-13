<?php

namespace App\Http\Controllers;

use App\Arrastre;
use App\ArrastreTranspor;
use App\Chofer;
use App\Envase;
use App\Equipo;
use App\Transportacion;
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
        'identificador'=>'required|min:1',
        'equipo_id'=>'required'
    ],
    [   'identificador.required'=>'El campo identificador es obligatorio',
        'identificador.min'=>'El identificador debe tener mas de 9 caracteres',
        'equipo_id.required'=>'Debe seleccionar el equipo'
    ]);
    //dd($data);
        $data = request()->all();
        $transp = Transportacion::create([
            'numero'=> $data['identificador'],
            'observacion'=> $data['observacion'],
            'equipo_id'=> $data['equipo_id'],
        ]);
        if ($transp) {
            return redirect()->route('transportaciones.show', ['transp'=>$transp->id]);
        }
        return back()->withInput()->with('errors','Error al crear la transportación');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transportacion  $transportacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('create',new Transportacion);
        $transportacion = Transportacion::find($id);
        $choferes = Chofer::all();
        $arrastres = Arrastre::all();
        $envases = Envase::all();
        return view('transportacion.llenar',compact('transportacion','choferes','arrastres','envases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transportacion  $transportacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportacion $transportacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transportacion  $transportacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transportacion $transportacion)
    {
        //
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
            dd($asdasd);
          //dd($transportacion->arrastretranspor->getAll());
        }
        //$transportacion->arrastres()->sync($request->get('larrastre'));
        
        return back();
    }

    public function storeenvase(Request $request,Transportacion $transportacion)
    {
        
    }
}
