<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrastreTranspor extends Model
{
    protected $table = 'arrastre_transpor';
    protected $fillable = [
        'arrastre_transp_id',
        'arrastre_id',
    ];
}
