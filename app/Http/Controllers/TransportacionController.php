<?php

namespace App\Http\Controllers;

use App\Arrasrtre_Transp;
use App\Arrasrtre_Transp_Enva;
use App\Arrastre;
use App\Chofer;
use App\ChoferEquipoTransp;
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
            ->with('transportaciones', Transportacion::noterminada()->get());
    }

    public function index2()
    {
        $this->authorize('view',new Transportacion);
        return view('transportacion.terminadas')
            ->with('transportaciones', Transportacion::terminada()->get());
    }

    public function index3()
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
        $tchofer = $transportacion->chofertransp;
        // $demo = $tchofer->first();
        // dd($demo->choferes->name);
        return view('transportacion.llenar',compact('transportacion','choferes','arrastres','envases','tarras','tchofer'));
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

    public function detalles(Transportacion $transportacion)
    {
    	$this->authorize('view',new Transportacion);
        return view('transportacion.detalles',compact('transportacion'));
    }

    public function destroy(Transportacion $transportacion)
    {
        $this->authorize('delete',$transportacion);
        if ($transportacion->terminada == 1) {
            return back()->with('demo', 'La transportación no puede ser eliminada porque se informado como terminada');
        }
        else
        {
            if ($transportacion->transfenviada->count() > 0) {
            return back()->with('demo', 'La transportación tiene transferencias asociadas');
        }elseif ($transportacion->hito->count() > 0) 
        {
            return back()->with('demo', 'La transportación tiene incidencias asociadas');
        }
        if ($transportacion->arrastretrasnp->count() > 0) 
        {
            foreach ($transportacion->arrastretrasnp as $arrastre) {
                foreach ($arrastre->arrastenva as $envase) {
                    Arrasrtre_Transp_Enva::destroy($envase->id);
                }
                Arrasrtre_Transp::destroy($arrastre->id);
            }
        }
        if ($transportacion->chofertransp->count() > 0){
            foreach ($transportacion->chofertransp as $chofer) {
                ChoferEquipoTransp::destroy($chofer->id);
            }
        }
        $transportacion->delete();
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        Traza::create([
        'description'=> "El usuario {$nombre} ha eliminado la transportación número {$transportacion->numero}",
        'ip'=>$ip,
        ]);
        return back()->with('success', 'La transportación ha sido eliminada');
        }        
    }

}
