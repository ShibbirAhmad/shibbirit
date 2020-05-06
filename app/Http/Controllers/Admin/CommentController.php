<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    
      public function index(){
          
          $comments=Comment::latest()->get();
          return view('admin.comment',compact(['comments']));
      }




      public function destroy($id){

           $comment=Comment::findOrFail($id);
           
           if ($comment->delete()) {
               
               return redirect()->back()->with('danger','one comment Deleted!');
           
            }


      }




}
