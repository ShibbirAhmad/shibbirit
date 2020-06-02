<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Tag;
use App\Category;
use App\User;

class DashboardController extends Controller
{
    public function index(){

        $user=Auth::user();

        $total_post=$user->posts()->count();

        $favourite_post=$user->favourite_posts()->count();
        
        $total_author=User::where('role_id',2)->count();

        $today_author=User::where('role_id',2)->whereDate('created_at',Carbon::today() )->count();

        $total_pending_post=$user->posts()->where('is_approved',false)->count();

        $active_author=$user::where('role_id',2)
                              ->withCount('comments')
                              ->withCount('favourite_posts')
                              ->withCount('replies')
                              ->withCount('posts')
                              ->orderBy('posts_count','desc')
                              ->orderBy('comments_count','desc')
                              ->orderBy('favourite_posts_count','desc')
                              ->orderBy('replies_count','desc')
                              ->get();

        $popular_post=$user->posts()
                            ->withCount('comments')
                            ->withCount('favourite_to_users')
                            ->orderBy('view_count')
                            ->orderBy('comments_count')
                            ->orderBy('favourite_to_users_count')
                            ->take(10)->get();

        $total_views=$user->posts()->sum('view_count');

        $total_tag=Tag::all()->count();
        $total_category=Category::all()->count();

        return view('admin.dashboard',compact(['total_post',
                                                 'total_pending_post',
                                                 'popular_post',
                                                 'total_views',
                                                 'favourite_post',
                                                 'total_author',
                                                 'today_author',
                                                 'active_author',
                                                 'total_tag',
                                                 'total_category'
                                                 
                                             ]));
    
    
    
    }

}
