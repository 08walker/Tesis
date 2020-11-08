<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoferEquipoTransp extends Model
{
    protected $table = 'chofer_equipo_transp';
    protected $fillable = [
        'transportacion_id',
        'chofer_id',
    ];
}
