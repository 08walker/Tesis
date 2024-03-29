<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TransfEnviada extends Model
{
    protected $table = 'transf_enviadas';
    protected $fillable = [
        'fyh_salida',
        'fyh_llegada',
        'num_fact',
        'origen_id',
        'destino_id',
        'transportacion_id',
    ];

    public function origen()
    {
        return $this->belongsTo('App\Lugar','origen_id');
    }
    public function destino()
    {
        return $this->belongsTo('App\Lugar','destino_id');
    }

    public function transportacion()
    {
        return $this->belongsTo('App\Transportacion');
    }

    public function transfenvprod()
    {
        return $this->hasMany('App\Transf_Env_Prod','transf_enviada_id');
    }

    public function scopeRecibidas($query)
    {
        $query->whereNotNull('fyh_llegada');
    }

    public function scopeEncurso($query)
    {
        $query->whereNull('fyh_llegada');
    }

    // public function scopeEnrango($query,$fecha1,$fecha2)
    // {
    //     $query->where('fyh_salida','>=',Carbon::parse($fecha1))->where('fyh_salida','<=',Carbon::parse($fecha2));
    // }

    // public function setFyhSalidaAttribute($fyh_salida)
    // {
    //     $this->attributes['fyh_salida'] = $fyh_salida
    //                                         ? Carbon::parse($fyh_salida)
    //                                         :null;
    // }

    // public function setFyhLlegadaAttribute($fyh_llegada)
    // {
    //     $this->attributes['fyh_llegada'] = $fyh_llegada
    //                                         ? Carbon::parse($fyh_llegada)
    //                                         :null;
    // }

}