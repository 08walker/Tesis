<?php

namespace App\Http\Controllers;

use App\Traza;
use Illuminate\Http\Request;

class TrazasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new Traza);
        
        $trazas = Traza::orderBy('created_at','desc')->get();
        //dd($trazas);
        return view('trazas.index',compact('trazas'));
    }


}
