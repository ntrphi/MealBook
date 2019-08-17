@extends('layout.frontend_layout')
@section('content')

<section class="blog_area single-post-area section-margin">
			<div class="container">
					<div class="row ">
        @foreach ($mealbook as $meal)
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

                <!-- nuoc cham   -->
                  <div class="nuocCham">
                    <img src="images/nuoc cham.jpg" alt="">
                  </div>
              </div>
            </div>
          @endif
      </div>
      <div class="hero-left col-md-6 col-12">
        <h1 class="hero-title">{{$meal->name}}</h1>
      </div>

    @endforeach
    @foreach($cook as $cooking)

    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{$cooking->avatar}}" alt="">
                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route('showCooking',$cooking->id)}}">
                                <h2>{{$cooking->name}}</h2>
                            </a>
                            <span>{{$cooking->dishType->name}}</span>
                            @foreach ($cooking->ingredientDetail as $detail)
                        <p class="excert">{{$detail->ingredient}} {{$detail->amount}}  </p> 
                        @endforeach
                            <p>{{$cooking->recipe}}</p>

                            <ul class="blog-info-link">
                                <li><a href="#"><i class="ti-user"></i> {{$cooking->user->name}}</a></li>
                                <li><a href="#"><i class="ti-comments"></i> {{$cooking->comment->count()}}</a></li>
                            </ul>
                        </div>
                    </article>
    @endforeach
    @foreach($ingredientCooking as $cooking)

<article class="blog_item">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" src="{{$cooking->avatar}}" alt="">
                    <div class="blog_details">
                        <a class="d-inline-block" href="{{route('showCooking',$cooking->id)}}">
                            <h2>{{$cooking->name}}</h2>
                        </a>
                        <span>{{$cooking->dishType->name}}</span>
                        @foreach ($cooking->ingredientDetail as $detail)
                        <p class="excert">{{$detail->ingredient}} {{$detail->amount}}  </p> 
                        @endforeach
                        <p>{{$cooking->recipe}}</p>

                        <ul class="blog-info-link">
                            <li><a href="#"><i class="ti-user"></i> {{$cooking->user->name}}</a></li>
                            <li><a href="#"><i class="ti-comments"></i> {{$cooking->comment->count()}}</a></li>
                        </ul>
                    </div>
                </article>
@endforeach
    </div>
    </div>
    </section>
@endsection