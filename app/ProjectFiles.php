<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFiles extends Model
{

	protected $fillable = [
        'type', 'catagory', 'name','description', 'required_technology', 'path',
    ];

    public function Category()
    {
        return $this->hasOne('App\Category');
    }
    public function Comment()
    {
        return $this->hasMany('App\Comment');
    }

    
}
