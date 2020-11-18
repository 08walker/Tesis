<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{

    public function index()
    {
        //$this->authorize('view',new Transportacion);
        return view('reportes.index');
    }

    public function reporte1()
    {
        return view('reportes.reporte1');
    }

    public function reporte2()
    {
        //lista de choferes con transortaciones enviadas y recibidas en el mes
        return view('reportes.reporte2');
    }
    
    public function reporte3()
    {
        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //Devolver listado y calcular la cantidad de dias sin utilizar
        return view('reportes.reporte3');
    }
    
    public function reporte4()
    {
        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //Devolver listado y calcular la cantidad de dias sin utilizar, multiplicar por el costo
        return view('reportes.reporte4');
    }
    
    public function reporte5()
    {
        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //devolver el listado
        return view('reportes.reporte5');
    }
    
    public function reporte6()
    {
        //D:/Programas/para%20saber/Paginas%20Web/Bootstrap/Plantillas/2020-04-15/AdminLTE-3.0.4/pages/charts/chartjs.html -->utilizar este grafico (Bar Chart)
        return view('reportes.reporte6');
    }
    
    public function reporte7()
    {
        //Este no lo pienso hacer, revisar todo para eliminarlo donde quiera que salga
        return view('reportes.reporte7');
    }
    
    public function reporte8()
    {
        //Lo resuelvo en el reporte 5, filtrar los que llevan mas de 7 dias
        return view('reportes.reporte8');
    }
    
    public function reporte9()
    {
        //esto es tremenda candela porque son una pila de reportes en uno(11 para ser exactos)
        return view('reportes.reporte9');
    }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
