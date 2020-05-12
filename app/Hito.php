<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hito extends Model
{
    protected $table = 'hitos';
    protected $fillable = [
        'fyh_ini',
        'fyh_fin',
        'description',
        'observaciones',
        'equipo_transp_id',
        'tipo_hito_id ',
        'lugar_id',
    ];

    public function tipoHito()
    {
        return $this->belongsTo('App\TipoHito');
    }
}
