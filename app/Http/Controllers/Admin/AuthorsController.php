<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthorsController extends Controller
{
    public function index(){

        $authors=User::where('role_id',2)->withCount('posts')
                       ->withCount('favourite_posts')
                       ->withCount('comments')->get();
                  
        return view('admin.author',compact(['authors']));               

    }


    public function destroy($id){
      
        $author=User::findOrFail($id);
        if ($author->delete()) {
            
            return redirect()->back()->with('danger','one author Deleted! ');
        }
          
    }


}
