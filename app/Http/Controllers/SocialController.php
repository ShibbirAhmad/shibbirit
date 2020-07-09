<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
     
      
    //facebook external link

    public function facebook(){

        return redirect()->away('http://www.facebook.com');
    }


      
    //facebook external link

    public function instragram(){

        return redirect()->away('http://www.instragram.com');
    }


    
    public function linkedin(){

        return redirect()->away('http://www.linkedin.com');
    }
    
    

    
    public function twitter(){

        return redirect()->away('http://www.twitter.com');
    }


   
    public function pinterest(){

        return redirect()->away('http://www.pinterest.com');

    }

    
    
    public function github(){

        return redirect()->away('http://www.github.com');
    }


    
    public function vimeo(){

        return redirect()->away('http://www.vimeo.com');
    }


    
    public function shibbirit(){

        return redirect()->away('http://www.shibbirit.com');
    }


    
    public function colorlib(){

        return redirect()->away('http://www.colorlib.com');
    }

       
}
