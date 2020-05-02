@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 



<a href="{{route('admin.post.create')}}" class="btn btn-primary m-2" >Add New Post</a>
    <table class="table table-bordered  ">
            <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>

                    <th>Action</th>
            </thead>
            <tbody>
                    @foreach ($posts as $data)
                    <tr>
                           <td>{{$data->id}}</td> 
                           <td>{{$data->title}}</td>
                           <td>{{$data->status}}</td>
                           <td >
                                <a href="{{route('admin.post.edit',$data->id)}}" style="margin-right:40px;" class="btn btn-success "><i class="fas fa-edit"></i></a>
                          
                           <div style="margin-top:-31px; margin-left:50px" >
                               {!! Form::open(['method'=>'DELETE', 'route'=> ['admin.post.destroy',$data->id ]] ) !!}
                                <button class="btnDelete btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                               {!! Form::close() !!}
                           </div> 
                        
                        </td>            
                    </tr>

                        
                    @endforeach
            </tbody>
    </table>





@endsection




@section('script')
  <script> 
 

</script>
 
@endsection()