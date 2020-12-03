<?php

namespace App\Http\Controllers;

use App\ChoferEquipoTransp;
use App\Transportacion;
use Illuminate\Http\Request;

class ChoferEquipoTranspController extends Controller
{
  public function store(Request $request,Transportacion $transportacion)
    {
         $this->authorize('create',new Transportacion);
        
        $data = $request['lchofer'];
        //si viene vacio sale
        if ($data) {
            if ($transportacion->chofertransp->count() > 0) {
                foreach ($data as $dat) {
                if ($transportacion->chofertransp->contains('chofer_id',$dat)) {
                    return redirect()->route('transportaciones.formllenar',$transportacion)
                        ->with('success', 'El chofer ya está añadido');
                }
                else{
                      ChoferEquipoTransp::create([
                       'transportacion_id'=>$transportacion->id,
                       'chofer_id'=>$dat,
                      ]);
                    }
                }
            }
            else{
                foreach ($data as $dat) {
                      ChoferEquipoTransp::create([
                       'transportacion_id'=>$transportacion->id,
                       'chofer_id'=>$dat,
                      ]);
                }
            }
        }        
        return redirect()->route('transportaciones.formllenar',$transportacion)
            ->with('success', 'El chofer ha sido añadido');
    }

    public function destroy($id)
    {
        $this->authorize('create',new Transportacion);
        $data = ChoferEquipoTransp::find($id);
        $data->delete();
        return back()->with('success', 'El chofer ha sido eliminado');
    }
}
