<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoUnidadMedida extends Model
{
    protected $table = 'producto_unidad_medida';
    protected $fillable = [
        'name',
        'factor',
        'unidad_medidas_id',
        'producto_id',
    ];
}
