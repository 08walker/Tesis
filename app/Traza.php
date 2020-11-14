<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traza extends Model
{
    protected $table = 'trazas';
    protected $fillable = [
        'description',
        'ip',
    ];
}
