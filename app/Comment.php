<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
