<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelloEnviado extends Model
{
	protected $table = 'sello_enviado';
    protected $fillable = [
        'identificador',
	    'fyh_puesto',
	    'lugar_id',
	    'organizacion_id',
	    'arrastre_enva_equipo_id',
    ];
}