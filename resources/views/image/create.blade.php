@extends('layouts.app')
<link href="{{ asset('css/new-post.css') }}" rel="stylesheet">

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card text-white">
                  <div class="card-header  bg-success">
                      New Post 
                  </div>
                  <div class="card-body bg-dark">
                    <form  method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input type="file" id="image_path" name="image_path" class="form-control bg-dark text-white" required>
                                @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
    
                        <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
    
                                    <input id="title"  type="text" class="form-control bg-dark text-white{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"   required>
    
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea type="file" id="description" name="description" class="form-control bg-dark text-white"></textarea>
                                @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-outline-success btn-lg btn-block" value="Post">
                            </div>
                        </div>
                    
    
                    </form>
                  </div>
              </div>
            </div>
       
    </div>

@endsection
