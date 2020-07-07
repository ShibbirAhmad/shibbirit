<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientMessage;
use App\MessageReply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notification\ClientReplyNotification;


class ClientMessageController extends Controller

{
    
    //to get message notification
    public function getNotification(Request $request){

          $data=ClientMessage::where('status',0)->latest()->get();
          if ($request->ajax()) {
              
             return response()->json($data);
             
          }

    }





    
    //to get single user/client message 
    public function getSingleUser($client_id){
           
          $client=ClientMessage::findOrFail($client_id) ;
           
         return view('admin.client_email_reply',compact('client'));
          

    }



    //this function for reply to client message 
    public function replyToClient(Request $request) {

           
          $validator= Validator::make($request->all(),[
            'client_email' => 'required',
            'admin_email' => 'required',
            'message_body' => 'required',
     ]);

      if(!$validator->fails()){ 
            $id = $request->input('id');
          $message= new MessageReply() ;
          $message->client_email= $request->input('client_email');
          $message->admin_email= $request->input('admin_email');
          $message->subject= $request->input('subject');
          $message->message= $request->input('message_body');
          
         if ($message->save()) {

            //to define as message seen 
            $message_seen = ClientMessage::find($id);
            $message_seen->status = 1 ;
            $message_seen->save();

           // return ajax response 
            return response()->json([
                  'success' => "OK",
                  'data' => $message,
                  'status' => "Replied"
    
              ]);  
          }else{ 

            return response()->json([
                  'success' => 'Fail',
                  'errors' => $validator->errors()->all()
            ]);


             }
          
            }
          


            //reply email 

            Notification::route('mail',$request->input('client_email'))->notify( new ClientReplyNotification($message) );

          }

    








}
