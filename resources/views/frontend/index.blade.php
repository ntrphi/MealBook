@extends('layout.frontend_layout')
@section('content')
@if($meal instanceof App\MealBook)
@php
$name = 'mealbook';
$firstURLSegment = 'mealbooks';
@endphp
@elseif($meal instanceof App\CookingRecipe)
@php
$name = 'cooking';
$firstURLSegment = 'cookings';
@endphp
@endif

<section class="hero-banner mt-5">
  <div class="hero-wrapper container">
    @if(Auth::check())
    <div class="hero-left col-md-6 col-12">
      <h1 class="hero-title">{{$meal->name}}</h1>
      <div class="d-sm-flex flex-wrap">

        <p>- {{$meal->short_desc}}.</p>
      </div>
      <div class="counting-status">
        <span> @if($meal->point()->sum('point') > 0)
          {{$meal->point()->sum('point')}}
          @else
          0
          @endif
          <span>
            @if(Auth::check())
            <a title="point" class="point {{Auth::guest() ? 'off' : '($meal->isPoint()) ' }} {{$meal->isPoint() ? 'off' :''}}" onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$meal->id}}').submit();">
              @endif
              <img src="/images/like_png.png" width="20" height="20" alt="">
              @if(Auth::check())
              <form id="point-{{$name}}-{{$meal->id}}" action="/{{$firstURLSegment}}/{{$name}}/point" method="POST" style="display: none;">
                @csrf
                @if($meal->isPoint())
                @method('DELETE');
                @endif
                <input type="hidden" name="user_id" value="{{$meal->user_id}}">
                <input type="hidden" name="id" value="{{$meal->id}}">
                <input type="hidden" name="point" value="1">
              </form>
              @endif
            </a></span></span>

        <span>{{$meal->comment->count()}} <span><img src="/images/comment-icon.jpg" width="20" height="20" alt=""></span></span>

      </div>
      <ul class="hero-info d-flex mt-5">
        <li class="ml-0">
          <a href="">
            <h4>Like</h4>
          </a>
        </li>
        <li>
          <a href="">
            <h4>Comment</h4>
          </a>
        </li>
        <li>
          <a href="">
            <h4>Share</h4>
          </a>
        </li>
      </ul>
    </div>

    <div class="hero-right col-md-6 col-12">
      <!-- for mam 4 mon -->
      @if($meal->mealBookDishes->count() == 4)
      <div class="mamComHome">
        <div class="mamComHome-4-content">
          @foreach($meal->mealBookDishes as $cookings)
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
                <a class="xemThemBtn" href="">
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
      @elseif($meal->mealBookDishes->count() == 5)
      <!-- for mam 5 mon  -->
      <div class="mamComHome">
        <div class="mamComHome-5-content">
          @foreach($meal->mealBookDishes as $cookings)
          <div class="row monAnWrap">
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
                <a class="xemThemBtn" href="">
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

      @elseif($meal->mealBookDishes->count() == 6)
      <!-- for mam 6 mon -->
      <div class="mamComHome">
        <div class="mamComHome-6-content">

          @foreach($meal->mealBookDishes as $cookings)
          <div class="row monAnWrap ">
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

          <!-- nuoc cham   -->
          <div class="nuocCham">
            <img src="images/nuoc cham.jpg" alt="">
          </div>
        </div>
      </div>
      @endif
    </div>

    @else
    <div class="hero-left pt-4 col-md-6 col-12">
      <h1 class="hero-title">{{$mealRandom->name}}</h1>
      <div class="d-sm-flex flex-wrap">

        <p>{{$mealRandom->short_desc}}.</p>
      </div>
      <div class="counting-status">
        <span> @if($mealRandom->point()->sum('point') > 0)
          {{$mealRandom->point()->sum('point')}}
          @else
          0
          @endif
          <span class="pl-1">
            @if(Auth::check())
            <a title="point" class="point {{Auth::guest() ? 'off' : '($mealRandom->isPoint()) ' }} {{$mealRandom->isPoint() ? 'off' :''}}" onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$mealRandom->id}}').submit();">
              @endif
              <img src="/images/like_png.png" width="20" height="20" alt="">
              @if(Auth::check())
              <form id="point-{{$name}}-{{$mealRandom->id}}" action="/{{$firstURLSegment}}/{{$name}}/point" method="POST" style="display: none;">
                @csrf
                @if($mealRandom->isPoint())
                @method('DELETE');
                @endif
                <input type="hidden" name="user_id" value="{{$mealRandom->user_id}}">
                <input type="hidden" name="id" value="{{$mealRandom->id}}">
                <input type="hidden" name="point" value="1">
              </form>
              @endif
            </a></span></span>

        <span>{{$mealRandom->comment->count()}} <span class="pl-1"><img src="/images/comment-icon.jpg" width="20" height="20" alt=""></span></span>

      </div>
      <ul class="hero-info d-flex mt-5">
        <li class="ml-0">
          <a href="">
            <h4>Like</h4>
          </a>
        </li>
        <li>
          <a href="">
            <h4>Comment</h4>
          </a>
        </li>
        <li>
          <a href="">
            <h4>Share</h4>
          </a>
        </li>
      </ul>
    </div>

    <div class="hero-right col-md-6 col-12">
      <!-- for mam 4 mon -->
      @if($mealRandom->mealBookDishes->count() == 4)
      <div class="mamComHome">
        <div class="mamComHome-4-content">
          @foreach($mealRandom->mealBookDishes as $cookings)
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
                <a class="xemThemBtn" href="">
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
      @elseif($mealRandom->mealBookDishes->count() == 5)
      <!-- for mam 5 mon  -->
      <div class="mamComHome">
        <div class="mamComHome-5-content">
          @foreach($mealRandom->mealBookDishes as $cookings)
          <div class="row monAnWrap ">
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
                <a class="xemThemBtn" href="">
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

      @elseif($mealRandom->mealBookDishes->count() == 6)
      <!-- for mam 6 mon -->
      <div class="mamComHome">
        <div class="mamComHome-6-content">

          @foreach($mealRandom->mealBookDishes as $cookings)
          <div class="row monAnWrap ">
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

          <!-- nuoc cham   -->
          <div class="nuocCham">
            <img src="images/nuoc cham.jpg" alt="">
          </div>
        </div>
      </div>
      @endif
    </div>
    @endif
  </div>
