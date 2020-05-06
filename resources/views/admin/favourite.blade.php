@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 
<h5>your all favourite posts</h5>
    <div class="card">
            <div class="card-body">
                       
 <table class="table table-bordered text-center ">
        <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th><i class="fa fa-heart fa-lg"></i></th>
                <th>View <i class="fa fa-eye"> </i> </th>
                <th colspan="2" >Action</th>
        </thead>
        <tbody>
                @foreach ($posts as $post)
                <tr>
                       <td>{{$post->id}}</td> 
                       <td>{{ str_limit( $post->title,20)}}</td>
                       <td>{{$post->user->name }}</td>
                       <td>{{ $post->favourite_to_users->count()}}</td>
                       <td> {{$post->view_count }} </td>

                         
                       <td colspan="2">
                            <a href="#" style="margin-right:40px;" class="btn btn-dark "><i class="fas fa-eye"></i></a>   
                            
                       <div style="margin-top:-33px; margin-left:40px" >
                           {!! Form::open(['route'=> ['admin.post.favourite',$post->id ]] ) !!}
                            <button class="btnDelete btn btn-danger"><i class="fa fa-minus"></i></button>
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