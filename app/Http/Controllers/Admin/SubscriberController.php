<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    //
    public function index(){

         $subscriber = Subscriber::latest()->get();
         return view('admin.subscriber.index',compact(['subscriber']));
    }
   



    public function destroy($id){

        $subscriber= Subscriber::findOrFail($id);
        $dlt=$subscriber->delete();
        if ($dlt) {
           
              return redirect()->back()->with('warning','one subscriber has removed');
        }
    }




}
