<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $table = 'organizaciones';
    protected $fillable = [
        'name',
        'identificador',
        'activo',
        'municipio_id',
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }

    public function equipo()
    {
        return $this->hasMany('App\Equipo');
    }

    public function lugar()
    {
        return $this->hasMany('App\Lugar');
    }

    public function arrastre()
    {
        return $this->hasMany('App\Arrastre');
    }

    public function chofer()
    {
        return $this->hasMany('App\Chofer');
    }

    public function envase()
    {
        return $this->hasMany('App\Envase');
    }

    public function directivo()
    {
        return $this->hasOne('App\Directivo');
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $url=str_slug($name);

        $duplicateUrlCount = Organizacion::where('url','LIKE',"{$url}%")->count();

        if ($duplicateUrlCount) {
            $url .= "-".uniqid();
        }

        $this->attributes['url'] = str_slug($url);
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