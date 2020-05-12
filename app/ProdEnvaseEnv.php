<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdEnvaEnv extends Model
{
    protected $table = 'prod_envase_env';
    protected $fillable = [
        'cantidad_bultos',
        'peso_kg',
        'volumen_m3',
        'observacion',
        'producto_id',
        'hito_id',
        'transf_enviada_id',
        'equipo_arrastre_envase_id',
    ];
}
