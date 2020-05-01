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
    <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

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

<body class="theme-blue">

     <!--start header-->
      @include('backend.header')
      <!--start header-->
    

    <!--sidebar start-->

     @include('backend.sidebar')

    <!--sidebar start-->



    <section class="content">
        <div class="container-fluid">

            @yield('content')
            
            
        </div>
    </section>
  


    <!-- Jquery Core Js -->
    <script src="{{asset('backend/plugins/jquery/jquery.min.js ')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.js ')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js ')}}"></script>

    <!-- Slimscroll Plugin Js --> 
    <script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js ')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('backend/plugins/node-waves/waves.js ')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('backend/plugins/jquery-countto/jquery.countTo.js ')}}"></script>

    <script src="{{asset('js/fontawesome/all.min.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('backend/ ')}}plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('backend/ ')}}plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="{{asset('backend/ ')}}plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('backend/plugins/flot-charts/jquery.flot.js ')}}"></script>
    <script src="{{asset('backend/plugins/flot-charts/jquery.flot.resize.js ')}}"></script>
    <script src="{{asset('backend/plugins/flot-charts/jquery.flot.pie.js ')}}"></script>
    <script src="{{asset('backend/plugins/flot-charts/jquery.flot.categories.js ')}}"></script>
    <script src="{{asset('backend/plugins/flot-charts/jquery.flot.time.js ')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('backend/plugins/jquery-sparkline/jquery.sparkline.js ')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('backend/js/admin.js ')}}"></script>
    <script src="{{asset('backend/js/pages/index.js ')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('backend/js/demo.js ')}}"></script>

    @stack('js')

</body>
</html>
