<?php

namespace App\Http\Controllers;

use App\Arrasrtre_Transp;
use App\Transportacion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ArrasrtreTranspController extends Controller
{
    //Para llenar tabla arrasrtre__transps
    public function store(Request $request,Transportacion $transportacion)
    {
        $this->authorize('create',new Transportacion);
        
        $data = $request['larrastre'];
        //si viene vacio sale
        if ($data) {
            if ($transportacion->arrastretrasnp->count() > 0) {
                foreach ($data as $dat) {
                if ($transportacion->arrastretrasnp->contains('arrastre_id',$dat)) {
                    return redirect()->route('transportaciones.formllenar',$transportacion)->with('success', 'El arrastre ya está añadido');
                }
                else{
                      Arrasrtre_Transp::create([
                       'transportacion_id'=>$transportacion->id,
                       'arrastre_id'=>$dat,
                      ]);
                    }
                }
            }
            else{
                foreach ($data as $dat) {
                      Arrasrtre_Transp::create([
                       'transportacion_id'=>$transportacion->id,
                       'arrastre_id'=>$dat,
                      ]);
                }
            }
        }        
        return redirect()->route('transportaciones.formllenar',$transportacion)->with('success', 'El arrastre ha sido añadido');
    }

    public function destroy($id)
    {
        $this->authorize('create',new Transportacion);
        $arrastre = Arrasrtre_Transp::find($id);
        //$arrastre->delete();
        try {
         $arrastre->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $arrastre->update(['activo'=>'0']);
                    // Traza::create([
                    // 'description'=> "El arrastre {$arrastre->identificador} desactivado por el usuario {$nombre}",
                    // 'ip'=>$ip,
                    // ]);
                    return back()->with('success', 'El arrastre tiene envases asociados');  
               }
               return back()->with('success', 'El arrastre tiene envases asociados');  
        }
        return back()->with('success', 'El arrastre ha sido eliminado');
    }
}
