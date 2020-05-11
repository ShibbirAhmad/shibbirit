@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 
<h5>all authors review</h5>
    <div class="card">
            <div class="card-body">
                       
 <table class="table table-bordered text-center ">
        <thead>
                <th>ID</th>
                <th>Name </th>
                <th>Posts</th>
                <th>Favourite_posts</th>
                <th>Comments</th>
                <th>sice member</th>
                <th >Action</th>
        </thead>
        <tfoot>
            <th>ID</th>
            <th>Name </th>
            <th>Posts</th>
            <th>Favourite_posts</th>
            <th>Comments</th>
            <th>sice member</th>
            <th >Action</th>
    </tfoot>
        <tbody>
                @foreach ($authors as $author)
                <tr>

                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->posts_count }}</td>
                <td>{{ $author->favourite_posts_count }}</td>
                <td>{{ $author->comments_count }}</td>
                <td>{{ $author->created_at->toDateString() }}</td>
                    <td>
                       <div style="" >
                           {!! Form::open(['route'=> ['admin.author.destroy',$author->id ],'method'=>'DELETE'] ) !!}
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