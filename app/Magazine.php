<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Magazine extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'magazine_volume','deleted_at', 'closure', 'final_closure',
    ];

    public function contributions()
    {
        return $this->hasMany('App\Contribution');
    }
}
