<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoTransportacion extends Model
{
    protected $table = 'equipo_transportacion';
    protected $fillable = [
        'transportacion_id',
        'equipo_id',
    ];
}
