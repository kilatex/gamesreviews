@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')
   
        
           
    <h1 class="login-title">Games Reviews <i class="fas fa-gamepad"></i></h1>

                <div class="login-box bg-dark">
                <img src="img/user.png" class="avatar bg-dark" alt="Avatar Image">
                <h2>Login Here</h2>

                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <input id="email" placeholder="Enter Email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback " role="alert">
                                   <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                         
                      

                 
                            <label for="password" class="">{{ __('Password') }}</label>

                       
                                <input id="password" placeholder="Enter Password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                       


                        
                         
                                <input type="submit" value="Login" class="btn btn-outline-success">
                                   
                                </input>

                                <a href="{{ route('register')}}">Don't have An account?</a>
                     
                    </form>
                </div>
            
       
    
@endsection
