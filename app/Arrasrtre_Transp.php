<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrasrtre_Transp extends Model
{
    protected $table = 'arrasrtre__transps';
    protected $fillable = [
        'transportacion_id',
        'arrastre_id',
    ];

   public function arrastres()
    {
        return $this->belongsTo('App\Arrastre','arrastre_id');
    }
   public function transportaciones()
    {
        return $this->belongsTo('App\Transportacion','transportacion_id');
    }

    public function arrastenva()
    {
        return $this->hasMany('App\Arrasrtre_Transp_Enva','arrast_transp_id');
    }
}
