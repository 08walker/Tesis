<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    protected $table = 'tipo_equipo';
    protected $fillable = [
        'name',
        'activo',
    ];

    public function equipo()
    {
        return $this->hasMany('App\Equipo');
    }

    public function scopeActivos($query)
    {
        $query->where('activo','=','1');
    }
}