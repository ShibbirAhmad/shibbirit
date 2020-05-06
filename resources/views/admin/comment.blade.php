@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 
<h5>users comments review</h5>
    <div class="card">
            <div class="card-body">
                       
 <table class="table table-bordered text-center ">
        <thead>
                <th>Comment Info</th>
                <th>Post Info </th>
                <th >Action</th>
        </thead>
        <tfoot>
            <th>Comment Info</th>
            <th>Post Info </th>
            <th >Action</th>
    </tfoot>
        <tbody>
                @foreach ($comments as $comment)
                <tr>
                      
         <td> 
                <div class="media">
                     <div class="media-left">
                        <img style="width:64px;height:64px;border-radius:10px" src="{{asset('backend/images/profile/'.$comment->user->image)}}" alt="">     
                     </div>  
                     
                     <div class="media-body">
                             <h5 class="media-heading">{{$comment->user->name }}</h5>
                             
                                     {!!  $comment->comment !!}
                            
                     </div>
                </div>
         </td>

         <td> 
                <div class="media">
                        <div class="media-left">
                           <img style="width:64px;height:64px;border-radius:10px" src="{{asset('backend/images/posts/'.$comment->post->image)}}" alt="">     
                        </div>  
                        
                        <div class="media-body">
                                <h5 class="media-heading">{{str_limit( $comment->post->title,50) }}</h5>
                        </div>
                   </div>

          </td>

                    <td>
                       <div style="" >
                           {!! Form::open(['route'=> ['admin.comment.destroy',$comment->id ],'method'=>'DELETE'] ) !!}
                            <button class="btnDelete btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                           {!! Form::close() !!}
                       </div> 
                    
                    </td> 

                </tr>

                    
                @endforeach
        </tbody>
</table>

            </div>
    </div>
 




@endsection




@section('script')
  <script> 
 

</script>
 
@endsection()