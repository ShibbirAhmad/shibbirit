<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index(){
        
         return view('admin.settings');
    }



    public function profileUpdate(Request $request, $id){
          
        $user=User::find($id);
        $data= $request->all();
     
        $validate=Validator::make($data,[
          
            'name' => 'required|min:4',
            'profileImage' => 'required|mimes:jpg,jpeg,png,gif',
            'about' => 'required', 

            ]);

        if ($validate->fails()) {
           
             return redirect()->back()->withErrors($validate)->withInput();

        }

        
        $user->name=$request->name;
        $user->about=$request->about;
        if ($user->save()) {
           
            if ($request->hasFile('profileImage')) {

                  //checking old image and deleting
            if (file_exists('backend/images/profile/'.$user->image) ) {
                  
                unlink('backend/images/profile/'.$user->image); 
                }

                $image=$request->file('profileImage');
                $slug=str_slug($request->name);
                $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('backend/images/profile/'),$imageName);
               
               
                 User::find($user->id)->update(['image'=>$imageName]);
              
                } 
              }
         

          return redirect()->back()->with('success',' Successfully! your profile info updated');

    }








}
