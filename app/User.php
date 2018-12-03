<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'name', 'email', 'password', 'role',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

     public function favorite_ideas()
    {
        return $this->belongsToMany('App\Idea')->withTimestamps();
    }

        public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    
}
