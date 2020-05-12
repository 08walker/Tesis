<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidadMedida extends Model
{
    protected $table = 'tipo_unidad_medida';
    protected $fillable = [
        'name',
        'activo',
    ];

    public function unidadMedida()
    {
        return $this->hasMany('App\UnidadMedida');
    }
}