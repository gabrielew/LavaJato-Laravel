<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutomovelCad extends Model
{
    //
    protected $fillable = [
        'model', 'plate', 'color',
    ];
}
