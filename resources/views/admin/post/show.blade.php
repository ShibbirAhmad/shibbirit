@extends('backend/master')


@push('css')
    
    <!-- Bootstrap Select Css -->
    {{-- <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css ')}}" rel="stylesheet" /> --}}

@endpush




@section('content')
 
 {!! Form::open() !!}

<div class="card-header"><div class="card-title"><h5> visited post Details <i class="fa fa-eye"></i> </h5></div></div>
<div class="row">
    <div class="col-lg-8 col-md-12">
        <!--card for post title and image--> 
        <div class="card">
             <div class="card-header">
                 <div class="card-title"><h4>post title & Image</h4></div>
             </div>
             
             <div class="card-body">
                 {!! Form::label('title', 'Post Title',) !!}
                 {!! Form::text('', $post->title, ['class' => 'form-control form-inline']) !!}
                 
                 <div class="form-group mt-4 ">
                 {!! Form::label('postImage', 'Post Related Image', ) !!}
          
                        
                        <img src="{{asset('backend/images/posts/'.$post->image)}}" style="width:100px;height:100px;border-radius:10px;margin-top:-20px;">
                </div>

                <div class="form-group ">
                    <input type="checkbox" id="publish" {{ $post->status==1 ? 'checked' : '' }} class="filled-in " name="" value="1">
                    <label for="publish">PUBLISH</label>
                </div>
             </div>
             <div class="card-footer"></div>
         </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <!--card for post category and tags -->
                     <!-- Tags Input -->
                     
                     <div class="card">
                        <div class="card-header">
                            <h4>  Category & Tags    </h4>
                        </div>
                        <div class="card-body">
                            
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="category">Select Category</label>
                                       <select name="" class="form-control show-tick " data-live-search="true" multiple id="" >
                                           @foreach ($categories as $category)
                                               <option 
                                               @foreach ($post->categories as $postCategory)
                                                     {{ $postCategory->id==$category->id ? 'selected' : '' }}
                                               @endforeach
                                               value="{{ $category->id }}">{{ $category->name }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="tag">Select Tags</label>
                                       <select name="" class="form-control show-tick " data-live-search="true" multiple  id="tag" >
                                           @foreach ($tags as $tag)
                                               <option
                                               @foreach ($post->tags as $postTag)
                                                   {{ $postTag->id==$tag->id ? 'selected' : '' }}
                                               @endforeach
                                               value="{{ $tag->id }}">{{ $tag->name }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                                <br>
                                <a href="{{route('admin.post.index')}}" class="btn btn-block btn-info waves-effect">Back</a>
                                
                               
                          
                        </div>
                        <div class="card-footer"></div>
                    </div>
                   
    </div>
 <!-- #END# Tags Input -->

</div>


<div class="row mt-3">
     <div class="col-lg-12 cl-md-12">
         <div class="card">
             <div class="card-header">
                 <div class="card-title"><h4>visited Post Details</h4></div>
             </div>
             
             <div class="card-body">
                  <div class="form-group">
                    
                    {!! Form::textarea('',$post->body , ['id' => 'ckeditor']) !!}
                    
                </div>
             </div>
             <div class="card-footer"></div>
         </div>
        
     </div>
</div>




{!! Form::close() !!}


@endsection




@section('script')

<script> 
$(function () {
    //CKEditor
    CKEDITOR.replace('ckeditor');
    CKEDITOR.config.height = 300;

   
});
</script>
  
   <!-- Select Plugin Js -->
   <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js ')}}"></script>
   <!-- TinyMCE -->
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js ')}}"></script>

@endsection()