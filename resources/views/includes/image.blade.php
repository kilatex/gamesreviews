<div class="card mb-3 bg-dark2 text-white">
                    
                
                        <a href="{{ route('user.profile',['id' => $image->user->id] )}}">
                           <!--  <span>
                                <img src="{{route('user.avatar',['filename'=>$image->user->image])}}" alt="" class="avatar mr-1">
                            </span> -->
                            
                            <!-- {{$image->user->nick}} -->
                            
                        </a>
                   

                        <a href="{{ route('image.detail',['id' => $image->id]) }}">
                        <div class="image-container">
                            <img src="{{route('image.post',['filename'=>$image->image_path])}}" alt="image" class="image-post">
                        </div>
                        </a>

    
                       

                    <div class="card-body">
                       
                        <h5 class="card-title">{{ $image->title }}
                            <a href="#" class="text-success user-info-post">
                                  <span>{{$image->user->nick}}</span>
                                  <img src="{{route('user.avatar',['filename'=>$image->user->image])}}" alt="" class="border border-success mr-1">
                            </a>
                        </h5>
                        <p class="card-text card-description">{{$image->description}}  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod, possimus eaque sunt libero aliquid ipsam ad, repellat minima commodi praesentium voluptatem distinctio dolorem assumenda animi molestias quis natus consequuntur dolorum inventore dolor? Nobis similique dignissimos quaerat nostrum, voluptatum inventore sed debitis, aliquid rem sint aut saepe aspernatur beatae illum nam? Provident unde repellat omnis dicta deleniti! Aut mollitia similique facilis, eligendi eveniet sit voluptatum magni culpa iusto quas sint a labore, velit suscipit officia aperiam, debitis perspiciatis sequi accusantium facere.
                            
                        </p>
                        <span class=" text-secondary font-weight-bold text-success">{{ \FormatTime::LongTimeFilter($image->created_at) }}</span>

                        <div class="likes">

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

                        <div class="description ">
                           
                            <a href=" {{  route('image.detail', ['id' => $image->id])   }} " class="font-weight-bold d-block text-success">Comments ( {{count($image->comments)}} )</a>
                  
                        </div>
                    </div>


                     
</div>


