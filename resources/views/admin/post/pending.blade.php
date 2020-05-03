@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 

   <h4 class="heading">Those Post are pending, Need to approval </h4>
    <div class="card">
            <div class="card-body">
                       
 <table class="table table-bordered text-center ">
        <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>View <i class="fa fa-eye"> </i> </th>
                <th>Status</th>
                <th>Is_Approved</th>
                <th colspan="2" >Action</th>
        </thead>
        <tbody>
                @foreach ($posts as $data)
                <tr>
                       <td>{{$data->id}}</td> 
                       <td>{{$data->title}}</td>
                       <td>{{$data->user->name }}</td>
                       <td> {{$data->view_count }} </td>
                       <td>
                               @if ($data->status==true)
                                   <span class="badge bg-blue">Published</span>
                               @else
                               <span class="badge bg-pink">Pending</span> 
                               @endif
                       </td>
                       <td>
                        @if ($data->is_approved==true)
                        <span class="badge bg-blue">Approved</span>
                    @else
                    <span class="badge bg-pink">Pending</span> 
                    @endif   
                       </td>
                       <td colspan="2">
                             
                        <div  >
                                {!! Form::open(['method'=>'PATCH', 'route'=> ['admin.post.approve',$data->id ]] ) !!}
                                 <button class="btnApprove btn btn-info"><span  class="" >approve</span><i class="fa fa-check ml-1  "></i></button>
                                {!! Form::close() !!}
                        </div> 

                            <a href="{{route('admin.post.show',$data->id)}}" style="margin-top:10px;margin-right:25px;" class="btn btn-dark "><i class="fas fa-eye"></i></a>   
         
                      
                       <div style="margin-top:-32px; margin-left:55px" >
                           {!! Form::open(['method'=>'DELETE', 'route'=> ['admin.post.destroy',$data->id ]] ) !!}
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
 
             $(document).ready(function () {
                     
                    $('.btnApprove').click(function(e){
                      
                        if (confirm('Are you sure to Approve this post?')) {
                             
                           return true;
                       }  
                       
                       e.preventDefault();
                    });
             });
      
</script>
 
@endsection()