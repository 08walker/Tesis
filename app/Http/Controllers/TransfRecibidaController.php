<?php

namespace App\Http\Controllers;

use App\TransfRecibida;
use App\Transportacion;
use Illuminate\Http\Request;

class TransfRecibidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('view',new Transportacion);
        $todas = TransfRecibida::all();
        return view('trecibida.index',compact('todas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',new Transportacion);
        $transfer = new TransfRecibida;
        return view('trecibida.create',compact('transfer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',new Transportacion);
        $data = request()->validate([
            'fyh_llegada'=>'required|date',
            //'finish_date' => 'required|date|after:start_date',
            'num_fact'=>'required|numeric',
            'origen_id'=>'required',
            'destino_id'=>'required|different:origen_id'
        ],
        [ 
            'fyh_llegada.required'=>'La fecha es obligatoria',
            'fyh_llegada.required'=>'La fecha debe ser de tipo fecha',
            'num_fact.required'=>'El número de la factura es obligatorio',
            'num_fact.required'=>'El número de la factura no debe contener letras',
            'origen_id.required'=>'El lugar de origen es obligatorio',
            'destino_id.required'=>'El lugar de destino es obligatorio',
            'destino_id.different'=>'El lugar de destino debe ser diferente al de origen',
        ]);
        //$data = request()->all();
        $transf = TransfRecibida::create([
            'fyh_llegada'=> $data[''],
            'num_fact'=> $data[''],
            'origen_id'=> $data[''],
            'destino_id'=> $data[''],
        ]);
        // if ($transf) {
        //     return redirect()->route('transportaciones.show', ['transf'=>$transf->id]);
        // }
        // return back()->withInput()->with('errors','Error al crear la transferencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransfRecibida  $transfRecibida
     * @return \Illuminate\Http\Response
     */
    public function show(TransfRecibida $transfRecibida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransfRecibida  $transfRecibida
     * @return \Illuminate\Http\Response
     */
    public function edit(TransfRecibida $transfRecibida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransfRecibida  $transfRecibida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransfRecibida $transfRecibida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransfRecibida  $transfRecibida
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransfRecibida $transfRecibida)
    {
        //
    }
}
