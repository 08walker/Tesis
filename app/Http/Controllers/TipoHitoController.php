<?php

namespace App\Http\Controllers;

use App\TipoHito;
use Illuminate\Http\Request;

class TipoHitoController extends Controller
{
    public function index()
    {
        $this->authorize('view',new TipoHito);
        
        $tipohito = TipoHito::all();        
        return view('tipohito.index',compact('tipohito'));
    }

    public function create()
    {
        $tipohito = new TipoHito;
        $this->authorize('create',$tipohito);
        return view('tipohito.create',compact('tipohito'));
    }
}
