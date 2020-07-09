@extends('site.layout.master')

@push('css')

<link href="{{asset('site/single-post-1/css/styles.css ')}}" rel="stylesheet">

<link href="{{asset('site/single-post-1/css/responsive.css ')}}" rel="stylesheet">

   <style>
        .favourite_post{ color:blue; }

        .header-bg{
           width:100%;
           height: 400px;
           background-size:cover;
           background-image: url({{ asset('backend/images/posts/'.$post->image) }});
            
        }

        .icons li {margin-right:5px;}
    </style>

@endpush


@section('title')
       {{ $post->title }}
@endsection

@section('slider')

      
<div class="header-bg">
    
</div><!-- slider -->

<section class="post-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-12 no-right-padding">

                <div class="main-post">

                    <div class="blog-post-inner">
                         <article>
                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar" href="{{route('author.profile',$post->user->username)}}"><img src="{{ asset('backend/images/profile/'.$post->user->image)}}" alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="{{route('author.profile',$post->user->username)}}"><b>{{ $post->user->name }}</b></a>
                                <h6 class="date">{{ $post->created_at->diffForHumans() }}</h6>
                            </div>

                        </div><!-- post-info -->

                        <h3 class="title"><a href="#"><b> {{ $post->title }}</b></a></h3>
                           
                        <div class="para">
                            {!! html_entity_decode($post->body) !!} 
                        </div>
            
                        <ul class="tags">
                            @foreach ($categories as $category) 
                            
                            <li><a href="{{ route('tag.post',$category->slug) }}">{{$category->name }}</a></li>  

                            @endforeach
                          
                        </ul>
                    </div><!-- blog-post-inner -->

                    <div class="post-icons-area">
                        <ul class="post-icons">
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

                        <ul class="icons">
                            <li>SHARE : </li>
                            <li><a href="{{route('facebook')}}"><i class="fab fa-lg fa-facebook-f "></i></a></li>
                            <li><a href="{{route('linkedin')}}"><i class="fab  fa-lg fa-linkedin "></i></a></li>
                            <li><a href="{{route('pinterest')}}"><i class="fab fa-lg fa-pinterest-p " aria-hidden="true"></i> </a></li>
                            <li><a href="{{route('twitter')}}"><i class="fab fa-lg fa-twitter"></i></a></li>
                            <li><a href="{{route('github')}}"><i class="fab fa-lg fa-git"></i></a></li>
                            <li><a href="{{route('vimeo')}}"><i class="fab  fa-lg fa-vimeo-square"></i></a></li>
                        </ul>
                    </div>

                </article>

                </div><!-- main-post -->
            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 no-left-padding">

                <div class="single-post info-area">
                   
                    <div class="col-sm-12 sidebar-area about-area">
                       
                        <div class="card bg-info">
                            <div class="card-header">
                           <div style="margin-top:35px;" class="left-area">
                                <a class="avatar" href="{{route('author.profile',$post->user->username)}}"><img src="{{ asset('backend/images/profile/'.$post->user->image)}}" alt="Profile Image"></a>
                            <h4 style="margin-top:-60px;margin-left:85px;"><b> About Author</b><br><i class="fa fa-briefcase"></i>  <p style="display: inline">{{$post->user->profession}}</p></h4>
                            </div>
                          </div>
                        </div>
                      <div style="padding-top:30px;border: 1px solid  #6CB2EB;border-radius:5px;" class="card-body   ">
                          <p> {{ $post->user->about }} </p>
                      </div>
                        
                     <div class="card-footer bg-info"></div> 
                    </div>

                  

                    <div class="tag-area">

                        <h4 class="title"><b>Category Cloud</b></h4>
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="{{ route('tag.post',$category->slug) }}">{{ $category->name }}</a></li> 
                            @endforeach 
                        </ul>

                    </div><!-- subscribe-area -->

                </div><!-- info-area -->

            </div><!-- col-lg-4 col-md-12 --> 

        </div><!-- row -->

    </div><!-- container -->
</section><!-- post-area -->


<section class="recomended-area section">
    <div class="container">
        <div class="row">
         
             @foreach ($randomPost as $r_post)
                
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('backend/images/posts/'.$r_post->image)}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="{{ asset('backend/images/profile/'.$r_post->user->image) }}" alt="Profile Image"></a>

                        <div class="blog-info">
                            <h4 class="title"><a href="{{ route('post.details',$r_post->slug) }}"><b>{{ $r_post->title }}</b></a></h4>

                            <ul class="post-footer">
                                <li>
                    
                                    @guest
                                    
                                    <a onclick="return confirm('Login first to add favourite');" href="#">
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
                                <li><a href="{{ route('post.details',$r_post->slug) }}"><i class="fa fa-comment"></i>{{$post->comments()->count() }}</a></li>
                                <li><a href="{{ route('post.details',$r_post->slug) }}"><i class="fa fa-eye"></i>{{ $r_post->view_count }}</a></li>
                            </ul>
                        </div><!-- blog-info -->

                    </div><!-- single-post -->

                </div><!-- card -->
            </div><!-- col-md-6 col-sm-12 -->
            @endforeach
        </div><!-- row -->

    </div><!-- container -->
</section>

