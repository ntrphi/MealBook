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
                          {{strip_tags((html_entity_decode($post->content)))}}
                         </p>
											</div>
                  </div>
                  <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                      <p class="like-info"><span class="align-middle"><i class="ti-heart"></i></span> Lily and 4 people like this</p>
                      <div class="col-sm-4 text-center my-2 my-sm-0">
                        <p class="comment-count"><span class="align-middle"><i class="ti-comment"></i></span> 06 Comments</p>
                      </div>
                     
                    </div>             
                  
                  <div class="blog-author">
                    <div class="media align-items-center">
                      <img src="{{$post->user->image}}" alt="">
                      <div class="media-body">
                        <a href="{{route('userpage',$post->user_id)}}">
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
                                  <p> {{$comments->content}}</p>
                                  <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                      <h5>
                                        <a href="{{route('userpage',$post->user_id)}}">{{$comments->user->name}}</a>
                                      </h5>
                                      <p class="date">{{$comments->created_at}} </p>
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
                          <div class="col-12">{{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$post->id}}">
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
                  </div>
							</div>
					</div>
          </div>
			</div>
	</section>

@endsection