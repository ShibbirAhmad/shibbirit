@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 
  

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> Update your profile information </h2>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    
                    <li role="presentation">
                        <a href="#profile_with_icon_title" data-toggle="tab">
                            <i class="material-icons">face</i> PROFILE
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#messages_with_icon_title" data-toggle="tab">
                            <i class="material-icons">email</i> MESSAGES
                        </a>
                    </li>
                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                   
                    <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                             
                                    <div class="body">
                                       <form action="{{route('admin.profile.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data"   >  
                                          @csrf
                                          @method('PUT')

                                        <label for="name">Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" id="email_address" value="{{Auth::user()->name}}" class="form-control" placeholder="Enter your email address">
                                            </div>
                                        </div>
                                           
                                        <label for="email_address">Email Address</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" disabled value="{{Auth::user()->email }}" id="email_address" class="form-control" >
                                                </div>
                                            </div>

                                            <label for="file">Profile Image</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <div class="float-right mr-5 pr-5">
                                                        <img src="{{asset('backend/images/profile/'.Auth::user()->image )}}" style="width:64px;height:64px;border-radius:10px;border:1px solid #ddd" >
                                                    </div>
                                                    <input type="file" name="profileImage" id="email_address" class="form-control" >
                                                    
                                                </div>
                                            </div>

                                            <label for="about">About Information::-->></label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea name="about" class="form-control" id=""  rows="5">{{Auth::user()->about}}</textarea>
                                                </div>
                                            </div>
                                            
                             
                                            <br>
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                        <div class="card">
                             
                            <div class="body">
                                <form>
                                    <label for="email_address">Email Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email_address" class="form-control" placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <label for="password">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                        </div>
                                    </div>
    
                                    <input type="checkbox" id="remember_me" class="filled-in">
                                    <label for="remember_me">Remember Me</label>
                                    <br>
                                    <button type="button" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
               
@endsection




@section('script')
  <script> 

 

</script>
 
@endsection()