</section>
<!--================Hero Banner Section end =================-->
<section class="container">
  <div class="comments-area comments-area-home">
    @foreach($meal->comment as $comments)
    <div class="comment-list">
      <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
          <div class="thumb">
            <img src="images/blog/c1.png" alt="">
          </div>
          <div class="desc">
            <h4 class="mt-1 mb-0">
              <a href="#">{{$comments->user->name}}</a>
            </h4>
            <p class="mt-1 mb-0"> {{$comments->content}}</p>
            <div class="d-flex justify-content-between">
              <div class="d-flex align-items-center">
                <p class="date ml-0">{{$comments->created_at}}</p>
              </div>

              <div class="reply-btn">
                <a href="#" class="btn-reply text-uppercase">Trả lời</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>



<!--================Featured Section Start =================-->
<section class="section-margin mb-lg-100">
  <div class="container">

    <div class="section-intro mb-75px mb-35px">
      <h1 class="intro-title">Mâm cơm nổi bật</h1>
      <!-- <h2>Fresh taste and great price</h2> -->
    </div>

    <div class="owl-carousel owl-theme featured-carousel">
      @foreach ($mealHot as $mealbook)
      <div class="featured-item pt-2">
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
            <div class="row monAnWrap ">
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

            <div class="row monAnWrap">
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

        <div href="#" class="blog_item_date pl-4">
          @if(Auth::check())
          <a title="point" class="point {{Auth::guest() ? 'off' : '($mealbook->isPoint()) ' }} {{$mealbook->isPoint() ? 'off' :''}}" onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$mealbook->id}}').submit();">
            @endif
            <img src="/images/like_png.png" width="40" height="40" alt="">
            @if(Auth::check())
            <form id="point-{{$name}}-{{$mealbook->id}}" action="/{{$firstURLSegment}}/{{$name}}/point" method="POST" style="display: none;">
              @csrf
              @if($mealbook->isPoint())
              @method('DELETE');
              @endif
              <input type="hidden" name="user_id" value="{{$mealbook->user_id}}">
              <input type="hidden" name="id" value="{{$mealbook->id}}">
              <input type="hidden" name="point" value="1">
            </form>
            @endif
          </a>
          <p class="mt-2 ml-2">
            @if($mealbook->point()->sum('point') > 0)
            <span>{{$mealbook->point()->sum('point')}}</span>
            @else
            <span>0</span>
            @endif
          </p>
        </div>
        <div class="item-body">
          <a href="#">
            <h3>{{$mealbook->name}}</h3>
          </a>
          <p class="mt-2">
          {{$mealbook->short_desc}}
          </p>
            <div class="d-flex justify-content-between">

            </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


