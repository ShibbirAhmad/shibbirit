<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Comment;


class CommentController extends Controller
{
      
    
        public function commentStore(Request $request){ 
             
          

          $validator= Validator::make($request->all(),[
                  'comment' => 'required',
           ]);

            if(!$validator->fails()){ 
            $comment= new Comment();
            $comment->user_id=Auth::user()->id;
            $comment->post_id=$request->postId;
            $comment->comment=$request->comment;
            if ($comment->save()) {
                
                return response()->json([
                    'success' => "OK",
                    'data' => $comment,
                    'status' => "added"

                ]);
            
            }

        }else{ 

        return response()->json([
            'success' => 'Fail',
            'errors' => $validator->errors()->all()
        ]);


        }
    }









}
