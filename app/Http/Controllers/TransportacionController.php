<?php

namespace App\Http\Controllers;

use App\Transportacion;
use Illuminate\Http\Request;

class TransportacionController extends Controller
{
    public function index()
    {
        return view('transportacion.index')
            ->with('transportaciones', Transportacion::all());
    }

    public function create()
    {
        return view('transportacion.create');
    }

    public function store(Request $request)
    {
        $data = request()->all();
        $producto = Transportacion::create([
            'numero'=> $data['numero'],
            'observacion'=> $data['observacion'],
        ]);
        if ($producto) {
            return redirect()->route('transportaciones.llenar');
        }
        return back()->withInput()->with('errors','Error al crear la transportación');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transportacion  $transportacion
     * @return \Illuminate\Http\Response
     */
    public function show(Transportacion $transportacion)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transportacion  $transportacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportacion $transportacion)
    {
        //
    }

    public function llenar($value='')
    {
        return view('transportacion.llenar');        
    }
}
