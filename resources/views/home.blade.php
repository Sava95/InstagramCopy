@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 profile_image">
            <image src='\images\profile_picture.jpg' height='200' width='200' class='rounded-circle' >
        </div>

        <div class="col-7">
            <div> <h1> {{ $user -> username }} </h1> </div>

            <div class='d-flex'> 
                <div class='pr-4'> <strong> 153 </strong> posts </div>
                <div class='pr-4'> <strong> 12 </strong> followers </div>
                <div class='pr-4'> <strong> 24 </strong> following </div>
            </div>

            <div style='margin-top:50px'> Sava Nedeljkovic </div>
            <div> 🌍 Traveler </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src='https://via.placeholder.com/293' width='293'>
        </div>

        <div class="col-4">
        <img src='https://via.placeholder.com/293'  width='293'>
        </div>

        <div class="col-4">
        <img src='https://via.placeholder.com/293' width='293' >
        </div>
    </div>
</div>


@endsection
