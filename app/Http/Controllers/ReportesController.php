<?php

namespace App\Http\Controllers;

use App\Chofer;
use App\Envase;
use App\Equipo;
use App\Organizacion;
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
        $rango = $request->rango;
        //dd($request['chofer_id']);
        $choferes = Chofer::activos()->get();
        $chofer = Chofer::find($request['chofer_id']);
        $chofertransp = $chofer->chofertransp;
        if($chofer->chofertransp->count()){
            //dd($chofer->chofertransp->count());
            return view('reportes.reporte2',compact('chofertransp','choferes'));
        }
        return back()->withInput()->with('demo','El chofer seleccionado no ha realizado ninguna transportación');
    }
    
    public function reporte3()
    {
        $this->authorize('view',new Reporte1);
        $envases = Reporte2::all();
        return view('reportes.reporte3',compact('envases'));
    }
    
    public function reporte4()
    {
        $this->authorize('view',new Reporte1);
        $envases = Reporte2::all();
        return view('reportes.reporte4',compact('envases'));
    }
    
    public function reporte5()
    {
        $this->authorize('view',new Reporte1);
        $envases = Reporte2::all();
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
        $envases = Reporte2::all();
        return view('reportes.reporte7',compact('envases'));
    }
    
    public function reporte8()
    {
        $this->authorize('view',new Reporte1);

        $choferes = Chofer::activos()->get();
        //lista de choferes con transortaciones enviadas y recibidas en el mes
        return view('reportes.reporte8',compact('choferes'));
    }

    public function reporte8filtrado(Request $request)
    {
        $this->authorize('view',new Reporte1);
        $data = request()->validate([
        'chofer_id'=>'required',
        ],
        [   
        'chofer_id.required'=>'Debe seleccionar un chofer',
        ]);
        $rango = $request->rango;
        //dd($request['chofer_id']);
        $choferes = Chofer::activos()->get();
        $chofer = Chofer::find($request['chofer_id']);
        $chofertransp = $chofer->chofertransp;
        if($chofer->chofertransp->count()){
            //dd($chofer->chofertransp->count());
            return view('reportes.reporte8',compact('chofertransp','choferes'));
        }
        return back()->withInput()->with('demo','El chofer seleccionado no ha realizado ninguna transportación');
    }
    
    public function reporte9()
    {   
        $this->authorize('view',new Reporte1);
        $envases = Envase::activos()->get();
        return view('reportes.reporte9',compact('envases'));        
    }

    public function reporte9filtrado(Request $request)
    {   
        $this->authorize('view',new Reporte1);
        //dd($request['envase_id']);
        $envase = Envase::find($request['envase_id']);
        if ($envase->arrastenva->count()) {
            $arrastenva = $envase->arrastenva;
            $envases = Envase::activos()->get();
            return view('reportes.reporte9',compact('envases','arrastenva'));            
        }
        return back()->withInput()->with('demo','El envase seleccionado no ha realizado ninguna transportación');    
    }

    public function reporte10()
    {   
        $this->authorize('view',new Reporte1);
        $equipos = Equipo::activos()->get();
        return view('reportes.reporte10',compact('equipos'));        
    }

    public function reporte10filtrado(Request $request)
    {   
        $this->authorize('view',new Reporte1);
        //dd($request['equipo_id']);
        $equipo = Equipo::find($request['equipo_id']);
        
        if ($equipo->transportacion->count()) {
            $transportaciones = $equipo->transportacion;
            $equipos = Envase::activos()->get();
            return view('reportes.reporte10',compact('equipos','equipo','transportaciones'));
        }
        return back()->withInput()->with('demo','El equipo seleccionado no ha realizado ninguna transportación');    
    }

    public function reporte11()
    {   
        $this->authorize('view',new Reporte1);
        $organizaciones = Organizacion::activos()->get();
        return view('reportes.reporte11',compact('organizaciones'));        
    }

    public function reporte11filtrado(Request $request)
    {   
        $this->authorize('view',new Reporte1);
        //dd($request['organizacion_id']);
        $organizacion = Organizacion::find($request['organizacion_id']);
        if ($organizacion->lugar->count()) {
            $lugares = $organizacion->lugar;
            $organizaciones = Organizacion::activos()->get();
            return view('reportes.reporte11',compact('organizaciones','organizacion','lugares'));
        }
        return back()->withInput()->with('demo','La organización seleccionada no tiene transportaciones asociadas');    
    }

    public function reporte12()
    {   
        $this->authorize('view',new Reporte1);
        $productos = Producto::activos()->get();
        return view('reportes.reporte12',compact('productos'));        
    }

    public function reporte12filtrado(Request $request)
    {   
        $this->authorize('view',new Reporte1);
        $producto = Producto::find($request['producto_id']);
        if ($producto->transfenvprod->count()) {
            $transfenvprod = $producto->transfenvprod;
            $productos = Producto::activos()->get();
            return view('reportes.reporte12',compact('transfenvprod','producto','productos'));
        }
        return back()->withInput()->with('demo','El producto seleccionado no tiene transportaciones asociadas');    
    }
}
