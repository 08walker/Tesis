<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hito extends Model
{
    protected $table = 'hitos';
    protected $fillable = [
        'description',
        'observaciones',
        'tipo_hito_id ',
        'transportacion_id',
    ];

    public function tipoHito()
    {
        return $this->belongsTo('App\TipoHito');
    }
}
