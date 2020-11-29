<?php

namespace App\Listeners;

use App\Events\HitoFueCreado;
use App\Mail\EnviarIncidencia;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarCorreo
{
    public function handle(HitoFueCreado $event)
    {
        //dd($event->hito->toArray(),$event->correos);
        foreach ($event->correos as $correo) {
            Mail::to($correo)->queue(
                new EnviarIncidencia($event->hito,$correo)
            );    
        }        
    }
}
