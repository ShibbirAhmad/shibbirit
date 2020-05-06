<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reply;

class ReplyController extends Controller
{
    public function replyStore(Request $request, $commentId){
             
          

        $this->validate($request,[ 'reply' => 'required' ]);

        $reply= new Reply();

        $reply->user_id=Auth::user()->id;
        $reply->comment_id=$commentId;
        $reply->reply=$request->reply;
        if ($reply->save()) {
            
            return redirect()->back()->with('success',' successfully replied');
        }


    }












}
