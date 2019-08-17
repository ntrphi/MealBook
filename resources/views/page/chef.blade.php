@extends('layout.frontend_layout')
@section('content')
 


  <!--================Hero Banner Section end =================-->


    <!--================Chef section start =================-->  
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px chef-div">
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

            <!-- <div class="chef-overlay">
              <ul class="social-icons">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
                <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
              </ul>
            </div> -->
          </div>
        </div>
  @endforeach
      </div>
    </div>
  </section>
  <!--================Chef section end =================-->  

  <!--================CTA section start =================-->  

@endsection