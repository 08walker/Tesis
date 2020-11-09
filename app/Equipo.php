<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = [
        'identificador',
        'description',
        'volumen_max_carga',
        'peso_max_carga',
        'puede_cargar',
        'es_propio',
        'tara',
        'activo',
        'tipo_equipo_id',
        'tercero_id',
        'organizacion_id',
    ];

    public function tipoEquipo()
    {
        return $this->belongsTo('App\TipoEquipo');
    }

    public function tercero()
    {
        return $this->belongsTo('App\Tercero');
    }

    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }

    public function arrastre()
    {
        return $this->hasMany('App\Arrastre');
    }

    public function chofer()
    {
        return $this->hasOne('App\Chofer');
    }

    public function transportacion()
    {
        return $this->hasOne('App\Transportacion');
    }
}