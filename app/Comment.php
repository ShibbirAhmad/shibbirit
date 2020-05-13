<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Post;

class Comment extends Model
{
    
    protected $fillable=['post_id','user_id','comment'];

    //to know the relation of user
    public function user(){

        return $this->belongsTo('App\User');
    }

    //to know which post
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

     
    //to make relationship with replies
    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
    


}
