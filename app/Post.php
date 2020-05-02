<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
 
    {
        return $this->belongsTo('App\User');
    }


//to make relationship with category
public function categories()
{
    return $this->belongsToMany('App\Category')->withTimestamps();
}



//to make relationship with tags
public function tags()
{
    return $this->belongsToMany('App\Tag')->withTimestamps();
}








   
}
