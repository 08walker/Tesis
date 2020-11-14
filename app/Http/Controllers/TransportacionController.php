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
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El usuario {$nombre} ha creado la transportación número {$transportacion->numero}",
            // 'ip'=>{$ip},
            ]);
            return redirect()->route('transportaciones.show', ['transp'=>$transp->id])
                    ->with('success','Transportación creada con éxito');
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
        if ($transportacion) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
                'description'=> "El usuario {$nombre} ha actualizado la transportación número {$transportacion->numero}",
                'ip'=>$ip,
            ]);
            return redirect()->route('transportaciones.show',$transportacion)->with('success','Transportación actualizada con éxito');
        }
        return back()->withInput()->with('error','Error al actualizar la transportación');
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
}
