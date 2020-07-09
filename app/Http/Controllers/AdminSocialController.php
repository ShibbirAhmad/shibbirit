<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSocialController extends Controller
{
    
    public function facebook(){

        return redirect()->away('https://web.facebook.com/');
    }

     
      
    public function upwork(){

        return redirect()->away('https://www.upwork.com');
    }


    public function fiver(){

        return redirect()->away('https://www.fiver.com');
    }

      
    public function instragram(){

        return redirect()->away('https://www.instragram.com');
    }
    
    

      
    public function google_plus(){

        return redirect()->away('https://www.google-plus.com');
    }
    
    

    
    public function linkedin(){

        return redirect()->away('https://www.linkedin.com/in/shibbir-ahmad-91a855167/');
    }
    
    

    
    public function twitter(){

        return redirect()->away('http://www.twitter.com');
    }


   
    public function pinterest(){

        return redirect()->away('http://www.pinterest.com');

    }

    
    
    public function github(){

        return redirect()->away('https://github.com/ShibbirAhmad');
    }



    public function youtube(){

        return redirect()->away('http://www.youtube.com');
    }


    public function skype(){

        return redirect()->away('http://www.skype.com');
    }


}
