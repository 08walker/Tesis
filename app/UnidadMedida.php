<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 'unidad_medida';
    protected $fillable = [
        'name',
        'identificador',
        'activo',
        'tipo_unidad_medida_id',
    ];

    
    public function producto()
    {
        return $this->hasMany('App\Producto');
    }
    
    public function tipoUnidadMedida()
    {
        return $this->belongsTo('App\TipoUnidadMedida');
    }

    public function scopeActivos($query)
    {
        $query->where('activo','=','1');
    }

    public function scopeNoactivos($query)
    {
        $query->where('activo','=','0');
    }
}
