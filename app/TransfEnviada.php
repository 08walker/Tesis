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
    ];

    public function origen()
    {
        return $this->belongsTo('App\Lugar');
    }
    public function destino()
    {
        return $this->belongsTo('App\Lugar');
    }

}