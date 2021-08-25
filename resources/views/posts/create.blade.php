@extends('layouts.app')

@section('content')
<div class="container">
    <form action='/post' method='POST' enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h2> Add New Post </h2>

            </div>
        </div>


        <!-- Title  -->
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label"> Image Title</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
        </div>

        <!-- Description -->
        <div class="row">
            <div class="col-8 offset-2">

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label"> Image Descriptions</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                    @enderror
                </div>

            </div>
        </div> 

        <!-- Upload Image -->
        <div class="row">
            <div class="col-4 offset-2">

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label"> Post Image </label>
                    <div> <input id="image" type="file" class="form-control-file" name="image" style="width: 76%"> </div>

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror

                </div>

            </div>
        </div> 
        
        
        <!-- Submit Button -->
        <div class="row">
            <div class="col-8 offset-2">

               <button class='btn btn-primary'> Submit </button> 

            </div>
        </div> 

    </div>
</div>

@endsection
