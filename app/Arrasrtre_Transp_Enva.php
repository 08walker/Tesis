<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrasrtre_Transp_Enva extends Model
{
    protected $table = 'arrasrtre__transp__envas';
    protected $fillable = [
        'arrast_transp_id',
        'envase_id',
    ];

    public function envase()
    {
        return $this->belongsTo('App\Envase');
    }

    public function arrasrtre_transps()
    {
        return $this->belongsTo('App\Arrasrtre_Transp','arrast_transp_id');
    }
}