<section class="comment-section">
    <div class="container">
        <h4><b>POST COMMENT</b></h4>
        <div class="row">

            <div class="col-lg-8 col-md-12">
                @guest
                <p class="bg-warning">Firstly Register to post your comment </p>
             If already memeber then <h4 style="display:inline-block"> <a href="{{ route('login') }}">Login</a></h4> 
             & if new then <h4 style="display:inline-block"><a href="{{ route('register') }}">register</a></h4>

                @else 
                <div class="comment-form">
                    <form  id="commentForm">
                        <div class="row">

                            <input type="hidden" id="commentIdField" value="{{$post->id}}" name="postId">

                            <div class="col-sm-12">
                                <textarea name="comment" rows="2" id="commentFiled" class="text-area-messge form-control"
                                    placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                            </div><!-- col-sm-12 -->
                            <div class="col-sm-12">
                                <input type="submit" class="submit-btn" value="Submit">
                               
                            </div><!-- col-sm-12 -->

                        </div><!-- row -->
                    </form>
                </div><!-- comment-form -->

                @endguest
               

                <h4><b>Comment ({{ $post->comments()->count()  }})</b></h4>
                  
                @if ($post->comments()->count() > 0)
                   
                @foreach ($post->comments as $comment)
                    <div class="commnets-area">
                      <div class="comment">
                         <div class="post-info">

                        <div class="left-area">
                            <a class="avatar" href="#"><img src="{{ asset('backend/images/profile/'.$comment->user->image )}}" alt="Profile Image"></a>
                        </div>

                        <div class="middle-area">
                            <a class="name" href="#"><b>{{ $comment->user->name}}</b></a>
                            <h6 class="date">{{ $comment->created_at->diffForHumans() }}</h6>
                        </div>
                    @if (Auth::user())
                   
                      <div class="float-right">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">  
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                         Reply
                                    </a>
                                </li>    
                            </ul>
                        </div>
                    </div>

                         
                    @endif

                    </div><!-- post-info -->

                                <p class="ml-5"> Says: {{ $comment->comment }}</p>
                     
                                
                    <!-- Tab panes -->
                    <div class="tab-content mt-3">
                                        
                        <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                
                                        <div class="body">
                                            <form id="replyForm" class="form-line" >
                                            
                                            <input type="hidden" value="{{ $comment->id }}" name="commentId">
                                            <textarea class="form-control" name="reply"  rows="2"></textarea>
                                          
                                        <input type="submit" class="btn mt-2 btn-sm btn-success " value="Reply">
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>  


                <!--replying result section -->
                @if ($comment->replies()->count() > 0)
                <div class="comment ml-3">
                    <div class="post-info ml-3 ">
        
                            {{-- reply part --}}
                        @foreach ($comment->replies as $reply)
                      
                        <div class="left-area">
                            <a class="avatar" href="#"><img src="{{ asset('backend/images/profile/'.$reply->user->image )}}" alt="Profile Image"></a>
                        </div>

                        <div class="middle-area">
                            <a class="name" href="#"><b>{{ $reply->user->name}}</b></a>
                            <h6 class="date">{{ $reply->created_at->diffForHumans() }} Replied</h6>
                        </div>    
                     </div>

                        <p style="margin-left:100px" >  {{ $reply->reply }} </p>
                    
                     </div>
                
                        @endforeach
                     
 
                @endif
                                           

              </div><!-- commnets-area -->
               @endforeach
            
                    @else
                    <div class="commnets-area">
                        <div class="comment"> <p>  No comment yet, put your first comment</p>
                        </div>
                    </div>   
                    @endif


            </div><!-- col-lg-8 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section>


@endsection


@section('content')



@endsection





@push('js')
   
          <script>
           

              $(function(){
           
           //this is for post comment store function 
            $('#commentForm').submit(function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = '{{url('comment/add')}}'

               $.ajaxSetup(
                   {
                      headers : {'X-CSRF-Token' : '{{csrf_token()}}' }
                   })


               $.ajax({ 
                   url : url ,
                   method : 'POST',
                   data : data ,
                   cache : false,
                   success: function(response){
                        if (response.success == "OK") {

                          Swal.fire({
                              type: 'success',
                              text: "comment "+response.status + " successfully",
                          });

                      $('input[name = "postId"]').val(null)
                      $('textarea').val(null)

                      }else{

                        Swal.fire({
                                  type: 'error',
                                  title: '<P style="color: red;">Oops...<p>',
                                  text: response.errors,
                                  footer: '<b> Something Wrong</b>'
                              });
                      }

                   },
                   error : function(error){ 
                           

                    console.log(error)
                   
                       
                }   
                   
                })

               


            })





           // this is for comment reply store function 
            $('#replyForm').submit(function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = '{{url('comment/reply/add')}}'

               $.ajaxSetup(
                   {
                      headers : {'X-CSRF-Token' : '{{csrf_token()}}' }
                   })


               $.ajax({ 
                   url : url ,
                   method : 'POST',
                   data : data ,
                   cache : false,
                   success: function(response){
                        if (response.success == "OK") {

                          Swal.fire({
                              type: 'success',
                              text: "reply "+response.status + " successfully",
                          });
                     
                      $('input[name = "commentId"]').val(null)
                      $('textarea').val(null)
                    

                      }else{

                        Swal.fire({
                                  type: 'error',
                                  title: '<P style="color: red;">Oops...<p>',
                                  text: response.errors,
                                  footer: '<b> Something Wrong</b>'
                              });
                      }

                   },
                   error : function(error){ 
                           

                    console.log(error)
                   
                       
                }   

                   
                })

        

            })




        });    

          </script>

@endpush