<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
            'role_id','name', 'username', 'email', 'password' , 'image', 'about'
        ];

        //to know role or user
        public function role()
        {
            return $this->belongsTo('App\Role');
        }


        //to know how many post of user

        public function posts()
        {
            return $this->hasMany('App\Post');
        }


        //to know one post are how many user to  favourite
        public function favourite_posts()
        {
            return $this->belongsToMany('App\Post')->withTimestamps();
        }


        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];


        //to make relationship with user comments
        public function comments(){

            return $this->hasMany('App\Comment');
        }

        //to know all replies of user
        public function replies(){

            return $this->hasMany('App\Reply');
        }





}
