<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'lugares';
    protected $fillable = [
        'name',
        'activo',
        'municipio_id',
        'tercero_id',
        'organizacion_id'
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }

    public function tercero()
    {
        return $this->belongsTo('App\Tercero');
    }

    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }
}