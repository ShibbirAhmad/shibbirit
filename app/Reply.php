<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $fillable=['comment_id','user_id','reply'];
    
    //to know user
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    //to know comment
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }




}
