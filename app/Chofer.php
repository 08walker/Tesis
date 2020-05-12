<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table = 'choferes';
    protected $fillable = [
        'name',
        'apellido',
        'ci',
        'licencia',
        'telefono',
        'es_propio',
        'equipo_id',
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

    public function equipo()
    {
        return $this->belongsTo('App\Equipo');
    }
}
