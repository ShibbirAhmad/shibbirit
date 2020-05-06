<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;


class CommentController extends Controller
{
      
    
        public function commentStore(Request $request, $postId){
             
          

            $this->validate($request,[ 'comment' => 'required' ]);

            $comment= new Comment();

            $comment->user_id=Auth::user()->id;
            $comment->post_id=$postId;
            $comment->comment=$request->comment;
            if ($comment->save()) {
                
                return redirect()->back()->with('success','your comment successfully posted');
            }


        }









}
