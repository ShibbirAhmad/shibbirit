<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reply;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    public function replyStore(Request $request){
             
          
        $validator= Validator::make($request->all(),[
            'reply' => 'required',
        ]);
       
        if (!$validator->fails()) {
        
        $reply= new Reply();

        $reply->user_id=Auth::user()->id;
        $reply->comment_id=$request->commentId;
        $reply->reply=$request->reply;
        if ($reply->save()) {

            return response()->json([
                'success' => "OK",
                'data' => $reply,
                'status' => "added"

            ]);
          }else{

              return response()->json([
                  'success' => "Fail",
                  'errors'  => $validator->errors()->all()

              ]);
          }
       }


    }












}
