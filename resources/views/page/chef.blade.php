@extends('layout.frontend_layout')
@section('content')
 <section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
      <div class="hero-left">
        <h1 class="hero-title">Talent Chefs</h1>
        <p>From  set together our divided own saw divided the form god <br class="d-none d-xl-block"> seas moveth you will fifth under replenish end</p>
        <ul class="hero-info d-none d-lg-block">
          <li>
            <img src="images/banner/fas-service-icon.png" alt="">
            <h4>Fast Service</h4>
          </li>
          <li>
            <img src="images/banner/fresh-food-icon.png" alt="">
            <h4>Fresh Food</h4>
          </li>
          <li>
            <img src="images/banner/support-icon.png" alt="">
            <h4>24/7 Support</h4>
          </li>
        </ul>
      </div>
      <div class="hero-right">
        <div class="owl-carousel owl-theme w-100 hero-carousel">
          <div class="hero-carousel-item">
            <img class="img-fluid" src="images/banner/hero-banner-sm.png" alt="">
          </div>
          <!-- <div class="hero-carousel-item">
            <img class="img-fluid" src="images/banner/hero-banner2.png" alt="">
          </div>
          <div class="hero-carousel-item">
            <img class="img-fluid" src="images/banner/hero-banner1.png" alt="">
          </div>
          <div class="hero-carousel-item">
            <img class="img-fluid" src="images/banner/hero-banner2.png" alt="">
          </div> -->
        </div>
      </div>
      <ul class="social-icons d-none d-lg-block">
        <li><a href="#"><i class="ti-facebook"></i></a></li>
        <li><a href="#"><i class="ti-twitter"></i></a></li>
        <li><a href="#"><i class="ti-instagram"></i></a></li>
      </ul>
    </div>
  </section>
  <!--================Hero Banner Section end =================-->


    <!--================Chef section start =================-->  
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Our Chef</h4>
        <h2>Talent & experience member</h2>
      </div>

      <div class="row">
      @foreach ($chef as $item)
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
          <div class="chef-card">
            <img class="card-img rounded-0" src="{{$item->image}}" alt="">
            <div class="chef-footer">
              <h4>{{$item->name}}</h4>
              <p>{{$item->tel}}</p>
            </div>

            <div class="chef-overlay">
              <ul class="social-icons">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
                <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
  @endforeach
      </div>
    </div>
  </section>
  <!--================Chef section end =================-->  

  <!--================CTA section start =================-->  
  <section class="cta-area text-center">
    <div class="container">
      <p>Some Trendy And Popular Courses Offerd</p>
      <h2>Under replenish give saying thing</h2>
      <a class="button" href="#">Reservation</a>
    </div>
  </section>
@endsection