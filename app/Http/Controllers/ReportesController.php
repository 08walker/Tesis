<?php

namespace App\Http\Controllers;

use App\Chofer;
use App\Producto;
use App\Reporte1;
use App\Reporte1a;
use App\Reporte2;
use Carbon\Carbon;
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
        $productos = Reporte1a::all();
        return view('reportes.reporte1',compact('productos'));
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
        //este pincha pero me devuevle un array que no es de tipo reporte1
        // $demo = $productos->groupBy('producto_id')->map(function($row){
        //     return $row->sum('suMpeso');
        // });
        // dd($demo);

        $i = 0;
        $demo = 0;

        $totales = [];
        $nombres = [];
        $productos_id = [];
        foreach($productos as $data){
            if(!in_array($data['producto_id'],$productos_id)){
                $prod = Producto::find($data['producto_id']);
                $totales[$i] = $data['suMpeso'];
                $nombres[]=$prod->name; 
                $productos_id[] = $data['producto_id'];
                $i++;
                $demo++;
            }
            else{
                $prod = Producto::find($data['producto_id']);
                $totales[$i-1] += $data['suMpeso'];
            }
        }
        //dd($demo);
        return view('reportes.reporte1',compact('nombres','totales','demo'));

    }

    public function reporte2()
    {
        $this->authorize('view',new Reporte1);

        $choferes = Chofer::activos()->get();
        //lista de choferes con transortaciones enviadas y recibidas en el mes
        return view('reportes.reporte2',compact('choferes'));
    }

    public function reporte2filtrado(Request $request)
    {
        $this->authorize('view',new Reporte1);
        $data = request()->validate([
        'chofer_id'=>'required',
        ],
        [   
        'chofer_id.required'=>'Debe seleccionar un chofer',
        ]);
        //dd($request->all());
        $rango = $request->rango;
        //dd($request['chofer_id']);
        $choferes = Chofer::activos()->get();
        $chofer = Chofer::find($request['chofer_id']);
        $chofertransp = $chofer->chofertransp;
        // foreach ($chofertransp as $demo) {
        //         dd($demo->transportaciones->transfenviada);
        // }

        // if ($rango) {
        //     //dividir la fecha
        //     $dividir = explode("- ",$rango);
        //     $fechaini = $dividir[0];
        //     $fechafin = $dividir[1];
        //     $tranferencias;
        //     foreach ($transportaciones as $viajes) {
        //         foreach ($viajes->transfenviada as $viaje) {
        //             if (Carbon::parse($viaje->fyh_llegada) > (Carbon::parse($fechaini))){
        //                 // if (Carbon::parse($viaje->fyh_llegada) > (Carbon::parse($fechafin))){
        //                     $tranferencias = $viaje;
                        
        //             }
        //         }
        //     }
        // }                
        //dd($tranferencias);

        return view('reportes.reporte2',compact('chofertransp','choferes'));

    }
    
    public function reporte3()
    {
        $this->authorize('view',new Reporte1);
        $envases = Reporte2::all();

        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //Devolver listado y calcular la cantidad de dias sin utilizar
        return view('reportes.reporte3',compact('envases'));
    }
    
    public function reporte4()
    {
        $this->authorize('view',new Reporte1);
        $envases = Reporte2::all();

        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //Devolver listado y calcular la cantidad de dias sin utilizar, multiplicar por el costo
        //no se puede hacer porque falta el costo. o poner fijo
        //poner en el select e costo
        return view('reportes.reporte4',compact('envases'));
    }
    
    public function reporte5()
    {
        $this->authorize('view',new Reporte1);
        $envases = Reporte2::all();

        //seleccionar los contenedores propios,los que tienen organizacion
        //Selecccionar la ultima transportacion realizada y verificar si llego 
        //devolver el listado
        return view('reportes.reporte5',compact('envases'));
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
        $envases = Reporte2::all();

        //Lo resuelvo en el reporte 5, filtrar los que llevan mas de 7 dias
        return view('reportes.reporte8',compact('envases'));
    }
    
    public function reporte9()
    {
        $this->authorize('view',new Reporte1);
        
        //esto es tremenda candela porque son una pila de reportes en uno(11 para ser exactos)

        //Buscar por periodo poner una fecha de inicio y fin en dos datepicker y filtrar por esos campos por el created_at
        return view('reportes.reporte9');
    }
}
