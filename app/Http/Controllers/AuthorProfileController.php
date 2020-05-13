<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;


class AuthorProfileController extends Controller
{
    public function index($username){

        $categories=Category::all();
        $author=User::where('username',$username)->first();
        $posts=$author->posts()->approved()->published()->paginate(6);
      

          return view('site.authorProfile',compact(['posts','author','categories']));


    }




}
