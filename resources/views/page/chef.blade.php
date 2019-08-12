@extends('layout.frontend_layout')
@section('content')
 <section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
      <div class="hero-left">
        <h1 class="hero-title">Đầu Bếp Tại MealBook</h1>
        <p>Tất cả các đầu bếp đến từ trên mọi miền thế giới <br class="d-none d-xl-block"> cho bạn những món ăn tuyệt hảo nhất</p>
        <ul class="hero-info d-none d-lg-block">
          <li>
            <img src="images/banner/fas-service-icon.png" alt="">
            <h4>Nhanh Chóng</h4>
          </li>
          <li>
            <img src="images/banner/fresh-food-icon.png" alt="">
            <h4>Thực Phẩm Sạch</h4>
          </li>
          <li>
            <img src="images/banner/support-icon.png" alt="">
            <h4>Hỗ Trợ 24/7</h4>
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

    </div>
  </section>
  <!--================Hero Banner Section end =================-->


    <!--================Chef section start =================-->  
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Đầu Bếp Của Chúng Tôi</h4>
        <h2>Tài Năng & Kinh Nghiệm Đầu Bếp</h2>
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

@endsection