<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
	protected $fillable = [
        'type', 'catagory', 'name','description', 'required_technology', 
    ];

    public function Category()
    {
        return $this->hasOne('App\Category');
    }

    public function favorite_to_users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
