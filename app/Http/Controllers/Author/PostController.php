<?php

namespace App\Http\Controllers\Author;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Category;

//import for notification
use App\User;
use App\Notifications\NewAuthorPost;
use Illuminate\Support\Facades\Notification;

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
       
        $posts=Auth::user()->posts()->latest()->get();
        return view ('author.post.index',compact(['posts']));
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
       return view('author.post.create',compact(['categories','tags']));
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
        
        $post->is_approved=false;

        
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
        
        //notification coding
        $users=User::where('role_id','1')->get();
        Notification::send($users, new NewAuthorPost($post));


            return redirect()->route('author.post.index')->with('success','successfully! New Post Published');    
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
       if ($post->user_id != Auth::user()->id  ) {
           
            return redirect()->back()->with('warning','Access Deny for you ');
       }
        return view('author.post.show',compact(['post']));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user_id != Auth::user()->id  ) {
           
            return redirect()->back()->with('warning','Access Deny for you ');
       }

            $categories=Category::all();
            $tags=Tag::all();
       return view('author.post.edit',compact(['post','categories','tags']));

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
        

        if ($post->user_id != Auth::user()->id  ) {
           
            return redirect()->back()->with('warning','Access Deny for you ');
       }


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
        
        $post->is_approved=false;
                
      
        
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
          
        if ($post->user_id != Auth::user()->id  ) {
           
            return redirect()->back()->with('warning','Access Deny for you ');
       }
       
           
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
