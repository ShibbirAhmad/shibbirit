<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientMessage;

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
           
         return  $client=ClientMessage::findOrFail($client_id) ;
           
          

    }


    








}
