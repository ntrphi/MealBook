@extends('layout.frontend_layout')
@section('content')
@if($mealbook instanceof App\MealBook)
@php
$name = 'mealbook';
$firstURLSegment = 'mealbooks';
@endphp
@elseif($mealbook instanceof App\CookingRecipe)
@php
$name = 'cooking';
$firstURLSegment = 'cookings';
@endphp
@endif
<section class="blog_area single-post-area section-margin">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 posts-list">
        <div class="single-post">
          <div class="feature-img">
            @if($mealbook->mealBookDishes->count() == 4)
            <div class="mamComHome">
              <div class="mamComHome-4-content">
                @foreach ($mealbook->mealBookDishes as $cookings)

                <div class="row monAnWrap">
                  <div class="monAnDiv-4 mx-auto my-auto">
                    <img src="{{$cookings->avatar}}" alt="">
                  </div>
                  <div class="popUp-monAn popUp1">
                    <img class="img-fluid" src="{{$cookings->avatar}}" alt="">
                    <h3 class="text-center mt-2">{{$cookings->name}}</h3>
                    <div class="container-fluid">

                      <h5 class="congThucTitle">Cong thuc :</h5>
                      <p>
                        <span>+ </span>
                        <span>{{$cookings->ingredient}}</span>
                        <span class="ml-5">1 con</span>
                      </p>
                      <a class="xemThemBtn" href="{{route('showCooking',$cookings->id)}}">
                        Xem chi tiet
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="nuocCham">
                  <img src="images/nuoc cham.jpg" alt="">
                </div>
              </div>
            </div>

            <!-- for mam 5 mon  -->
            @elseif($mealbook->mealBookDishes->count() == 5)
            <div class="mamComHome">
              <div class="mamComHome-5-content">
                @foreach ($mealbook->mealBookDishes as $cookings)
                <div class="row monAnWrap monAnStt1">
                  <div class="monAnDiv-5 mx-auto my-auto">
                    <img src="{{$cookings->avatar}}" alt="">
                  </div>
                  <div class="popUp-monAn popUp1">
                    <img class="img-fluid" src="{{$cookings->avatar}}" alt="">
                    <h3 class="text-center mt-2">{{$cookings->name}}</h3>
                    <div class="container-fluid">

                      <h5 class="congThucTitle">Cong thuc :</h5>
                      <p>
                        <span>+ </span>
                        <span>{{$cookings->ingredient}}</span>
                        <span class="ml-5">1 con</span>
                      </p>
                      <a class="xemThemBtn" href="{{route('showCooking',$cookings->id)}}">
                        Xem chi tiet
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="nuocCham">
                  <img src="images/nuoc cham.jpg" alt="">
                </div>
              </div>
            </div>

            <!-- for mam 6 mon -->
            @elseif($mealbook->mealBookDishes->count() == 6)
            <div class="mamComHome">
              <div class="mamComHome-6-content">
                @foreach ($mealbook->mealBookDishes as $cookings)

                <div class="row monAnWrap monAnStt1">
                  <div class="monAnDiv-5 mx-auto my-auto">
                    <img src="{{$cookings->avatar}}" alt="">
                  </div>
                  <div class="popUp-monAn popUp1">
                    <img class="img-fluid" src="{{$cookings->avatar}}" alt="">
                    <h3 class="text-center mt-2">{{$cookings->name}}</h3>
                    <div class="container-fluid">
                      <h5 class="congThucTitle">Cong thuc :</h5>
                      <p>
                        <span>+ </span>
                        <span>{{$cookings->ingredient}}</span>
                        <span class="ml-5">1 con</span>
                      </p>
                      <a class="xemThemBtn" href="{{route('showCooking',$cookings->id)}}">
                        Xem chi tiet
                      </a>
                    </div>
                  </div>
                </div>

                @endforeach
                <div class="nuocCham">
                  <img src="images/nuoc cham.jpg" alt="">
                </div>
              </div>
            </div>
            @endif




          </div>
          <div class="blog_details">
            <h2 class="mb-5"><ins>{{$mealbook->name}}</ins></h2>
            @foreach ($mealbook->mealBookDishes as $cookings)
            <h5>Tên Món : {{$cookings->name}}</h5>
            <!-- <li><a href="#"><i class="ti-user"></i> {{$cookings->user->name}}</a></li> -->
            <p>{{$cookings->ingredient}}</p>
            <p>{{$cookings->recipe}}</p>
            @endforeach
            <ul class="blog-info-link mt-3 mb-4">
              <li><a href="#"><i class="ti-user"></i> {{$mealbook->getAuthor->name}}</a></li>
              <li><a href="#"><i class="ti-comments"></i>{{$mealbook->comment->count()}} Comment</a></li>
            </ul>
            <p class="excert">
            </p>
          </div>
        </div>
        <div class="navigation-top">
          <div class="d-sm-flex justify-content-between text-center">
            <p class="like-info">
              <div class="d-flex vote-controls">
              @if(Auth::check())
                <a title="point" class="point {{Auth::guest() ? 'off' : '($mealbook->isPoint()) ' }} {{$mealbook->isPoint() ? 'off' :''}}" onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$mealbook->id}}').submit();">
               @endif
                  <i class="fa fa-heart"></i>
                  @if(Auth::check())
                  <form id="point-{{$name}}-{{$mealbook->id}}" action="/{{$firstURLSegment}}/{{$name}}/point" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    @if($mealbook->isPoint())
                    @method('DELETE');
                    @endif
                    <input type="hidden" name="user_id" value="{{$mealbook->user_id}}">
                    <input type="hidden" name="id" value="{{$mealbook->id}}">
                    <input type="hidden" name="point" value="1">
                  </form>
                  @endif
                </a>
                <p>
                  @if($mealbook->point()->sum('point') > 0)
                  <span>{{$mealbook->point()->sum('point')}}</span>
                  @else
                  <span>0</span>
                  @endif
                </p>
              </div>
            </p>
            <div class="col-sm-4 text-center my-2 my-sm-0">
              <p class="comment-count"><span class="align-middle"><i class="ti-comment"></i></span> {{$mealbook->comment->count()}} Comments</p>
            </div>
   
          </div>

          <div class="blog-author">
            <div class="media align-items-center">
              <img src="{{$mealbook->getAuthor->image}}" alt="">
              <div class="media-body">
                <a href="#">
                  <h4>{{$mealbook->getAuthor->name}}</h4>
                </a>
                <p>{{$mealbook->getAuthor->email}}</p>
              </div>
            </div>
          </div>
          <div class="comments-area">
            <h4>{{$mealbook->comment->count()}}</h4>
            <div class="comment-list">
              @foreach($mealbook->comment as $comments)

              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="images/blog/c1.png" alt="">
                  </div>
                  <div class="desc">
                    <p class="comment">
                      {{$comments->title}}
                    </p>
                    <p>{{$comments->content}}</p>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <h5>
                          <a href="#">{{$comments->user->name}}</a>
                        </h5>
                        <p class="date">{{$comments->created_at}} </p>
                      </div>

                   
                    </div>

                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="comment-form">
              <h4>Leave a Reply</h4>
              <form class="form-contact comment_form" action="/{{$firstURLSegment}}/{{$mealbook->id}}/comment" id="commentForm" method="post">
                <div class="row">
                  <div class="col-12">{{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$mealbook->id}}">
                    <div class="form-group">
                      <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9" {{old('content')}} placeholder="Write Comment"></textarea>
                      @if( $errors->has('content') )
                      <p class="text-warning">{{ $errors->first('content')}}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control" name="title" id="name" type="text" placeholder="Tiêu Đề" {{old('title')}}>
                      @if( $errors->has('title') )
                      <p class="text-warning">{{ $errors->first('title')}}</p>
                      @endif
                    </div>
                  </div>

                </div>
            </div>
            @if(Auth::user())
            <div class="form-group">
              <button type="submit" class="button button-contactForm">Send Message</button>
            </div>
            @endif
            </form>
            </aside>

          </div>
        </div>
      </div>
      <div class="col-lg-4">
      <aside class=" single_sidebar_widget_mealbook popular_post_widget">
        <h3 class="widget_title">Recent Post</h3>
        @foreach ($recent as $item)
        <div class="media post_item mb-3">
          <img src="{{$item->avatar}}" alt="post">
          <div class="media-body">
            <a href="{{route('showCooking',$item->id)}}">
              <h3>{{$item->name}}</h3>
            </a>
            <p>{{$item->created_at}}</p>
          </div>
        </div>
        @endforeach
      </aside>
      </div>
    </div>
</section>

@endsection