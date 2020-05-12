<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransfRecibida extends Model
{
    protected $table = 'transf_recibidas';
    protected $fillable = [
        'fyh_llegada',
        'num_fact',
        'origen_id',
        'destino_id',
    ];
}
