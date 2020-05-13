@extends('backend.master')


@push('css')
    
@endpush



@section('content')

 
<div class="block-header">
    <h2>WELCOME TO AUTHOR DASHBOARD</h2>
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
                <div class="text">TOTAL PENDING POST</div>
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
                <div class="text">TOTAL VIEW IN POSTS</div>
                <div class="number count-to" data-from="0" data-to="{{ $total_views}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Widgets -->

<div class="row clearfix">
    <!-- Task Info -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2>TOP 5 RANKING POST</h2>
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
    <!-- #END# Task Info -->
    <!-- Browser Usage -->
    
    <!-- #END# Browser Usage -->
</div>


@endsection



@push('js')
    
@endpush