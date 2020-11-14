<?php

namespace App\Http\Controllers;

use App\Lugar;
use App\Producto;
use App\TransfEnviada;
use App\Transportacion;
use App\Traza;
use Illuminate\Http\Request;

class TransfEnviadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('view',new Transportacion);
        $todas = TransfEnviada::all();        
        return view('tenviada.index',compact('todas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',new Transportacion);
        $transfer = new TransfEnviada;
        $lugares = Lugar::all();
        return view('tenviada.create',compact('transfer','lugares'));
    }

    public function store(Request $request)
    {
        $this->authorize('create',new Transportacion);
        $data = request()->validate([
            'fyh_salida'=>'required|date',
            'num_fact'=>'required|numeric',
            'origen_id'=>'required',
            'destino_id'=>'required|different:origen_id'
        ],
        [ 
            'fyh_salida.required'=>'La fecha es obligatoria',
            'fyh_salida.required'=>'Debe intruducir una fecha válida',
            'num_fact.required'=>'El número de la factura es obligatorio',
            'num_fact.required'=>'El número de la factura no debe contener letras',
            'origen_id.required'=>'El lugar de origen es obligatorio',
            'destino_id.required'=>'El lugar de destino es obligatorio',
            'destino_id.different'=>'El lugar de destino debe ser diferente al de origen',
        ]);

        //dd($data = request()->all());
        $transf = TransfEnviada::create([
            'fyh_salida'=> $data['fyh_salida'],
            'num_fact'=> $data['num_fact'],
            'origen_id'=> $data['origen_id'],
            'destino_id'=> $data['destino_id'],
        ]);
        if ($transf) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Transferencia enviada número {$transf->num_fact} creada por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return $transf;
        }
        return back()->withInput()->with('error','Error al crear la transferencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransfEnviada  $transfEnviada
     * @return \Illuminate\Http\Response
     */
    public function show(TransfEnviada $transfEnviada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransfEnviada  $transfEnviada
     * @return \Illuminate\Http\Response
     */
    public function edit(TransfEnviada $transfEnviada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransfEnviada  $transfEnviada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransfEnviada $transfEnviada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransfEnviada  $transfEnviada
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransfEnviada $transfEnviada)
    {
        //
    }

        public function llenar()
    {
        $transfer = new TransfEnviada;
        $productos = Producto::all();
        return view('tenviada.llenar',compact('transfer','productos'));
    }

    public function storechofer(Request $request,Transportacion $transportacion)
    {
        $this->authorize('create',new Transportacion);
        //$transportacion->choferes()->attach($request->get('lchofer'));
        //$transportacion->syncChofer($request->get('lchofer'));
        $transportacion->choferes()->sync($request->get('lchofer'));
        return back();
    }

}
