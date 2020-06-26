<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Category;

//import class for notification
use App\Notifications\AuthorPostApprove;
use App\Notifications\NewPostNotify;
use Illuminate\Support\Facades\Notification;
use App\Subscriber;

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
            'postImage' => 'mimes:jpg,jpeg,png,gif',
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
        

        //subscriber notification coding
        $subscribers=Subscriber::all();
        foreach ($subscribers as $subscriber) {
              
            Notification::route('mail',$subscriber->email)->notify( new NewPostNotify($post) );

        }
            return redirect()->route('admin.post.index')->with('success','successfully! New Post Published');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
            
            

        return view('admin.post.show',compact(['post']));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
            $categories=Category::all();
            $tags=Tag::all();
       return view('admin.post.edit',compact(['post','categories','tags']));
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
        $data= $request->all();
   
        $validate=Validator::make($data,[
          
            'title' => 'required',
            'postImage' => 'mimes:jpg,jpeg,png,gif',
            'categories' => 'required',
             'tags' => 'required',
             

            ]);

        if ($validate->fails()) {
           
             return redirect()->back()->withErrors($validate)->withInput();

        }
     
    
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
 
                //checking old image and deleting
            if (file_exists('backend/images/posts/'.$post->image) ) {
                  
                unlink('backend/images/posts/'.$post->image); 
                }
                  $image=$request->file('postImage');
                  $slug=str_slug($request->title);
                  $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('backend/images/posts/'),$imageName);

                  Post::find($post->id)->update(['image'=>$imageName]);
                
                  }
                }
            
                
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        
            return redirect()->back()->with('success','successfully! this Post Updated');    
   
    }

    

    //pending function 
    public function pending(){

         $posts=Post::where('is_approved',false)->latest()->get();
         return view('admin.post.pending',compact(['posts']));
    }

    //approval function of post 
    public function approve($id){

           $post=Post::find($id); 

          if ($post->is_approved==false) {
              
                $post->is_approved=true;
                $post->save();
                
                //notification coding to author
                $post->user->notify( new AuthorPostApprove($post));

              //subscriber notification coding
               $subscribers=Subscriber::all();
      foreach ($subscribers as $subscriber) {
              
            Notification::route('mail',$subscriber->email)->notify( new NewPostNotify($post) );

        }

                return redirect()->back()->with('success','This Post is approved');
          }

          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
          
        $post->categories()->detach();
        $post->tags()->detach();

         if (file_exists('backend/images/posts/'.$post->image)) {
          
          unlink('backend/images/posts/'.$post->image);

       }
       
       if ( $post->delete()) {
              
        return redirect()->back()->with('warning','one post Deleted ');
     
        }


    }








}
