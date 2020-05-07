<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function search(Request $request){

        $this->validate($request,['search_field' => 'required']);

         $searchQuery=$request->input('search_field');
         $posts=Post::where('title','LIKE',"% $searchQuery %")->approved()->published()->get();
       
         return view('site.search',compact(['posts','searchQuery']));

    }







}