@if($cookingFirst instanceof App\MealBook)
@php
$name = 'mealbook';
$firstURLSegment = 'mealbooks';
@endphp
@elseif($cookingFirst instanceof App\CookingRecipe)
@php
$name = 'cooking';
$firstURLSegment = 'cookings';
@endphp
@endif
<!--================Food menu section start =================-->
<section class="section-margin">
  <div class="container">
    <div class="section-intro mb-75px">
      <h4 class="intro-title">Món ngon trong tuần</h4>
    </div>
    <div class="row">
      @foreach ($cookingWeek as $item)
      <div class="col-lg-6 food-card-parent">
        <div class="align-items-center food-card">
          <div class="food-card-frame">
          <img class="mr-3 img-fluid mr-sm-4" src="{{$item->avatar}}" alt="">
          </div>
          <div class="media-body pl-0">
            <div class="row justify-content-between position-relative ">
              <div href="#" class="blog_item_date position-absolute bestDishesOfWeekLikes">
                @if(Auth::check())
                <a title="point" class="point {{Auth::guest() ? 'off' : '($item->isPoint()) ' }} {{$item->isPoint() ? 'off' :''}}" onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$item->id}}').submit();">
                  @endif
                  <img src="/images/like_png.png" width="40" height="40" alt="">
                  @if(Auth::check())
                  <form id="point-{{$name}}-{{$item->id}}" action="/{{$firstURLSegment}}/{{$name}}/point" method="POST" style="display: none;">
                    @csrf
                    @if($item->isPoint())
                    @method('DELETE');
                    @endif
                    <input type="hidden" name="user_id" value="{{$item->author_id}}">
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="hidden" name="point" value="1">
                  </form>
                  @endif
                </a>
                <p class="mt-2 ml-2"> @if($item->point()->sum('point') > 0)
                  <span>{{$item->point()->sum('point')}}</span>
                  @else
                  <span>0</span>
                  @endif
                </p>
              </div>
              <a class="d-block mt-3 col-md-12" href="">
                <h4>{{$item->name}}</h4>
              </a>
              <p class="col-md-12 bestDishesOfWeekDesc">{{$item->short_desc}}</p>
            </div>
            <!-- <p>{{$item->dishType->name}}</p> -->
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!--================Food menu section end =================-->

<!--================CTA section start =================-->
<!-- <section class="cta-area text-center">
    <div class="container">
      <p>Some Trendy And Popular Courses Offerd</p>
      <h2>Under replenish give saying thing</h2>
      <a class="button" href="#">Reservation</a>
    </div>
  </section> -->
<!--================CTA section end =================-->


<!--================Chef section start =================-->
<section class="section-margin">
  <div class="container">
    <div class="section-intro mb-75px">
      <h4 class="intro-title">Top member </h4>
      <!-- <h2>Talent & experience member</h2> -->
    </div>

    <div class="row top-member">
      @foreach ($user as $users)
      <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0 position-relative">
        <div class="crown-bg">

        </div>
        <div class="chef-card">

          <img class="card-img rounded-0" src="{{$users->image}}" alt="">
          <div class="chef-footer">
            <a href="{{route('userpage',$users->id)}}"><h4>{{$users->name}}</h4></a>
            <p><span>{{$users->mealCount()}} Mâm Cơm</span>
              <span>{{$users->cookingCount()}} Món Ăn</span></p>
            <p>Tổng Like : @if($users->isPoint() >= 10 )
              {{$users->isPoint()}}
              <p>Rank : 1</p>
              @elseif($users->isPoint() >= 5 )
              {{$users->isPoint()}}
              <p>Level : 2</p>
              @elseif($users->isPoint() < 5) {{$users->isPoint()}} <p>Level : 3
            </p>
            @endif
            </p>
          </div>
          <div class="chef-overlay">
            <ul class="social-icons">
              <li><a href="#"><i class="ti-facebook"></i></a></li>
              <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!--================Chef section end =================-->




<!--================Blog section start =================-->
<section class="section-margin">
  <div class="container">
    <div class="section-intro mb-75px">
      <h4 class="intro-title">Blog noi bat</h4>
      <!-- <h2>Latest food and recipe news</h2> -->
    </div>

    <div class="row">
      @foreach ($post as $posts)
      <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card-blog">
          <img class="card-img rounded-0" src="{{$posts->image}}" alt="">
          <div class="blog-body">
            <ul class="blog-info">
              <li><a href="">{{$posts->user->name}}</a></li>
              <li><a href="#">{{$posts->created_at}}</a></li>
            </ul>
            <a href="{{route('showPost',$posts->id)}}">
              <h3>{{$posts->title}}</h3>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection