<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

        $user=Auth::user();
        $total_post=$user->posts()->count();
        $favourite_post=$user->favourite_posts()->count();
        $total_pending_post=$user->posts()->where('is_approved',false)->count();

        $popular_post=$user->posts()
                            ->withCount('comments')
                            ->withCount('favourite_to_users')
                            ->orderBy('view_count','desc')
                            ->orderBy('comments_count','desc')
                            ->orderBy('favourite_to_users_count','desc')
                            ->take(5)->get();

        $total_views=$user->posts()->sum('view_count');
        
        return view('author.dashboard',compact(['total_post',
                                                 'total_pending_post',
                                                 'popular_post',
                                                 'total_views',
                                                 'favourite_post']));

       }




}
