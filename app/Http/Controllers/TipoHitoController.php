<?php

namespace App\Http\Controllers;

use App\TipoHito;
use Illuminate\Http\Request;

class TipoHitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new TipoHito);
        
        $tipohito = TipoHito::all();
        
        return view('tipohito.index',compact('tipohito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipohito = new TipoHito;
        $this->authorize('create',$tipohito);
        return view('tipohito.create',compact('tipohito'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(TipoHito $tipoHito)
    {
        return view('tipohito.show',compact('tipoHito'));
    }

    public function edit(TipoHito $tipoHito)
    {
        //
    }

    public function update(Request $request, TipoHito $tipoHito)
    {
        //
    }

    public function destroy(TipoHito $tipoHito)
    {
        //
    }
}
