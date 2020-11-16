<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transf_Rec_Prod extends Model
{
    protected $table = 'transf__rec__prods';
    protected $fillable = [
        'cantidad_bultos',
        'peso_kg',
        'volumen_m3',
        'observacion',
        'estado',
        'producto_id',
        'transf_recibida_id',
    ];
}
