@extends('backend.master')


@push('css')
    
@endpush



@section('content')

 
<div class="block-header">
    <h2>WELCOME TO ADMIN DASHBOARD</h2>
</div>

<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">TOTAL POST</div>
                <div class="number count-to" data-from="0" data-to="{{ $total_post }}" data-speed="15" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">favorite</i>
            </div>
            <div class="content">
                <div class="text">FAVOURITE POST</div>
                <div class="number count-to" data-from="0" data-to="{{ $favourite_post}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">forum</i>
            </div>
            <div class="content">
                <div class="text">PENDING POST</div>
                <div class="number count-to" data-from="0" data-to="{{ $total_pending_post}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            <div class="content">
                <div class="text"> VIEW IN POSTS</div>
                <div class="number count-to" data-from="0" data-to="{{ $total_views}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">account_circle</i>
            </div>
            <div class="content">
                <div class="text">TOTAL AUTHOR</div>
                <div class="number count-to" data-from="0" data-to="{{ $total_author}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> 
        <div class="info-box bg-blue-grey hover-expand-effect">
            <div class="icon">
                <i class="material-icons">fiber_new</i>
            </div>
            <div class="content">
                <div class="text">TODAY AUTHOR</div>
                <div class="number count-to" data-from="0" data-to="{{ $today_author}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> 
        <div class="info-box bg-blue hover-expand-effect">
            <div class="icon">
                <i class="material-icons">labels</i>
            </div>
            <div class="content">
                <div class="text"> TAG</div>
                <div class="number count-to" data-from="0" data-to="{{ $total_tag}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> 
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">apps</i>
            </div>
            <div class="content">
                <div class="text"> CATEGORY</div>
                <div class="number count-to" data-from="0" data-to="{{ $total_category}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>


</div>
<!-- #END# Widgets -->

<div class="row clearfix">
    <!-- most popular post -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2>MOST   POPULAR   POST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th>Rank List</th>
                                <th>Title</th>
                                <th>View</th>
                                <th>Favourite</th>
                                <th>Comment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Rank List</th>
                                <th>Title</th>
                                <th>View</th>
                                <th>Favourite</th>
                                <th>Comment</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($popular_post as $key=>$post)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ str_limit($post->title,40)  }}</td>
                                <td>{{ $post->view_count }}</td>
                                <td>{{ $post->favourite_to_users_count }}</td>
                                <td> {{ $post->comments_count }}</td>

                                <td>
                                   @if ($post->status==true)
                                      <span class="label bg-green">published</span> 
                                   @else
                                      <span class="label bg-pink">pending</span>    
                                   @endif
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# popular post -->

   
        <!-- start active  author -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>DAER   ACTIVE   AUTHORS</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Rank List</th>
                                    <th>Name</th>
                                    <th>Post</th>
                                    <th>Favourite</th>
                                    <th>Comment</th>
                                    <th>Reply</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Rank List</th>
                                    <th>Name</th>
                                    <th>Post</th>
                                    <th>Favourite</th>
                                    <th>Comment</th>
                                    <th>Reply</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($active_author as $key=>$author)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->posts_count }}</td>
                                    <td>{{ $author->favourite_posts_count }}</td>
                                    <td>{{ $author->comments_count }}</td>
                                    <td>{{ $author->replies_count }}</td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# active author post -->
    
    <!-- #END# Browser Usage -->
</div>




@endsection



@push('js')
    
@endpush