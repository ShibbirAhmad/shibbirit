<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Blog') }}</title>

  

    
	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link rel="stylesheet"  href="{{asset('site/common-css/bootstrap.css')}}" >
    
    <link rel="stylesheet" href="{{asset('css/fontawesome/all.min.css')}}">

	<link rel="stylesheet"  href="{{asset('site/layout-1/css/styles.css')}}" >

    <link rel="stylesheet"  href="{{asset('site/layout-1/css/responsive.css')}}" >
    
     @stack('css')
   
</head>

<body>

    @include('site.layout.header')
    

        @yield('slider')
  
    

	<section class="blog-area section">
		<div class="container">

            @yield('content')
            

		</div><!-- container -->
	</section><!-- section -->


     @include('site.layout.footer')
	

     


</body>
</html>
