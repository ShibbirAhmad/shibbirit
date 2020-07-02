<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){
        
        return view('author.settings');
   }



   public function profileUpdate(Request $request, $id){
         
       $user=User::find($id);
       $data= $request->all();
    
       $validate=Validator::make($data,[
         
           'name' => 'required|min:4',
           'profileImage' => 'mimes:jpg,jpeg,png,gif',
           'about' => 'required', 

           ]);

       if ($validate->fails()) {
          
            return redirect()->back()->withErrors($validate)->withInput();

       }


       $user->name=$request->name;
       $user->profession=$request->profession;
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



  
    //function for password chane
    public function updatePassword(Request $request, $id){
          
        $user=User::findorFail($id);
        
        $this->validate($request,[
            'old_password' => 'required',
            'password'     => 'required|confirmed'
        ]);


       $oldPassword=$user->password;

       if (Hash::check($request->old_password, $oldPassword)) {
          
           if (!Hash::check($request->password, $oldPassword)) {
                   $user->password=Hash::make($request->password);
                   $saved=$user->save();
               if ($saved) {
                    
                   Auth::logout();
                  
                   return redirect()->back()->with('success','successfully! your current password changed');
                   return redirect()->back()->to(route('home'));
               }
              
           } else {
              return redirect()->back()->with('warning','New password & old password can not be same');
           }
             

       }else {
           
           return redirect()->back()->with('danger','current password does not matched');
       }



   }


    






}
