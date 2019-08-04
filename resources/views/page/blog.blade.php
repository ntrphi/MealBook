@extends('layout.frontend_layout')
@section('content')
<section class="blog_area single-post-area section-margin">
			<div class="container">
					<div class="row">
							<div class="col-lg-8 posts-list">
									<div class="single-post">
													<div class="feature-img">
															<img class="img-fluid" src="{{$post->image}}" alt="">
													</div>
											<div class="blog_details">
													<h2>{{$post->title}}</h2>
                          <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="ti-user"></i> {{$post->user->name}}</a></li>
                            <li><a href="#"><i class="ti-comments"></i>{{$post->comment->count()}}</a></li>
                            </ul>
													<p class="excert">
                          {{$post->content}}
                         </p>
											</div>
                  </div>
                  <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                      <p class="like-info"><span class="align-middle"><i class="ti-heart"></i></span> Lily and 4 people like this</p>
                      <div class="col-sm-4 text-center my-2 my-sm-0">
                        <p class="comment-count"><span class="align-middle"><i class="ti-comment"></i></span> 06 Comments</p>
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
                      <img src="{{$post->user->image}}" alt="">
                      <div class="media-body">
                        <a href="#">
                          <h4>{{$post->user->name}}</h4>
                        </a>
                       <p>{{$post->user->email}}</p>
                      </div>
                    </div>
                  </div>
  @if($post instanceof App\Post)
	@php
	$name = 'post';
	$firstURLSegment = 'posts';
	@endphp
@elseif($cooking instanceof App\CookingRecipe)
	@php
	$name = 'cooking';
	$firstURLSegment = 'cookings';
	@endphp
@endif
									<div class="comments-area">
											<h4>{{$post->comment->count()}}</h4>
											<div class="comment-list">
                      @foreach($post->comment as $comments)
             
                        <div class="single-comment justify-content-between d-flex">
                          <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                  <img src="images/blog/c1.png" alt="">
                              </div>
                              <div class="desc">
                                  <p class="comment">
                                   {{$comments->title}}
                                  </p>

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
											<form class="form-contact comment_form" action="/{{$firstURLSegment}}/{{$post->id}}/comment" id="commentForm" method="post">
                        <div class="row">
                          <div class="col-12">@csrf
                        <input type="hidden" name="id" value="{{$post->id}}">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9" {{old('content')}} placeholder="Write Comment"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input class="form-control" name="title" id="name" type="text" placeholder="Name" {{old('title')}}>
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

                      <aside class="single_sidebar_widget popular_post_widget">
                          <h3 class="widget_title">Recent Post</h3>
                          @foreach ($recent as $item)
                          <div class="media post_item">
                              <img src="{{$item->image}}" alt="post" width="150" height="100" >
                              <div class="media-body">
                                  <a href="{{$item->id}}">
                                      <h3>{{$item->title}}</h3>
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
			</div>
	</section>

@endsection