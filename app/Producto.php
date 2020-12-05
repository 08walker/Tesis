<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'name',
        'identificador',
        'description',
        'unidad_medida_id',
        'activo',
    ];

    public function unidadMedida()
    {
        return $this->belongsTo('App\UnidadMedida','unidad_medida_id');
    }

    public function transfenvprod()
    {
        return $this->hasMany('App\Transf_Env_Prod');
    }

    public function scopeActivos($query)
    {
        $query->where('activo','=','1');
    }

    public function scopeNoactivos($query)
    {
        $query->where('activo','=','0');
    }

    public function reporte1()
    {
        return $this->hasMany('App\Reporte1');
    }

    public function reporte1a()
    {
        return $this->hasMany('App\Reporte1a');
    }

}
