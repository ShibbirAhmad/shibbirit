<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    
     
    public function index(){
          
        $comments=Comment::latest()->get();
        return view('author.comment',compact(['comments']));
    }




    public function destroy($id){

         $comment=Comment::findOrFail($id);
         
         if (Auth::user()->id== $comment->post->user_id ) {
           
             $comment->delete();
             return redirect()->back()->with('danger','one comment Deleted!');
         
          }else {
              
               return redirect()->back()->with('danger','you are not permited to Delete comment of other author post!');
          }


    }



}
