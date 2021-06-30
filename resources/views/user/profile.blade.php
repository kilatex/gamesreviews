@extends('layouts.app')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@section('content')
<div class="container">


    
    <h2 class="mb-3 title-recentPosts">User Info</h2>
        <div class="content text-white">

            
                <div class="bg-dark card-containers container-user ">

                
                        <div class="container-user-img">
                            <div class="img-box">
                                <img src="{{route('user.avatar',['filename'=>Auth::user()->image])}}" alt="image" class="border border-3 border-success rounded-circle" >
                                <span class=" text-secondary font-weight-bold">
                                    Se Unió
                                    {{ \FormatTime::LongTimeFilter($user->created_at) }}
                                    </span>
                            </div>
                        </div>

                        <div class="container-user-info  ">
                                <h3>{{$user->name}}  {{$user->surname}}</h3>
                                <h5 >{{'@'.$user->nick}}</h5>
                                <span>{{$user->description}}</span>
                                <p class="font-weight-bold mt-3">Total de Posts: {{count($user->images)}} </p>
                        </div>
                </div>
            
                <aside class="sidebar-container">

                    @if(Auth::user()) 
                        <h4 class="text-white">Your Profile</h4>
                        <div class="user-info mb-3">

                            <div class="img-container-info">
                            @if(Auth::user()->image)
                            <img src="{{route('user.avatar',['filename'=>Auth::user()->image])}}" class="" alt="">
                            @else
                            <img src="{{ asset('img/user.png') }}" alt="">
                            @endif
                            </div>

                            <h5 class="mt-2 text-success text-md-center">{{Auth::user()->nick}}</h5>
                        
                        </div>

                        <a href="{{ route('image.create') }}" class="links-sign text-success" >Create Post</a>

                        <p class="font-weight-bold mt-3 text-white">My Account</p>
                        <a href="{{ route('user.profile', [ 'id' =>Auth::user()->id ]) }}" class="links-sign d-block text-success">My Profile</a>
                        <a href="{{route('config')}}" class="links-sign d-block  text-success">Edit Account</a>
                        <a class="links-sign d-block  text-success" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>                    
                    @endif

                </aside>
                
        </div>
       


        <div class="card-containers mt-3">
            @foreach($user->images as $image)
                    @include('includes.image')
            @endforeach 
        </div>


        
    
</div>

@endsection