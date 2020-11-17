<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransfEnviada extends Model
{
    protected $table = 'transf_enviadas';
    protected $fillable = [
        'fyh_salida',
        'num_fact',
        'origen_id',
        'destino_id',
        'transportacion_id',
    ];

    public function origen()
    {
        return $this->belongsTo('App\Lugar');
    }
    public function destino()
    {
        return $this->belongsTo('App\Lugar');
    }

    public function transportacion()
    {
        return $this->belongsTo('App\Transportacion');
    }

    public function transfenvprod()
    {
        return $this->hasOne('App\Transf_Env_Prod','transf_enviada_id');
    }

}