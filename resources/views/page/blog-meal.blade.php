@extends('layout.frontend_layout')
@section('content')
<section class="blog_area single-post-area section-margin">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post">
					<div class="feature-img">
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




					</div>
						<div class="blog_details">
						<h2>{{$mealbook->name}}</h2>
                          <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="ti-user"></i> {{$mealbook->getAuthor->name}}</a></li>
                            <li><a href="#"><i class="ti-comments"></i>{{$mealbook->comment->count()}} Comment</a></li>
                            </ul>
													<p class="excert">
                         </p>
											</div>
                  </div>
                  <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                      <p class="like-info"><span class="align-middle"><i class="ti-heart"></i></span></p>
                      <div class="col-sm-4 text-center my-2 my-sm-0">
                        <p class="comment-count"><span class="align-middle"><i class="ti-comment"></i></span> {{$mealbook->comment->count()}} Comments</p>
                      </div>
                      <ul class="social-icons">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-dribbble"></i></a></li>
                        <li><a href="#"><i class="ti-wordpress"></i></a></li>
                      </ul>
                    </div>             
                  
                  <div class="blog-author">
                    <div class="media align-items-center">
                      <img src="{{$mealbook->getAuthor->image}}" alt="">
                      <div class="media-body">
                        <a href="#">
                          <h4>{{$mealbook->getAuthor->name}}</h4>
                        </a>
                       <p>{{$mealbook->getAuthor->email}}</p>
                      </div>
                    </div>
                  </div>
  @if($mealbook instanceof App\MealBook)
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
									<div class="comments-area">
											<h4>{{$mealbook->comment->count()}}</h4>
											<div class="comment-list">
                      @foreach($mealbook->comment as $comments)
             
                        <div class="single-comment justify-content-between d-flex">
                          <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                  <img src="images/blog/c1.png" alt="">
                              </div>
                              <div class="desc">
                                  <p class="comment">
                                   {{$comments->title}}
                                  </p>
                                 <p>{{$comments->content}}</p>
                                  <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                      <h5>
                                        <a href="#">{{$comments->user->name}}</a>
                                      </h5>
                                      <p class="date">{{$comments->created_at}} </p>
                                    </div>

                                    <div class="reply-btn">
                                      <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                      @endforeach
											</div>
										
									<div class="comment-form">
											<h4>Leave a Reply</h4>
											<form class="form-contact comment_form" action="/{{$firstURLSegment}}/{{$mealbook->id}}/comment" id="commentForm" method="post">
                        <div class="row">
                          <div class="col-12">@csrf
                        <input type="hidden" name="id" value="{{$mealbook->id}}">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9" {{old('content')}} placeholder="Write Comment"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input class="form-control" name="title" id="name" type="text" placeholder="Tiêu Đề" {{old('title')}}>
                            </div>
                          </div>

                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="button button-contactForm">Send Message</button>
                        </div>
                      </form>
									</div>
							</div>
							<div class="col-lg-4">
                <div class="blog_right_sidebar">
                      <aside class="single_sidebar_widget search_widget">
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
                      </aside>

      
                  </div>
							</div>
					</div>
			</div>
	</section>

@endsection