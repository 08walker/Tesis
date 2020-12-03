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

    public function trecibida()
    {
        return $this->hasMany('App\TransfRecibida');
    }

    public function tenviada()
    {
        return $this->hasMany('App\TransfEnviada');
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