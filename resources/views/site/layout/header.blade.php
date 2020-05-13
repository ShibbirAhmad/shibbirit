<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="#" class="logo"><img src="{{asset('site/images/logo.png ')}}" alt="Logo Image"></a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{ route('post.all') }}">Posts</a></li>
             
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            @else
                 @if (Auth::user()->role_id==1)
                 <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li> 
                 @endif

                 @if (Auth::user()->role_id==2)
                 <li><a href="{{ route('author.dashboard') }}">Dashboard</a></li> 
                 @endif
            @endguest

        </ul><!-- main-menu -->

        <div class="src-area">
            <form action="{{route('search')}}">
                <button class="src-btn" type="submit"><i class="fa fa-search"></i></button>
                <input class="src-input" name="search_field" value="{{ isset($searchQuery) ? $searchQuery : ''}}" type="text" placeholder="Type of search">
      
        </form>
            {{-- //this is for success result    --}}
            @if (Session::has('success'))
                            
            <div style="width:250px;height:auto;border-radius:10px;padding:10px;margin-left:60px" class="alert bg-success alert-success"><h5 style="color:#fff;">{{Session::get('success')}} </h5> </div>
           
            @endif
   
          {{-- //this is for warning result --}}
            @if (Session::has('warning'))
            
            <div style="width:250px;height:auto;border-radius:10px;padding:10px;margin-left:60px" class="alert bg-warning alert-warning"> <h5 style="color:#000;">  {{Session::get('warning')}} </h5></div>
           
            @endif
   
          
          {{-- //this is for warning result --}}
          @if (Session::has('danger'))
            
          <div style="width:250px;height:auto;border-radius:10px;padding:10px;margin-left:60px" class="alert bg-danger alert-danger"> <h5 style="color:#fff;">  {{Session::get('danger')}} </h5></div>
         
          @endif

            {{-- //display for all error result   --}}
   
            @if (count($errors)> 0) 
                   
                   <ul class="list-group">
                       
                    @foreach ($errors->all() as $error)
   
                     <li style="width:300px;height:auto;margin-left:60px" class="alert alert-warning bg-warning  float-right list-group-item">{{$error}} </li> 
                     
                      @endforeach
                       
                   </ul>
            @endif
            
        </div>

    <script>
     
            
             setTimeout(removeAlert,4000)

             function removeAlert(){
                 document.querySelector('.alert').remove();
             }
    
    </script>

    </div><!-- conatiner -->
         

</header>