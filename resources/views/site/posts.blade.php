@extends('site.layout.master')

@push('css')
    
    <link href="{{asset('site/common-css/swiper.css ')}}" rel="stylesheet">
         
	<link href="{{asset('site/front-page-category/css/styles.css ')}}" rel="stylesheet">

    <link href="{{asset('site/front-page-category/css/responsive.css ')}}" rel="stylesheet">
    <style>
        .favourite_post{ color:blue; }
    </style>

@endpush


@section('title','posts')

@section('slider')

<div style="overflow:hidden;align:center" class="slider"><h2 style="color:#fff;margin:100px;margin-left:500px;" class="heading">All Posts </h2></div>
@endsection

@section('content')
    

<div class="row">

    @foreach ($posts as $post)
        
   
    <div class="col-lg-4 col-md-6">  
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{asset('backend/images/posts/'.$post->image )}} " alt="{{$post->title}}"></div>

                <a class="avatar" href="{{route('author.profile',$post->user->username)}}"><img src="{{asset('backend/images/profile/'.$post->user->image)}} " alt="Profile Image"></a>

                <div class="blog-info">

                    <h4 class="title"><a href="{{route('post.details',$post->slug)}}"><b>{{ $post->title }}</b></a></h4>

                    <ul class="post-footer">
                        <li>
                    
                            @guest
                            
                            <a onclick="return confirm('Login first to favourite this post');" href="#">
                                <i class="fa fa-heart"></i>{{ $post->favourite_to_users->count() }}</a>

                            @else 

                            <a  onclick="document.getElementById('favourite-form-{{$post->id}}').submit(); " href="javascript:void(0);"
                                class="{{!Auth::user()->favourite_posts->where('pivot.post_id',$post->id)->count()==0 ? 'favourite_post' : ''  }}"  > 
                        <i class="fa fa-heart"></i>{{ $post->favourite_to_users->count() }}
                         </a>
                    
                         <form  method="POST" id="favourite-form-{{$post->id}}"
                                     action="{{route('post.favourite',$post->id)}} " style="display:none" >
                                    @csrf      
                          </form>

                            @endguest

                        </li>
                        <li><a href="#"><i class="fa fa-comment"></i>{{$post->comments()->count() }}</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>{{ $post->view_count }}</a></li>
                    </ul>

                </div><!-- blog-info -->
            </div><!-- single-post -->
        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->
    
     @endforeach

</div><!-- row -->

  <div style="margin-left:450px" class="pagination"> {{ $posts->links() }} </div>

@endsection





@push('js')
    


@endpush