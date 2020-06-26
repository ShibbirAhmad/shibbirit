<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Blog') }}</title>

  
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    
        <!-- bangla font -->
        
     
     <link href="{{asset('font/BalooDa2-Medium.ttf ')}}" rel="stylesheet"  type="text/css" />

     <link href="{{asset('font/BalooDa2-Regular.ttf ')}}" rel="stylesheet"  type="text/css" />


    <!-- Waves Effect Css -->
    <link href="{{asset('backend/plugins/node-waves/waves.css ')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('backend/plugins/animate-css/animate.css ')}}" rel="stylesheet" />
   
     <!--fontawesome icon-->
     <link rel="stylesheet" href="{{asset('css/fontawesome/all.min.css')}}">
    <!-- Morris Chart Css-->
    <link href="{{asset('backend/plugins/morrisjs/morris.css ')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('backend/css/style.css ')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('backend/css/themes/all-themes.css ')}}" rel="stylesheet" />

    
	
     @stack('css')
   
</head>

<body class="theme-pink">

     <!--start header-->
      @include('backend.header')
      <!--start header-->
    

    <!--sidebar start-->

     @include('backend.sidebar')

    <!--sidebar start-->



    <section class="content">

         {{-- //this is for success result    --}}
         @if (Session::has('success'))
                            
         <div class="alert alert-success">{{Session::get('success')}}</div>
        
         @endif

       {{-- //this is for warning result --}}
         @if (Session::has('warning'))
         
         <div class="alert alert-warning">{{Session::get('warning')}}</div>
        
         @endif

         {{-- //this is for danger result --}}
         @if (Session::has('danger'))
         
         <div class="alert alert-danger">{{Session::get('danger')}}</div>
        
         @endif

         {{-- //display for all error result   --}}

         @if (count($errors)> 0) 
                
                <ul class="list-group">
                    
                 @foreach ($errors->all() as $error)

                  <li class="alert alert-warning list-group-item">{{$error}} </li> 
                  
                   @endforeach
                    
                </ul>
         @endif
        <div class="container-fluid">
         
            @yield('content')
            
            
        </div>
    </section>
  

  
    <!-- Jquery Core Js -->
    <script src="{{asset('js/jquery.min.js ')}}"></script>
    <script src="{{asset('js/myScript.js ')}}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{asset('js/app.js ')}}"></script>

    
    <!-- Slimscroll Plugin Js --> 
    <script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js ')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('backend/plugins/node-waves/waves.js ')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('backend/plugins/jquery-countto/jquery.countTo.js ')}}"></script>

    <script src="{{asset('js/fontawesome/all.min.js')}}"></script>

    

    <!-- Custom Js -->
    <script src="{{asset('backend/js/admin.js ')}}"></script>
    <script src="{{asset('backend/js/pages/index.js ')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('backend/js/demo.js ')}}"></script>

    
    

    @yield('script')

</body>
</html>
