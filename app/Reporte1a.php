<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reporte1a extends Model
{
    protected $table = 'reporte1';
    protected $fillable = [
        'producto_id',
        'suMpeso',
        'fyh_salida'
    ];
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function scopeEnrango($query,$fecha1,$fecha2)
    {
        $query->where('fyh_salida','>=',Carbon::parse($fecha1))->where('fyh_salida','<=',Carbon::parse($fecha2));
    }
}