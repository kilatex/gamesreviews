@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
             @include('includes.message')

                <div class="card mb-5">
                    
                    <div class="card-header">
                        <a>
                            <span>
                                <img src="{{route('user.avatar',['filename'=>$image->user->image])}}" alt="" class="avatar mr-1">
                            </span>
                            <span>
                            {{$image->user->nick}}
                            </span>
                        </a>
                    </div>

                    <div class="card-body container-post">
                        <div class="img-container image-detail">
                        <a href="{{ route('image.detail',['id' => $image->id]) }}">
                        <img src="{{route('image.post',['filename'=>$image->image_path])}}" alt="image" class="image-post">
                        </a>
                        </div>
                        <div class="likes mt-2 ml-3">

                                <?php $user_like = false ?>
                                <a>
                                    @foreach($image->likes as $like)
                                        @if($like->user_id == \Auth::user()->id)
                                        <?php  $user_like = true ?>
                                        @endif
                                    @endforeach

                                    @if($user_like)
                                        <i class="fas fa-heart dislike" data-id="{{$image->id}}"></i>
                                    @else
                                        <i class="fas fa-heart like"  data-id="{{$image->id}}"></i>
                                    @endif

                                    {{count($image->likes)}} Likes
                                </a>
                                </div>

                        <div class="description ml-3 mb-2">
                              <strong>{{$image->user->nick}}</strong> 
                              | {{$image->description}}
                            <a href="" class="font-weight-bold d-block">Comments ( {{count($image->comments)}} )</a>
                        </div>

                        <div class="comments ml-3">
                            @foreach($image->comments as $comment)
                            <div class="comment mb-2">
                            <strong>{{$comment->user->nick}} |</strong> 
                            <span class=" text-secondary font-weight-bold">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</span>

                            <span >{{$comment->content}}</span>
                            @if(Auth::check() && ( $comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id) )

                                <a href=" {{ route('comment.delete', ['id' => $comment->id ]) }}" class="text-danger font-weight-bold">Delete Comment</a>
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                     <div class="card-footer">
                         <form method="POST" action="{{route('comment.upload')}}"  enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="image_id" value="{{ $image->id}}"/>
                            <p>
                                <textarea class="form-control" name="content" ></textarea>

                                @if($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <input class="btn btn-primary btn-lg" type="submit" value="Enviar">

                        </form>
                     </div>
                </div>
 
            
          
        </div>

        
    </div>
</div>
@endsection
