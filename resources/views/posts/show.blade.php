@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">

            <img src='/storage/{{ $post->image }}' alt='' class='w-100'>  </img>
        </div>

        <div class="col-4">
            <div class='d-flex align-items-center'> 
                <div class='pr-3'> 
                    <img src='{{$post->user->profile->profileImage()}}' alt='' class='rounded-circle w-100' style='max-width:50px'>
                </div>

                <div class='d-flex'>
                    <h5 style='margin:0px'><a href='/profile/{{ $post->user->id}}' class='text-dark'>  {{ $post->user->username }} </a> </h5>
                    <a href='#' class='pl-3'> Follow </a>
                </div>

            </div>

            <hr> 
            <p> {{ $post->title }} </p>

            <p> 
                <span class='font-weight-bold'> 
                    <a href='/profile/{{ $post->user->id}}' class='text-dark'> {{ $post->user->username }} </a> 
                </span> {{ $post->description }}  
            </p>
           
        </div>
    </div>
   
</div>

@endsection