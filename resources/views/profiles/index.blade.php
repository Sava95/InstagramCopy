@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 profile_image">
            <image src='\images\profile_picture.jpg' height='200' width='200' class='rounded-circle' >
        </div>

        <div class="col-7">
            <div class='d-flex'>
                 <h1> {{ $user -> username }} </h1> 
                 <a href='/post/create' class='btn btn-primary ml-3 d-flex' style='align-items: center;'> New Post </a>
            </div>


            <div class='d-flex'> 
                <div class='pr-4'> <strong> {{ $user->posts->count() }} </strong> posts </div>
                <div class='pr-4'> <strong> 12 </strong> followers </div>
                <div class='pr-4'> <strong> 24 </strong> following </div>
            </div>

            <div style='margin-top:50px'> <strong> {{ $user->profile->title }} </strong> </div>
            <div> {{ $user->profile->description }} </div>
            <div> <a href='#'> {{ $user->profile->url}} </a> </div>
            
        </div>
    </div>

    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{ $post->id}}"> 
                    <img src='/storage/{{ $post->image }}' width='293'>
                </a>
            </div>
        @endforeach
    </div>
</div>


@endsection
