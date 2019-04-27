<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
    
    public function contributions()
    {
        return $this->hasMany('App\Contribution');
    }
    /**
    *User faculty scope - this groups users based on faculty
    *
    */
    public function scopeFaculty($query, $faculty)
    {
        return $query->where('type', $type);
    }
}
