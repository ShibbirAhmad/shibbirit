<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


        protected $fillable=[
                'user_id',
                'title',
                'slug',
                'image',
                'body',
                
        ];

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




        //to know one post are how many user to  favourite
        public function favourite_to_users()
        {
            return $this->belongsToMany('App\User')->withTimestamps();
        }



        //to make relationship with comments
        public function comments(){

            return $this->hasMany('App\Comment');
        }



        //to check post approved
        public function scopeApproved($query){

            return $query->where('is_approved',1);
        }
      

         //to check poststatus
         public function scopePublished($query){

            return $query->where('status',1);
        }
      



   
}
