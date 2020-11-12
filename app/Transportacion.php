<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportacion extends Model
{
    protected $table = 'transportaciones';
    protected $fillable = [
        'numero',
        'observacion',
        'equipo_id'
    ];

	public function equipo()
    {
        return $this->belongsTo('App\Equipo');
    }

     public function choferes()
    {
        return $this->belongsToMany('App\Chofer','chofer_equipo_transp','transportacion_id','chofer_id')->withTimestamps();
    }

    public function arrastretranspor()
    {
        return $this->hasMany('App\ArrastreTranspor');
    }

    // public function arrastretranspor()
    // {
    //     return $this->hasOne('App\ArrastreTranspor');
    // }

    // public function arrastres()
    // {
    //     return $this->belongsToMany('App\Arrastre','arrastre_transpor','transportacion_id','arrastre_id')->withTimestamps();
    // }
}
