<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrastreTranspor extends Model
{
    protected $table = 'arrastre_transpor';
    protected $fillable = [
        'transportacion_id',
        'arrastre_id',
    ];

    // public function transportaciones()
    // {
    //     return $this->belongsTo('App\Transportacion');
    // }

    //  public function transportacion()
    // {
    //     return $this->belongsTo('App\Transportacion');
    // }


    // public function arrastre()
    // {
    //     return $this->belongsTo('App\Arrastre');
    // }
}
