@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 



<a href="{{route('author.post.create')}}" class="btn btn-primary m-2" >Add New Post</a>
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
                            <a href="{{route('author.post.show',$data->id)}}"  class="btn btn-dark "><i class="fas fa-eye"></i></a>   
                            <a href="{{route('author.post.edit',$data->id)}}" style="margin-right:70px;" class="btn btn-success "><i class="fas fa-edit"></i></a>
                      
                       <div style="margin-top:-33px; margin-left:55px" >
                           {!! Form::open(['method'=>'DELETE', 'route'=> ['author.post.destroy',$data->id ]] ) !!}
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