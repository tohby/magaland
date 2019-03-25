<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Magazine extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'magazine_volume', 'closure', 'final_closure',
    ];
}
