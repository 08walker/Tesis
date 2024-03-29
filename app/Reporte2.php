<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte2 extends Model
{
    protected $table = 'reporte2';
    protected $fillable = [
        'envase_id',
        'identificador',
        'lugares_name',
        'transportacion_id',
        'primera_vez',
        'ultima_vez',
    ];

    public function envase()
    {
        return $this->belongsTo('App\Envase','lugares_name');
    }
    
    public function transportacion()
    {
        return $this->belongsTo('App\Transportacion');
    }
}
