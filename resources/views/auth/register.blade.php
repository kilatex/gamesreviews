@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')
<div class="bg-login">
    <div class="login-box bg-dark signup-box bg-login">
                    <span class="title-login">Games Reviews <i class="fas fa-gamepad"></i></span>
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                    
                            <label for="name" >{{ __('Name') }}</label>

                       
                                <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                    
                     
                            <label for="surname" class="">{{ __('Surname') }}</label>

                          
                                <input id="surname" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            
                   
                 
                            <label for="nick" class="">{{ __('Nick') }}</label>

                           
                                <input id="nick" type="text" class="{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ old('nick') }}" required autofocus>

                                @if ($errors->has('nick'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                @endif
                          
                       

      
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                        
                            <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                 
                    

                            <label for="password" class="">{{ __('Password') }}</label>

                        
                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                     

                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                 
                                <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                 

                            <input type="submit" class="btn btn-outline-success" value="Sign Up">
                           
                  
                    </form>
        </div>
</div>
                       


         
      


@endsection
