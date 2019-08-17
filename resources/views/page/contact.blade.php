@extends('layout.frontend_layout')
@section('content')
<section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper container-1175">
      <div class="hero-left">
        <h1 class="hero-title">Liên Hệ Với Chúng Tôi</h1>
        <p>Liên Hệ Với Chúng Tôi Để Có Hưỡng Dẫn Món Ăn Ngon <br class="d-none d-xl-block"> Và Cách Chọn Và Bảo Quản Thực Ăn Tốt Nhất </p>
        <ul class="hero-info d-none d-md-block">
          <li class="pt-3">
            <img src="images/banner/fas-service-icon.png" alt="">
            <h4>Nhanh Chóng</h4>
          </li>
          <li class="pt-3">
            <img src="images/banner/fresh-food-icon.png" alt="">
            <h4>Thực Phẩm Sạch</h4>
          </li>
          <li class="pt-3">
            <img src="images/banner/support-icon.png" alt="">
            <h4>Hỗ Trợ 24/7</h4>
          </li>
        </ul>
      </div>
      <div class="hero-right">
        <div class="owl-carousel owl-theme w-100 hero-carousel">
          <div class="hero-carousel-item">
            <img class="images-fluid" src="images/banner/hero-banner-sm.png" alt="">
          </div>
        </div>
      </div>
    
    </div>
  </section>
  <!--================Hero Banner Section end =================-->


  <!-- ================ contact section start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.193935072392!2d105.82033921438595!3d20.984861786022183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acf37cd86a9f%3A0x826a0c4c1b6a6b48!2zMjE5IMSQ4buLbmggQ8O0bmcgVGjGsOG7o25nLCDEkOG7i25oIEPDtG5nLCBIb8OgbmcgTWFpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1565961323048!5m2!1svi!2s" width="1080" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
 
      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Góp Ý Nội Dung Cho Website Với Form Bên Dưới</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm">Send Message</button>
            </div>
          </form>


        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Hà Nội, Việt Nam</h3>
              <p>219 Đinh Công Thượng</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">84 832 0921</a></h3>
              <p>Mở cửa từ 6pm - 8pm từ thứ 2 đến thứ 3</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@colorlib.com">mealbook@mealbook.com.vn</a></h3>
              <p>Gửi chúng tôi mọi nơi</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection