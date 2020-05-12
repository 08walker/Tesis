<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';
    protected $fillable = [
        'name',
        'activo',
    ];

    public function municipio()
    {
        return $this->hasMany('App\Municipio');
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $url=str_slug($name);

        $duplicateUrlCount = Provincia::where('url','LIKE',"{$url}%")->count();

        if ($duplicateUrlCount) {
            $url .= "-".uniqid();
        }

        $this->attributes['url'] = str_slug($url);
    }
}