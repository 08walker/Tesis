<?php

namespace App\Http\Controllers;

use App\Arrasrtre_Transp;
use App\Arrasrtre_Transp_Enva;
use App\Transportacion;
use Illuminate\Http\Request;

class ArrasrtreTranspEnvaController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create',new Transportacion);
        //dd($request['arrast_transp_id']);
        $arrastre = Arrasrtre_Transp::find($request['arrast_transp_id']);
        if ($arrastre->arrastenva->count() > 0) {            
                if ($arrastre->arrastenva->contains('envase_id',$request['envase_id'])) {
                    return redirect()->route('transportaciones.formllenar',$arrastre->transportacion_id)->with('success', 'El envase ya está añadido');
                }
                else{
                    Arrasrtre_Transp_Enva::create([
                        'arrast_transp_id'=>$arrastre->id,
                        'envase_id'=>$request['envase_id'],
                    ]);
                    return redirect()->route('transportaciones.formllenar',$arrastre->transportacion_id)
                        ->with('success', 'El envase ha sido añadido');
                }
        }
        else{
                    Arrasrtre_Transp_Enva::create([
                        'arrast_transp_id'=>$arrastre->id,
                        'envase_id'=>$request['envase_id'],
                    ]);
                    return redirect()->route('transportaciones.formllenar',$arrastre->transportacion_id)
                        ->with('success', 'El envase ha sido añadido');
        }
    }

    public function destroy($id)
    {   
        $this->authorize('create',new Transportacion);
        $data = Arrasrtre_Transp_Enva::find($id);
        $data->delete();
        return back()->with('success', 'El envase ha sido eliminado');
    }
}
