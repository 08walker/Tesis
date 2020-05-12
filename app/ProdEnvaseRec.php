<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdEnvaRec extends Model
{
    protected $table = 'prod_envase_rec';
    protected $fillable = [
        'cantidad_bultos',
        'peso_kg',
        'volumen_m3',
        'observacion',
        'estado',
        'producto_id',
        'transf_recibida_id',
        'equipo_arrastre_envase_id',
    ];
}
