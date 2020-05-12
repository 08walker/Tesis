<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envase extends Model
{
    protected $table = 'envases';
    protected $fillable = [
        'identificador',
        'volumen_max_carga',
        'tara',
        'es_propio',
        'activo',
        'tercero_id',
        'organizacion_id',
    ];

    public function tercero()
    {
        return $this->belongsTo('App\Tercero');
    }

    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }
}
