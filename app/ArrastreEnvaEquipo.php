<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrastreEnvaEquipo extends Model
{
    protected $table = 'arrastre_enva_equipo';
    protected $fillable = [
        'observacion',
        'arrastre_transp_id',
        'envase_id',
    ];
}
