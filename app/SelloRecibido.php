<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelloRecibido extends Model
{
	protected $table = 'sello_recibido';
    protected $fillable = [
        'identificador',
	    'fyh_quitado',
	    'observacion',
	    'lugar_id',
	    'organizacion_id',
	    'equipo_arrastre_envase_id',
    ];   
}