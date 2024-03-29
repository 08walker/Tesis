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
        'ocupado',
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

    public function arrastenva()
    {
        return $this->hasMany('App\Arrasrtre_Transp_Enva','envase_id');
    }

    public function reporte2()
    {
        return $this->hasMany('App\Reporte2');
    }

    public function scopeActivos($query)
    {
        $query->where('activo','=','1');
    }

    public function scopeNoactivos($query)
    {
        $query->where('activo','=','0');
    }

    public function scopeDisponibles($query)
    {
        $query->where('ocupado','=','1');
    }

    public function scopePropios($query)
    {
        $query->whereNotNull('organizacion_id');
    }

}
