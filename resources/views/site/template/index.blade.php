@extends('site.layout.master')

@push('css')
    
    <link href="{{asset('site/common-css/swiper.css ')}}" rel="stylesheet">
         
	<link href="{{asset('site/front-page-category/css/styles.css ')}}" rel="stylesheet">

	<link href="{{asset('site/front-page-category/css/responsive.css ')}}" rel="stylesheet">

@endpush


@section('title','home')

@section('slider')
<div class="slider"> 

</div>
@endsection

@section('content')
    
<div class="row">

    <div class="col-lg-4 col-md-6">  
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{asset('site/images/marion-michele-330691.jpg ')}} " alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="{{asset('site/images/icons8-team-355979.jpg ')}} " alt="Profile Image"></a>

                <div class="blog-info">

                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                    Concepts in Physics?</b></a></h4>

                    <ul class="post-footer">
                        <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                    </ul>

                </div><!-- blog-info -->
            </div><!-- single-post -->
        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{asset('site/images/audrey-jackson-260657.jpg ')}}" alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="{{asset('site/images/icons8-team-355979.jpg ')}}" alt="Profile Image"></a>

                <div class="blog-info">
                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>

                    <ul class="post-footer">
                        <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                    </ul>
                </div><!-- blog-info -->

            </div><!-- single-post -->

        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{asset('site/images/pexels-photo-370474.jpeg ')}}" alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="{{asset('site/images/averie-woodard-319832.jpg ')}}" alt="Profile Image"></a>

                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                    Concepts in Physics?</b></a></h4>

                <ul class="post-footer">
                    <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                </ul>

            </div><!-- single-post -->
        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-8 col-md-12">
        <div class="card h-100">
            <div class="single-post post-style-2">

                <div class="blog-image"><img src="{{asset('site/images/brooke-lark-194251.jpg ')}}" alt="Blog Image"></div>

                <div class="blog-info">

                    <h6 class="pre-title"><a href="#"><b>HEALTH</b></a></h6>

                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                    <div class="avatar-area">
                        <a class="avatar" href="#"><img src="{{asset('site/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>
                        <div class="right-area">
                            <a class="name" href="#"><b>Lora Plamer</b></a>
                            <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                        </div>
                    </div>

                    <ul class="post-footer">
                        <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                    </ul>

                </div><!-- blog-right -->

            </div><!-- single-post extra-blog -->

        </div><!-- card -->
    </div><!-- col-lg-8 col-md-12 -->

    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{asset('site/images/dmitri-popov-326976.jpg ')}}" alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="{{asset('site/images/averie-woodard-319832.jpg ')}}" alt="Profile Image"></a>

                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                    Concepts in Physics?</b></a></h4>

                <ul class="post-footer">
                    <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                </ul>

            </div><!-- single-post -->
        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="card h-100">

            <div class="single-post post-style-2 post-style-3">

                <div class="blog-info">

                    <h6 class="pre-title"><a href="#"><b>HEALTH</b></a></h6>

                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                    <div class="avatar-area">
                        <a class="avatar" href="#"><img src="{{asset('site/images/icons8-team-355979.jpg ')}}" alt="Profile Image"></a>
                        <div class="right-area">
                            <a class="name" href="#"><b>Lora Plamer</b></a>
                            <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                        </div>
                    </div>

                    <ul class="post-footer">
                        <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                    </ul>

                </div><!-- blog-right -->

            </div><!-- single-post extra-blog -->

        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{asset('site/images/ben-o-sullivan-382817.jpg ')}}" alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="{{asset('site/images/icons8-team-355979.jpg ')}}" alt="Profile Image"></a>

                <div class="blog-info">
                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>

                    <ul class="post-footer">
                        <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                    </ul>
                </div><!-- blog-info -->

            </div><!-- single-post -->

        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="card h-100">

            <div class="single-post post-style-4">

                <div class="display-table">
                    <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>
                </div>

                <ul class="post-footer">
                    <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                </ul>

            </div><!-- single-post -->

            <div class="single-post">

                <div class="display-table">
                    <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>
                </div>

                <ul class="post-footer">
                    <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                </ul>

            </div><!-- single-post -->

        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="card h-100">

            <div class="single-post post-style-4">

                <div class="display-table">
                    <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>
                </div>

                <ul class="post-footer">
                    <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                </ul>

            </div><!-- single-post -->

            <div class="single-post">

                <div class="display-table">
                    <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>
                </div>

                <ul class="post-footer">
                    <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                </ul>

            </div><!-- single-post -->

        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-8 col-md-12">
        <div class="card h-100">
            <div class="single-post post-style-2">

                <div class="blog-image"><img src="{{asset('site/images/icons8-team-355990.jpg ')}}" alt="Blog Image"></div>

                <div class="blog-info">

                    <h6 class="pre-title"><a href="#"><b>HEALTH</b></a></h6>

                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                        Concepts in Physics?</b></a></h4>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                    <div class="avatar-area">
                        <a class="avatar" href="#"><img src="{{asset('site/images/icons8-team-355979.jpg ')}}" alt="Profile Image"></a>
                        <div class="right-area">
                            <a class="name" href="#"><b>Lora Plamer</b></a>
                            <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                        </div>
                    </div>

                    <ul class="post-footer">
                        <li><a href="#"><i class="fa fa-heart"></i>57</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i>6</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>138</a></li>
                    </ul>

                </div><!-- blog-right -->

            </div><!-- single-post extra-blog -->

        </div><!-- card -->
    </div><!-- col-lg-8 col-md-12 -->

</div><!-- row -->

<a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

@endsection





@push('js')
    
<script src="{{asset('site/common-js/swiper.js')}}"></script>

@endpush