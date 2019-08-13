@extends('layout.frontend_layout')
@section('content')
@if($cooking instanceof App\MealBook)
	@php
	$name = 'mealbook';
	$firstURLSegment = 'mealbooks';
	@endphp
@elseif($cooking instanceof App\CookingRecipe)
	@php
	$name = 'cooking';
	$firstURLSegment = 'cookings';
	@endphp
@endif
<section class="blog_area single-post-area section-margin">
			<div class="container">
					<div class="row">
							<div class="col-lg-8 posts-list">
									<div class="single-post">
													<div class="feature-img">
															<img class="img-fluid" src="{{$cooking->avatar}}" alt="">
													</div>
											<div class="blog_details">
													<h2>{{$cooking->name}}</h2>
                          @foreach ($cooking->ingredientDetail as $detail)
                        <p class="excert">{{$detail->ingredient}} {{$detail->amount}}  </p> 
                        @endforeach
                          <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="ti-user"></i> {{$cooking->user->name}}</a></li>
                            <li><a href="#"><i class="ti-comments"></i>{{$cooking->comment->count()}} Comment</a></li>
                            </ul>
											
                    
											</div>
                  </div>
                  <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                      <p class="like-info"><span class="align-middle">     <div class="d-flex vote-controls">
                         <a title="point" class="point {{Auth::guest() ? 'off' : '($cooking->isPoint()) ' }} {{$cooking->isPoint() ? 'off' :''}}"
                                onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$cooking->id}}').submit();">
                            <i class="fa fa-heart"></i>
                                <form id="point-{{$name}}-{{$cooking->id}}" action="/{{$firstURLSegment}}/{{$name}}/point" method="POST" style="display: none;">
                            @csrf
                            @if($cooking->isPoint())
                            @method('DELETE');
                            @endif
                            <input type="hidden" name="id" value="{{$cooking->id}}">
                            <input type="hidden" name="point" value="1">
                        </form>	
                        </a>
                        @if($cooking->point()->sum('point') > 0)
                        <span>{{$cooking->point()->sum('point')}}</span>
                        @else
                        <span>0</span>
                        @endif
                    </div></span></p>
                      <div class="col-sm-4 text-center my-2 my-sm-0">
                        <p class="comment-count"><span class="align-middle"><i class="ti-comment"></i></span> {{$cooking->comment->count()}} Comments</p>
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
                      <img src="{{$cooking->user->image}}" alt="">
                      <div class="media-body">
                        <a href="#">
                          <h4>{{$cooking->user->name}}</h4>
                        </a>
                       <p>{{$cooking->user->email}}</p>
                      </div>
                    </div>
                  </div>
									<div class="comments-area">
											<h4>{{$cooking->comment->count()}}</h4>
											<div class="comment-list">
                      @foreach($cooking->comment as $comments)
             
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
											<form class="form-contact comment_form" action="/{{$firstURLSegment}}/{{$cooking->id}}/comment" id="commentForm" method="post">
                        <div class="row">
                          <div class="col-12">@csrf
                        <input type="hidden" name="id" value="{{$cooking->id}}">
                        <div class="form-group">
                                <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9" {{old('content')}} placeholder="Write Comment"></textarea>
                                @if( $errors->has('content') )
                                <p class="text-warning">{{ $errors->first('content')}}</p>
                                @endif
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input class="form-control" name="title" id="name" type="text" placeholder="Tiêu Đề" {{old('title')}}>
                              @if( $errors->has('title') )
                                <p class="text-warning">{{ $errors->first('title')}}</p>
                                @endif
                            </div>
                          </div>

                          </div>
                        </div>
                        @if(Auth::user())
                        <div class="form-group">
                          <button type="submit" class="button button-contactForm">Send Message</button>
                        </div>
                        @endif
                      </form>
									</div>
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

                      <aside class="single_sidebar_widget popular_post_widget">
                          <h3 class="widget_title">Recent Post</h3>
                          @foreach ($recent as $item)
                          <div class="media post_item">
                              <img src="{{$item->avatar}}" alt="post">
                              <div class="media-body">
                              <a href="{{route('showCooking',$item->id)}}">
                                      <h3>{{$item->name}}</h3>
                                  </a>
                                  <p>{{$item->created_at}}</p>
                              </div>
                          </div>
               @endforeach
                      </aside>
                      <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                          <h4 class="widget_title">Tag Clouds</h4>
                          <ul class="list">
                              <li>
                                  <a href="#">project</a>
                              </li>
                              <li>
                                  <a href="#">love</a>
                              </li>
                              <li>
                                  <a href="#">technology</a>
                              </li>
                              <li>
                                  <a href="#">travel</a>
                              </li>
                              <li>
                                  <a href="#">restaurant</a>
                              </li>
                              <li>
                                  <a href="#">life style</a>
                              </li>
                              <li>
                                  <a href="#">design</a>
                              </li>
                              <li>
                                  <a href="#">illustration</a>
                              </li>
                          </ul>
                      </aside>


                      <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                  <img class="img-fluid" src="images/instagram/widget-i1.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                  <img class="img-fluid" src="images/instagram/widget-i2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                  <img class="img-fluid" src="images/instagram/widget-i3.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                  <img class="img-fluid" src="images/instagram/widget-i4.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                  <img class="img-fluid" src="images/instagram/widget-i5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                  <img class="img-fluid" src="images/instagram/widget-i6.png" alt="">
                                </a>
                            </li>
                        </ul>
                      </aside>


                      <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>

                        <form action="#">
                          <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter email" required>
                          </div>
                          <button class="button rounded-0 primary-bg text-white w-100" type="submit">Subscribe</button>
                        </form>
                      </aside> -->
                  </div>
							</div>
			</div>
	</section>

@endsection