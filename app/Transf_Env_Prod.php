<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transf_Env_Prod extends Model
{
    protected $table = 'transf__env__prods';
    protected $fillable = [
        'cantidad_bultos',
        'peso_kg',
        'volumen_m3',
        'observacion',
        'producto_id',
        'transf_enviada_id',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function transfenviada()
    {
        return $this->belongsTo('App\TransfEnviada','transf_enviada_id');
    }
}
