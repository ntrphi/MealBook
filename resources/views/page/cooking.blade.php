@extends('layout.frontend_layout')
@section('content')
@if($first instanceof App\MealBook)
	@php
	$name = 'mealbook';
	$firstURLSegment = 'mealbooks';
	@endphp
@elseif($first instanceof App\CookingRecipe)
	@php
	$name = 'cooking';
	$firstURLSegment = 'cookings';
	@endphp
@endif
<section class="blog_area section-margin">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="blog_left_sidebar">
                  @foreach($recent as $cooking)
                  
                      <article class="blog_item">
                        <div class="blog_item_img">
                          <img class="card-img rounded-0" src="{{$cooking->avatar}}" alt="">
                          <div href="#" class="blog_item_date">
                            
                             <a title="point" class="point {{Auth::guest() ? 'off' : '($cooking->isPoint()) ' }} {{$cooking->isPoint() ? 'off' :''}}"
                                onclick="event.preventDefault(); document.getElementById('point-{{$name}}-{{$cooking->id}}').submit();">
                                <i class="fa fa-thumbs-up"></i>
                                <form id="point-{{$name}}-{{$cooking->id}}" action="/{{$firstURLSegment}}/{{$name}}/point" method="POST" style="display: none;">
                                        @csrf
                                        @if($cooking->isPoint())
                                        @method('DELETE');
                                        @endif
                                        <input type="hidden" name="id" value="{{$cooking->id}}">
                                        <input type="hidden" name="point" value="1">
                                </form>	
                             </a>
                                    <p>     @if($cooking->point()->sum('point') > 0)
                                <span>{{$cooking->point()->sum('point')}}</span>
                                @else
                                <span>0</span>
                                @endif</p>
                          </div>
                        </div>
                    <div class="d-flex vote-controls">
                       
                   
                    </div>
                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route('showCooking',$cooking->id)}}">
                                <h2>{{$cooking->name}}</h2>
                            </a>
                            <span>{{$cooking->dishType->name}}</span>
                            <p>{{$cooking->ingredient}}</p>
                            <p>{{$cooking->recipe}}</p>

                            <ul class="blog-info-link">
                              <li><a href="#"><i class="ti-user"></i> {{$cooking->user->name}}</a></li>
                              <li><a href="#"><i class="ti-comments"></i> {{$cooking->comment->count()}}</a></li>
                            </ul>
                        </div>
                      </article>
                  @endforeach
                      <nav class="blog-pagination justify-content-center d-flex">
                          <ul class="pagination">
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Previous">
                                      <span aria-hidden="true">
                                          <span class="ti-arrow-left"></span>
                                      </span>
                                  </a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link">{{$recent->links()}}</a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Next">
                                      <span aria-hidden="true">
                                          <span class="ti-arrow-right"></span>
                                      </span>
                                  </a>
                              </li>
                          </ul>
                      </nav>
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

                      <aside class="single_sidebar_widget post_category_widget">

                      <aside class="single_sidebar_widget popular_post_widget">
                          <h3 class="widget_title">Các món liên quan</h3>
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

                      </aside>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection