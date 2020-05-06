<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;


class PostController extends Controller
{
    public function index($slug){
     
        $post=Post::where('slug',$slug)->first();
        $randomPost=Post::all()->random(3);
        $categories=Category::all();
        $tags=Tag::all();

        return view('site.postDetails',compact(['post','randomPost','categories','tags']));

    }




}
