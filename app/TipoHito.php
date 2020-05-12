<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHito extends Model
{
    protected $table = 'tipo_hito';
    protected $fillable = [
        'name',
        'aumenta',
        'disminuye',
    ];
    public function hito()
    {
        return $this->hasMany('App\Hito');
    }
}