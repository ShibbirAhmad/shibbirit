<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
class SubscriberController extends Controller
{
    public function index(Request $request){
          

        $this->validate($request,[

            'email' => 'required|email|unique:subscribers'
        ]);

        $subsciber= new Subscriber();
        $subsciber->email=$request->input('email'); 
        $up=$subsciber->save();
        if ($up) {
           
              return redirect()->back()->with('success','you have subscibed us');
        }
    }
}
