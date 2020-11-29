<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class HitoFueCreado
{
    use Dispatchable, SerializesModels;

    public $hito;

    public function __construct($hito,$correos)
    {
        $this->hito = $hito;
        $this->correos = $correos;
    }
}
