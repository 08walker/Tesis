<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrastre extends Model
{
    protected $table = 'arrastres';
    protected $fillable = [
        'identificador',
        'description',
        'volumen_max_carga',
        'peso_max_carga',
        'tara',
        'activo',
        'ocupado',
        'equipo_id',
        'tercero_id',
        'tipo_arrastre_id',   
        'organizacion_id'
    ];

    public function tipoArrastre()
    {
        return $this->belongsTo('App\TipoArrastre');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Equipo');
    }

    public function tercero()
    {
        return $this->belongsTo('App\Tercero');
    }

    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }

    public function arrastretrasnp()
    {
        return $this->hasMany('App\Arrasrtre_Transp','arrastre_id');
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
}
