@extends('layout.frontend_layout')
@section('content')

<section class="hero-banner mt-5">
    <div class="hero-wrapper container">

      <div class="hero-left col-md-6 col-12">
        <h1 class="hero-title">{{$meal->name}}</h1>
        <div class="d-sm-flex flex-wrap">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime sint doloremque fugit ipsam et voluptates, quidem deserunt laudantium labore a tempora iste amet quibusdam aliquid non dolor blanditiis veniam corporis!</p>          
        </div>
        <div class="counting-status">
          <span>2K <span><i class="fa fa-thumbs-up"></i></span></span>
          
          <span>189 <span><i class="fa fa-comment"></i></span></span>
          
          <span>8K <span><i class="fa fa-eye"></i></span></span>
        </div>
        <ul class="hero-info d-flex mt-5">
          <li>
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


      <!-- ============= -->
      
      <!-- <ul class="social-icons d-none d-lg-block">
        <li><a href="#"><i class="ti-facebook"></i></a></li>
        <li><a href="#"><i class="ti-twitter"></i></a></li>
        <li><a href="#"><i class="ti-instagram"></i></a></li>
      </ul> -->
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
                  <p class="comment">
                    {{$comments->title}}
                  </p>
                  <p> {{$comments->content}}</p>
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <h5>
                        <a href="#">{{$comments->user->name}}</a>
                      </h5>
                      <p class="date">{{$comments->created_at}}</p>
                    </div>

                    <div class="reply-btn">
                      <a href="#" class="btn-reply text-uppercase">reply</a>
                    </div>
                  </div>
                  
              </div>
          </div>
      </div>
      </div>
      @endforeach
    </div>
</section>
  

  
  <!--================About Section start =================-->
  <!-- <section class="about section-margin pb-xl-70">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xl-6 mb-5 mb-md-0 pb-5 pb-md-0">
          <div class="img-styleBox">
            <div class="styleBox-border">
              <img class="styleBox-img1 img-fluid" src="images/home/about-img1.png" alt="">
            </div>
            <img class="styleBox-img2 img-fluid" src="images/home/about-img2.png" alt="">
          </div>
        </div>
        <div class="col-md-6 pl-md-5 pl-xl-0 offset-xl-1 col-xl-5">
          <div class="section-intro mb-lg-4">
            <h4 class="intro-title">About Us</h4>
            <h2>We speak the good food language</h2>
          </div>
          <p>Living first us creepeth she'd earth second be sixth hath likeness greater image said sixth was without male place fowl evening an grass form living fish and rule lesser for blessed can't saw third one signs moving stars light divided was two you him appear midst cattle for they are gathering.</p>
          <a class="button button-shadow mt-2 mt-lg-4" href="#">Learn More</a>
        </div>
      </div>
    </div>
  </section> -->
  <!--================About Section End =================-->


  <!--================Featured Section Start =================-->
  <section class="section-margin mb-lg-100">
    <div class="container">

      <div class="section-intro mb-75px mb-35px">
        <h1 class="intro-title">Mâm cơm nổi bật</h1>
        <!-- <h2>Fresh taste and great price</h2> -->
      </div>

      <div class="owl-carousel owl-theme featured-carousel">
      @foreach ($mealHot as $mealbook)
        <div class="featured-item">
        @if($mealbook->mealBookDishes->count() == 4)
         <div class="mamComHome" > 
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
                    <div class="mamComHome" >
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
                     <div class="nuocCham">
                            <img src="images/nuoc cham.jpg" alt="">
                            </div>
                  @endforeach
                      </div>
                  </div>
       @endif
          <div class="item-body">
            <a href="#">
              <h3>{{$mealbook->name}}</h3>
            </a>
            <p>
              <p>Các Món Trong Mâm :</p>
              @foreach ($mealbook->mealBookDishes as $cookings)
              <p>{{$cookings->name}}</p>
              @endforeach
            </p>
            <div class="d-flex justify-content-between">
            
            </div>
          </div>
        </div>
  @endforeach
      </div>

    </div>

  </section>
  <!--================Featured Section End =================-->

  <!--================Offer Section Start =================-->
  <!-- <section class="bg-lightGray section-padding">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-sm">
          <img class="card-img rounded-0" src="images/home/offer-img.png" alt="">
        </div>
        <div class="col-sm">
          <div class="offer-card offer-card-position">
            <h3>Italian Pizza Offer</h3>
            <h2>50% OFF</h2>
            <a class="button" href="#">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!--================Offer Section End =================-->


  <!--================Food menu section start =================-->  
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Món ngon trong tuần</h4>
      </div>
      <div class="row">
      @foreach ($cookingWeek as $item)
        <div class="col-lg-6">
          <div class="align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="{{$item->avatar}}" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between ">
                <a href="">
                  <h4>{{$item->name}}</h4>
                </a>
              
              </div>
              <p>{{$item->dishType->name}}</p>
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
        <h4 class="intro-title">Top member</h4>
        <!-- <h2>Talent & experience member</h2> -->
      </div>

      <div class="row">
      @foreach ($user as $users)
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
          <div class="chef-card">
            <img class="card-img rounded-0" src="{{$users->image}}" alt="">
            <div class="chef-footer">
              <h4>{{$users->name}}</h4>
              <p>{{$users->role->name}}</p>
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


  <!--================Reservation section start =================-->  
  <!-- <section class="bg-lightGray section-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-xl-5 mb-4 mb-md-0">
          <div class="section-intro">
            <h4 class="intro-title">Reservation</h4>
            <h2 class="mb-3">Get experience from sneaky</h2>
          </div>
          <p>Him given and midst tree form seas she'd saw give evening one every make hath moveth you're appear female heaven had signs own days saw they're have let midst given him given and midst tree. Form seas she'd saw give evening</p>
        </div>
        <div class="col-md-6 offset-xl-2 col-xl-5">
          <div class="search-wrapper">
            <h3>Book A Table</h3>

            <form class="search-form" action="#">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Your Name">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-user"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Email Address">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-email"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Phone Number">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-headphone-alt"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Select Date">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Select People">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-layout-column3"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group form-group-position">
                <button class="button border-0" type="submit">Make Reservation</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!--================Reservation section end =================-->  


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

<script>
$(document).ready(function(){
  $(".monAnWrap").hover(
  function () {
    $(this).find('.popUp-monAn').slideDown('medium');
  }, 
  function () {
    $(this).find('.popUp-monAn').slideUp('medium');
  }
);
});
</script>
