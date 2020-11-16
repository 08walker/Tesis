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
}
