@extends('layouts.app')
<link href="{{ asset('css/config.css') }}" rel="stylesheet">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header text-white bg-success">Edit My Info</div>

                <div class="card-body bg-dark text-white">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('user.update') }}" aria-label="Edit My Info">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control bg-dark text-white{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{  Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-3 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control bg-dark text-white {{ $errors->has('name') ? ' is-invalid' : '' }}" name="surname" value="{{  Auth::user()->surname }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nick" class="col-md-3 col-form-label text-md-right">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control bg-dark text-white{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ Auth::user()->nick }}" required autofocus>

                                @if ($errors->has('nick'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control bg-dark text-white{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea type="file"  name="description_user" class="form-control bg-dark text-white" >{{  Auth::user()->description }}</textarea>
                                @if ($errors->has('description_user'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description_user') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">{{ __('Profile Pic') }}</label>

                            <div class="col-md-6">
                                    @include('includes.avatar')
                                <input id="image_path" type="file" class="form-control mt-2 bg-dark text-white{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path"  required>

                                @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
