@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title-recentPosts text-white">Recent Posts</h2>

             @include('includes.message')
             <div class="content">
                 <div class="card-containers">
                     @foreach($images as $image)
                         @include('includes.image')
                     @endforeach
     
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
            


            <!-- PAGINACION -->
            <div>
                {{$images->links()}}
            </div>
      
        

</div>
@endsection
