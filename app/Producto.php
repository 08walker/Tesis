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
}
