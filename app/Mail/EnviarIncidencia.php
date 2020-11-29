<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarIncidencia extends Mailable
{
    use Queueable, SerializesModels;

    public $hito; 
    public $correo;

    public function __construct($hito,$correo)
    {
        $this->hito = $hito;
        $this->correo = $correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.enviar-incidencia')
            ->subject('Se ha reportado una incidencia');
    }
}
