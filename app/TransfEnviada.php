<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransfEnviada extends Model
{
    protected $table = 'transf_enviadas';
    protected $fillable = [
        'fyh_salida',
        'fyh_estimada_llegada',
        'num_fact',
        'origen_id',
        'destino_id',
    ];
}