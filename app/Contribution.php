<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Model
{
    //just to test push
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'magazine_id', 'deleted_at', 'file', 'file_type',
    ];
}
