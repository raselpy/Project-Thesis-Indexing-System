<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function ProjectFiles()
    {
        return $this->belongsTo('App\ProjectFiles', 'catagory' , 'id');
    }
    
    public function Idea()
    {
        return $this->belongsTo('App\Idea', 'catagory' , 'id');
    }
}
