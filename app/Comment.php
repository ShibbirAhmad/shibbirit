<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Post;

class Comment extends Model
{
    
    protected $fillable=['post_id','user_id','comment'];

    
    public function user(){

        return $this->belongsTo('App\User');
    }

    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }




}
