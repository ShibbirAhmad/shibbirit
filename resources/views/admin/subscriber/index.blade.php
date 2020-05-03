@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 
   <div class="card">
       <div class="card-header">
           <div class="card-title"><h5> Email of All subscriber</h5></div>
       </div>

       <div class="card-body">
           
    <table class="table table-bordered text-center ">
        <thead>
                <th>ID</th>
                <th>Email</th>
                <th>Action</th>
        </thead>
        <tbody>
                @foreach ($subscriber as $data)
                <tr>
                       <td>{{$data->id}}</td> 
                       <td>{{$data->email}}</td>
                       <td >
                     
                           {!! Form::open(['method'=>'DELETE', 'route'=> ['admin.subscriber.destroy',$data->id ]] ) !!}
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