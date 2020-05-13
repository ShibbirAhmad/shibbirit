<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Post;
use App\Category;
use App\Tag;


class PostController extends Controller
{
    public function index($slug){
     
        $post=Post::where('slug',$slug)->published()->approved()->first();
        //this for view count
        $countKey='view'.$post->id;
        if (!Session::has($countKey)) {
            $post->increment('view_count');
            Session::put($countKey,1);
        }


        $randomPost=Post::approved()->published()->take(3)->inRandomOrder()->get();
        $categories=Category::all();
        $tags=Tag::all();

        return view('site.postDetails',compact(['post','randomPost','categories','tags']));

    }




    //to show all post
    public function posts(){

        $posts=Post::latest()->approved()->published()->paginate(6);
        return view('site.posts',compact('posts'));


    }


    //display posts by related it's category
    public function categoryPost($category_slug){

            $categories=Category::all();
            $tags=Tag::all();
            $category=Category::where('slug',$category_slug)->first();
            $posts=$category->posts()->approved()->published()->get();

           return view('site.post_by_category',compact(['category','posts']));

    }


      //display posts by related it's category
      public function tagPost($category_slug){

        $categories=Category::all();
        $tags=Tag::all();
        $tag=Tag::where('slug',$category_slug)->first();
        $posts=$tag->posts()->published()->approved()->get();

       return view('site.post_by_tag',compact(['tag','posts']));

}



}
