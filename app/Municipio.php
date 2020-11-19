<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $fillable = [
        'name',
        'provincia_id',
        'activo',
    ];

    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }

    public function tercero()
    {
        return $this->hasMany('App\Tercero');
    }

    public function organizacion()
    {
        return $this->hasMany('App\Organizacion');
    }

    public function lugar()
    {
        return $this->hasMany('App\Lugar');
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $url=str_slug($name);

        $duplicateUrlCount = Municipio::where('url','LIKE',"{$url}%")->count();

        if ($duplicateUrlCount) {
            $url .= "-".uniqid();
        }

        $this->attributes['url'] = str_slug($url);
    }

    public function scopeActivos($query)
    {
        $query->where('activo','=','1');
    }
}