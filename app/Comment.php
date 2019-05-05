<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'user_id', 'contribution_id', 'comment',
    ];

    public function magazines()
    {
        return $this->belongsTo('App\Contribution');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
