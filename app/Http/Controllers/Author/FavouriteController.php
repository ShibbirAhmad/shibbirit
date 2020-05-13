<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    public function index(){
         
        $posts=Auth::user()->favourite_posts;

        return view('author.favourite',compact(['posts']) );
    }



  public function removeFavourite($postId){

          
    $user=Auth::user();
    $isFavourite=$user->favourite_posts()->where('post_id',$postId)->count();

    if ($isFavourite == 1) {
       
       $user->favourite_posts()->detach($postId);
       return redirect()->back()->with('warning','this post remove from your favourite list');
      
       }

    }


}