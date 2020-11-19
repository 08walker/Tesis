<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoArrastre extends Model
{
    protected $table = 'tipo_arrastre';
    protected $fillable = [
        'name',
        'activo',
    ];
    public function arrastre()
    {
        return $this->hasMany('App\Arrastre');
    }

    public function scopeActivos($query)
    {
        $query->where('activo','=','1');
    }
}