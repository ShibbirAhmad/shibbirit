@extends('site.layout.master')

@push('css')
    
         
	<link href="{{asset('site/category-sidebar/css/styles.css ')}}" rel="stylesheet">

    <link href="{{asset('site/category-sidebar/css/responsive.css ')}}" rel="stylesheet">
    <style>
        .favourite_post{ color:blue; }

        .header-bg{
           width:100%;
           height: 400px;
           background-size:cover;
           background-image: url({{ asset('backend/images/profile/'.$author->image) }});
            
        }

    </style>

@endpush


@section('title',)

{{ $author->username}}

@endsection




@section('slider')
            
<div class="header-bg">
    
</div><!-- slider -->
@endsection

@section('content')
    
<div class="row">

    <div class="col-lg-8 col-md-12">
        <div class="row">
         @foreach ($posts as $post)
              <div class="col-md-6 col-sm-12">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('backend/images/posts/'.$post->image )}} " alt="{{$post->title}}"></div>

                        <a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img src="{{asset('backend/images/profile/'.$post->user->image)}} " alt="Profile Image"></a>
        
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
            </div><!-- col-md-6 col-sm-12 -->

         @endforeach
           
        <div style="margin-left:450px" class="pagination"> {{ $posts->links() }} </div>

        </div><!-- row -->


    </div><!-- col-lg-8 col-md-12 -->

    <div class="col-lg-4 col-md-12 ">

        <div class="single-post info-area ">

            <div class="about-area">
                <h4 class="title ml-5"><b>{{ $author->name }}</b></h4>
               
                <div class="media">
                     <div class="media-left">
                         <img style="width:80px;height:80px;border-radius:10px;" src="{{ asset('backend/images/profile/'.$author->image) }}" alt="">
                     </div>

                     <div class="media-body ml-3">
                         <h4  class="media-title bg-info">Sine Author {{ $author->created_at->toDateString() }}</h4>
                         <p class="mt-2">{{ $author->about }} </p>
                        </div>
                </div>
            </div>

        

            <div class="tag-area">

                <h4 class="title"><b>Posted Categories </b></h4>
                <ul>
                    @foreach ($categories as $category)
                        
                          <li><a href="{{ route('category.post',$category->slug) }}">{{ $category->name }}</a></li>
                
                    @endforeach
                   
                </ul>

            </div><!-- subscribe-area -->

        </div><!-- info-area -->

    </div><!-- col-lg-4 col-md-12 -->

</div><!-- row -->


@endsection





@push('js')
    


@endpush