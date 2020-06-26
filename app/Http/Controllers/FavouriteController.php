<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addFavourite($postId){

         $user=Auth::user();
         $isFavourite=$user->favourite_posts()->where('post_id',$postId)->count();

         if ($isFavourite == 0) {
             $user->favourite_posts()->attach($postId);
             return redirect()->back()->with('success',' post added to your favourite');
         } else {
            
            $user->favourite_posts()->detach($postId);
            return redirect()->back()->with('warning','removed from your favourite');
         }
         


    }
}
