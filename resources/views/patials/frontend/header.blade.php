  <!-- main header -->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="{{url('/')}}"><img class="img-fluid main-logo" src="images/mealbook logo.png" alt=""></a>
          <!-- thanh search -->
       <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
              <input class="search_input" type="text" name="" placeholder="Search...">
              <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
            
              <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li> 
              <li class="nav-item"><a class="nav-link" href="">Mâm Cơm</a></li> 
              <li class="nav-item"><a class="nav-link" href="{{route('postAll')}}">Tin Tức</a>
              <li class="nav-item"><a class="nav-link" href="{{route('cookingAll')}}">Món Ăn</a>

              <li class="nav-item ">
                <a href="{{route('chef')}}" class="nav-link" role="button">Đầu Bếp</a>
                <!-- <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog Single</a></li>
                  <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                </ul> -->
							</li>
              <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Lien he</a></li>

            
            </ul>
          </div> 
        </div>
      </nav>
    </div>
    <form action="{{route('postAdd')}}" method="get">
                <button type="submit" class="btn btn-danger">Đăng Bài</button>
                </form>
             
                <form action="{{route('cookingAdd')}}" method="get">
                <button type="submit" class="btn btn-submit">Đăng Món Ăn</button>
                </form>
  </header>
         	
@auth
<div>
    AUTHAUTH
</div>
@endauth

@guest
<div>
    Not not not
</div>
@endguest
    </div>