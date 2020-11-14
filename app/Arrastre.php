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
        'es_propio',
        'tara',
        'activo',
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

    // public function arrastretranspor()
    // {
    //     return $this->hasMany('App\ArrastreTranspor');
    // }

    public function transportaciones()
    {
        return $this->belongsToMany('App\Transportacion','arrastre_transpor','transportacion_id','arrastre_id')->withTimestamps();
    }
}
