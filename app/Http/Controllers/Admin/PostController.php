<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Auth;
use App\Post;
use App\Tag;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $posts=Post::latest()->get();
        return view ('admin.post.index',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
       return view('admin.post.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $data= $request->all();
   
        $validate=Validator::make($data,[
          
            'title' => 'required|unique:posts',
            'postImage' => 'required|mimes:jpg,jpeg,png,gif',
            'categories' => 'required',
             'tags' => 'required',
             

            ]);

        if ($validate->fails()) {
           
             return redirect()->back()->withErrors($validate)->withInput();

        }
        $post=new Post();
        $post->user_id=Auth::user()->id;
        $post->title=$request->title;
        $post->slug=str_slug($request->title); 
        $post->body=$request->body;
        
        if (isset($request->status)) {
               $post->status=true;
        } else {
            $post->status=false;
        }
        
        $post->is_approved=true;

        
        if ($post->save()) {
           
              if ($request->hasFile('postImage')) {
                  $image=$request->file('postImage');
                  $slug=str_slug($request->title);
                  $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('backend/images/posts/'),$imageName);

                  Post::find($post->id)->update(['image'=>$imageName]);
                
                  } 
                }
            
                
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        
            return redirect()->back()->with('success','successfully! New Post Published');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
