  <!-- main header -->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620 position-relative">
          <a class="navbar-brand logo_h" href="{{url('/')}}"><img class="img-fluid main-logo" src="images/mealbook logo.png" alt=""></a>
          <!-- thanh search -->
       <div class="d-flex justify-content-center h-100">
       <form action="{{route('search')}}" method="post">
       {{ csrf_field() }}
            <div class="searchbar">
              <input class="search_input" type="text" name="search" placeholder="Search...">
              <a href="" class="search_icon"><i class="fa fa-search"></i></a>
            </div>
            </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
            
              <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Trang Chủ</a></li> 
              <li class="nav-item"><a class="nav-link" href="{{route('mealAll')}}">Mâm Cơm</a></li> 
              <li class="nav-item"><a class="nav-link" href="{{route('cookingAll')}}">Món Ăn</a>
              <li class="nav-item ">
                <a href="{{route('chef')}}" class="nav-link" role="button">Đầu Bếp</a>
                <!-- <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog Single</a></li>
                  <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                </ul> -->
              </li>
              <li class="nav-item"><a class="nav-link" href="{{route('postAll')}}">Tin Tức</a>
              <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Liên hệ</a></li>

            
            </ul>
            <div class="user-wrap position-absolute top-0">
            @if(Auth::check())
            <a href="{{route('userpage',Auth::user()->id)}}" class="frameUser">    
              <img src="{{Auth::user()->image}}">
            </a>
            @else
            <a href="{{route('login')}}" class="d-flex">
              <img src="/images/user-login.png" width="45" alt="">
              <span class="text-dark pl-2 pt-2">Đăng nhập</span>
            </a>
            @endif

          </div> 
        </div>
      </nav>
    </div>
    @if(Auth::check())
    <div class="container my-3">
      <div class="row">
        <form class="ml-auto mx-2" action="{{route('postAdd')}}" method="get">
          <button type="submit" class="btn btn-danger">Đăng Bài</button>
        </form>

        <form class="mx-2" action="{{route('cookingAdd')}}" method="get">
          <button type="submit" class="btn btn-submit">Đăng Món Ăn</button>
        </form>
        <form class="mx-2 mr-5" action="{{route('mealbookAdd')}}" method="get">
          <button type="submit" class="btn btn-submit">Đăng Mâm Cơm</button>
        </form>
      </div>
    </div>
    @endif
  </header>
