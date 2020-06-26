<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index(){
         
          $posts=Auth::user()->favourite_posts;

          return view('admin.favourite',compact(['posts']) );
    }
    
    public function removeFavourite($postId){

          
         $user=Auth::user();
         $isFavourite=$user->favourite_posts()->where('post_id',$postId)->count();

         if ($isFavourite == 1) {
            
            $user->favourite_posts()->detach($postId);
            return redirect()->back()->with('warning',' remove from favourite ');
         }


    }


}
