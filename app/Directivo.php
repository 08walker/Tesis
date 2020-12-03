<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directivo extends Model
{
    protected $table = 'directivos';
    protected $fillable = [
        'name',
        'activo',
        'organizacion_id',
        'user_id',
    ];

    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
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
