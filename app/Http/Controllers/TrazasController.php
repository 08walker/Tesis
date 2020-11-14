<?php

namespace App\Http\Controllers;

use App\Traza;
use Illuminate\Http\Request;

class TrazasController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Traza);
        
        $trazas = Traza::orderBy('created_at','desc')->get();
        return view('trazas.index',compact('trazas'));
    }
}
