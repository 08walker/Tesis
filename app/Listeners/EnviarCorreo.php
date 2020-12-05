<?php

namespace App\Listeners;

use App\Events\HitoFueCreado;
use App\Mail\EnviarIncidencia;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnviarCorreo
{
    public function handle(HitoFueCreado $event)
    {
        // dd($event->hito->toArray(),$event->correos);
        // no funciona porque no encuentra una direccion de salida
        // foreach ($event->correos as $correo) {
        //     Mail::to($correo)->queue(
        //         new EnviarIncidencia($event->hito,$correo)
        //     );    
        // }    
    }
}
