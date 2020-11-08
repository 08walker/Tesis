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
}
