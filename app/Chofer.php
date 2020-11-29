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
        'ocupado',
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

    public function transportaciones()
    {
        return $this->belongsToMany('App\Transportacion','chofer_equipo_transp','transportacion_id','chofer_id');
    }

    public function scopeActivos($query)
    {
        $query->where('activo','=','1');
    }

    public function scopeDisponibles($query)
    {
        $query->where('ocupado','=','1');
    }
}
