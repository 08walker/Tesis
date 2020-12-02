<?php

namespace App\Http\Controllers;

use App\Chofer;
use App\Producto;
use App\Reporte1;
use App\Reporte2;
use Illuminate\Http\Request;

class ReportesController extends Controller
{

    public function index()
    {
        $this->authorize('view',new Reporte1);
        return view('reportes.index');
    }

    public function reporte1()
    {
        $this->authorize('view',new Reporte1);
        $productos = Reporte1::all();
        $i = 0;
        $totales = [];
        $nombres = [];
        $productoss_id = [];
        foreach($productos as $data){
            if(!in_array($data['producto_id'],$productoss_id)){
                $prod = Producto::find($data['producto_id']);
                $totales[$i] = $data['SUM(peso_kg)'];
                $nombres[]=$prod->name; 
                $productoss_id[] = $data['producto_id'];
                $i++;
            }
            else{
                $prod = Producto::find($data['producto_id']);
                $totales[$i-1] += $data['SUM(peso_kg)'];
            }
        }
        // dd($totales);
        return view('reportes.reporte1',compact('nombres','totales'));
    }

    public function reporte1filtrado(Request $request)
    {
        $this->authorize('view',new Reporte1);

        $rango = $request->rango;
        //dividir la fecha
        $dividir = explode("- ",$rango);
        $fechaini = $dividir[0];
        $fechafin = $dividir[1];

        $productos = Reporte1::enrango($fechaini,$fechafin)->get();
        //dd($productos->toArray());

        // $totales =array_reduce($productos, function($a,$x){
        //     $a[$x['producto_id']] += $x['SUM(peso_kg)'];
        //     return $a;
        // });

        $totales = [];
        $productoss_id = [];
        foreach($productos as $data){
            if(!in_array($data['producto_id'],$productoss_id)){
                $totales[$data['producto_id']] = $data['SUM(peso_kg)'];
                $productoss_id[] = $data['producto_id'];
            }
            else{
                $totales[$data['producto_id']] += $data['SUM(peso_kg)'];
            }
        }
        return view('reportes.reporte1',compact('totales'));

    }

    public function reporte2()
    {
        $this->authorize('view',new Reporte1);

        $choferes = Chofer::activos()->get();
        $demo = Chofer::find(1);
        if($demo->transortaciones){
            dd($choferes);
        }
        // $i = 0;
        // foreach ($choferes as $chofer) {
        //     if ($chofer->transportaciones->count() < 1) {
        //         $demo[$i] = $chofer->id;
        //         $i++;
        //     }
        // }
        //dd($demo->transortaciones->count());

        //lista de choferes con transortaciones enviadas y recibidas en el mes
        return view('reportes.reporte2',compact('choferes'));
    }

    public function reporte2filtrado(Request $request)
    {
        $this->authorize('view',new Reporte1);
        $rango = $request->rango;
        dd($rango);
        //dividir la fecha
        $dividir = explode("- ",$rango);
        $fechaini = $dividir[0];
        $fechafin = $dividir[1];
    }
    
    public function reporte3()
    {
        $this->authorize('view',new Reporte1);

        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //Devolver listado y calcular la cantidad de dias sin utilizar
        return view('reportes.reporte3');
    }
    
    public function reporte4()
    {
        $this->authorize('view',new Reporte1);

        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //Devolver listado y calcular la cantidad de dias sin utilizar, multiplicar por el costo
        //no se puede hacer porque falta el costo. o poner fijo
        //poner en el select e costo
        return view('reportes.reporte4');
    }
    
    public function reporte5()
    {
        $this->authorize('view',new Reporte1);

        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //devolver el listado
        return view('reportes.reporte5');
    }
    
    public function reporte6()
    {
        $this->authorize('view',new Reporte1);

        //D:/Programas/para%20saber/Paginas%20Web/Bootstrap/Plantillas/2020-04-15/AdminLTE-3.0.4/pages/charts/chartjs.html -->utilizar este grafico (Bar Chart)
        return view('reportes.reporte6');
    }
    
    public function reporte7()
    {
        $this->authorize('view',new Reporte1);

        //Este no lo pienso hacer, revisar todo para eliminarlo donde quiera que salga
        return view('reportes.reporte7');
    }
    
    public function reporte8()
    {
        $this->authorize('view',new Reporte1);

        //Lo resuelvo en el reporte 5, filtrar los que llevan mas de 7 dias
        return view('reportes.reporte8');
    }
    
    public function reporte9()
    {
        $this->authorize('view',new Reporte1);
        
        //esto es tremenda candela porque son una pila de reportes en uno(11 para ser exactos)

        //Buscar por periodo poner una fecha de inicio y fin en dos datepicker y filtrar por esos campos por el created_at
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
