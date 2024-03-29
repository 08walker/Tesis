<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportacion extends Model
{
    protected $table = 'transportaciones';
    protected $fillable = [
        'numero',
        'observacion',
        'equipo_id',
        'terminada'
    ];

	public function equipo()
    {
        return $this->belongsTo('App\Equipo');
    }

    public function arrastretrasnp()
    {
        return $this->hasMany('App\Arrasrtre_Transp','transportacion_id');
    }    

    public function transfenviada()
    {
        return $this->hasMany('App\TransfEnviada');
    }

    public function hito()
    {
        return $this->hasMany('App\Hito');
    }
    
    public function reporte2()
    {
        return $this->hasMany('App\Reporte2');
    }

    public function chofertransp()
    {
        return $this->hasMany('App\ChoferEquipoTransp','transportacion_id');
    }

    public function scopeTerminada($query)
    {
        $query->where('terminada','=','1');
    }

    public function scopeNoterminada($query)
    {
        $query->where('terminada','=','0');
    }
}
