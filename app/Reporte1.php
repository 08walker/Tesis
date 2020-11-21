<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte1 extends Model
{
    protected $table = 'reporte1';
    protected $fillable = [
        'producto_id',
        'SUM(peso_kg)',
        'fyh_salida'
    ];
}
