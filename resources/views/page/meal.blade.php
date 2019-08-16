@extends('layout.frontend_layout')
@section('content')
@if($first instanceof App\MealBook)
@php
$name = 'mealbook';
$firstURLSegment = 'mealbooks';
@endphp
@elseif($first instanceof App\CookingRecipe)
@php
$name = 'cooking';
$firstURLSegment = 'cookings';
@endphp
@endif
<section class="blog_area section-margin">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="blog_left_sidebar">
          @foreach ($meal as $mealbook)
          <article class="blog_item">
            <div class="blog_item_img">
              <!-- for mam 4 mon -->

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
              <div href="#" class="blog_item_date">
              @if(Auth::check())
                <a title="point" class="point {{Auth::guest() ? 'off' : '($mealbook->isPoint()) ' }} {{$mealbook->isPoint() ? 'off' :''}}" onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$mealbook->id}}').submit();">
                @endif  
                  <i class="fa fa-thumbs-up"></i>
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
            </div>

            <div class="blog_details">
              <a class="d-inline-block" href="{{route('showMeal',$mealbook->id)}}">
                <h2>{{$mealbook->name}}</h2>
              </a>

              <p>{{$mealbook->short_desc}}</p>


              <ul class="blog-info-link">
                <li><a href="#">{{$mealbook->getAuthor->name}}</a></li>
                <li><a href="#"><i class="fa fa-comment-alt"></i></a></li>
              </ul>
            </div>
          </article>

          @endforeach


          <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
              <li class="page-item">
                <a href="#" class="page-link" aria-label="Previous">
                  <span aria-hidden="true">
                    <span class="ti-arrow-left"></span>
                  </span>
                </a>
              </li>
              <li class="page-item">
                {{$meal->links()}}
              </li>

              <li class="page-item">
                <a href="#" class="page-link" aria-label="Next">
                  <span aria-hidden="true">
                    <span class="ti-arrow-right"></span>
                  </span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="blog_right_sidebar">
          <!-- <aside class="single_sidebar_widget search_widget">
            <form action="#">
              <div class="form-group">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search Keyword">
                  <div class="input-group-append">
                    <button class="btn" type="button"><i class="ti-search"></i></button>
                  </div>
                </div>
              </div>
              <button class="button rounded-0 primary-bg text-white w-100" type="submit">Search</button>
            </form>
          </aside> -->

          <aside class="single_sidebar_widget_wrap post_category_widget">

            <aside class="single_sidebar_widget popular_post_widget">
              <h2 class="widget_title">Recent Post</h2>
              @foreach ($recent as $item)
              <div class="media post_item">
                <img class="img-fluid" src="{{$item->avatar}}" alt="post">
                <div class="media-body">
                  <a href="{{route('showCooking',$item->id)}}">
                    <h3>{{$item->name}}</h3>
                  </a>
                  <p>{{$item->created_at}}</p>
                </div>
              </div>
              @endforeach
            </aside>

          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection