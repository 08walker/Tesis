<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PTransfEnv extends Model
{
    protected $table = 'p_transf_env';
    protected $fillable = [
        'year',
        'month',
        'peso_kg',
        'origen_id',
        'destino_id',
        'producto_id',
    ];
}
