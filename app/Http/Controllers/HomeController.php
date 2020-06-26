<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $categories= Category::all();
        $tags=Tag::all();
        $posts=Post::latest()->approved()->published()->take(9)->get();
        return view('site.index',compact(['posts','categories','tags']) );

    }


    // to get data by ajax 
    public function getDataByAjax(){

    return  Post::first()->approved()->published()->take(6)->get();
    

    }




}
