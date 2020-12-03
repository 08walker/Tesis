<?php

namespace App\Http\Controllers;

use App\Arrasrtre_Transp;
use App\Arrasrtre_Transp_Enva;
use App\Arrastre;
use App\Chofer;
use App\Envase;
use App\Equipo;
use App\Http\Requests\StoreTransportacionRequest;
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
        $equipos = Equipo::activos()->get();
        return view('transportacion.create',compact('transportacion','equipos'));
    }

    public function store(StoreTransportacionRequest $request)
    {
        $this->authorize('create',new Transportacion);
    $data = request()->all();
    //dd($data);
        $data = request()->all();
        $transp = Transportacion::create([
            'numero'=> $data['numero'],
            'observacion'=> $data['observacion'],
            'equipo_id'=> $data['equipo_id'],
        ]);
        if ($transp) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El usuario {$nombre} ha creado la transportación número {$transp->numero}",
            'ip'=>$ip,
            ]);
            return redirect()->route('transportaciones.formllenar', ['transp'=>$transp->id])
                    ->with('success','Transportación creada con éxito');
        }
        return back()->withInput()->with('demo','Error al crear la transportación');
    }

    //public function show($id)
    public function formllenar($id)
    {
        $transportacion = Transportacion::find($id);
        $this->authorize('create',$transportacion);
        $choferes = Chofer::activos()->get();
        $arrastres = Arrastre::activos()->get();
        $envases = Envase::activos()->get();
        $tarras = $transportacion->arrastretrasnp;
        //dd($tarras);
        return view('transportacion.llenar',compact('transportacion','choferes','arrastres','envases','tarras'));
    }

    public function edit(Transportacion $transportacion)
    {
        $this->authorize('update',$transportacion);
        $equipos = Equipo::all();
        return view('transportacion.edit',compact('transportacion','equipos'));
    }

    public function update(StoreTransportacionRequest $request, Transportacion $transportacion)
    {
        $this->authorize('update',$transportacion);
        $transportacion->update($request->all());    
        if ($transportacion) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
                'description'=> "El usuario {$nombre} ha actualizado la transportación número {$transportacion->numero}",
                'ip'=>$ip,
            ]);
            return redirect()->route('transportaciones.formllenar',$transportacion)->with('success','Transportación actualizada con éxito');
        }
        return back()->withInput()->with('demo','Error al actualizar la transportación');
    }

    //Para llenar tabla chofer_equipo_transp
    public function storechofer(Request $request,Transportacion $transportacion)
    {
        $this->authorize('create',new Transportacion);
        $transportacion->choferes()->sync($request->get('lchofer'));
        return back();
    }

    public function detalles(Transportacion $transportacion)
    {
    	$this->authorize('view',new Transportacion);
        return view('transportacion.detalles',compact('transportacion'));
    }

    public function destroy(Transportacion $transportacion)
    {
        //
    }

}
