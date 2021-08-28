@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">

            <img src='/storage/{{ $post->image }}' alt='' class='w-100'>  </img>
        </div>

        <div class="col-4">
            <h3> {{ $post->user->username }} </h3>
            <p> {{ $post->title }} </p>
            <p> {{ $post->description }} </p>
            
        </div>
    </div>
   
</div>

@endsection