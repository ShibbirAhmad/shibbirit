<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ClientMessage;



class ClientMessageController extends Controller
{
   
   // function for receving client message 
    public function clientMessage(Request $request){
           
          $validator = Validator::make($request->all(),[
              'name'    => 'required',
              'email'   => 'required',
              'message' => 'required',
          ]);

          if (!$validator->fails()) {
            
             $message = new ClientMessage();
             $message->name=$request->name;
             $message->email=$request->email;
             $message->subject=$request->subject;
             $message->message=$request->message;
              
             if ($message->save()) {
                
                  return response()->json([

                    'success' => "OK",
                    'data'    => $message,
                    'status'  => "sent"
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
