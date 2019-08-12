@extends('layout.frontend_layout')
@section('content')

<section class="blog_area section-margin">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="blog_left_sidebar">
                  @foreach($item as $posts)
                  
                      <article class="blog_item">
                        <div class="blog_item_img">
                          <img class="card-img rounded-0" src="{{$posts->image}}" alt="">
                          <a href="#" class="blog_item_date">
                            <h3>15</h3>
                            <p>Jan</p>
                          </a>
                        </div>
                        
                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route('showPost',$posts->id)}}">
                                <h2>{{$posts->title}}</h2>
                            </a>
                            <p>{{$posts->content}}</p>
                            <ul class="blog-info-link">
                              <li><a href="#"><i class="ti-user"></i> {{$posts->user->name}}</a></li>
                              <li><a href="#"><i class="ti-comments"></i> {{$posts->comment->count()}}</a></li>
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
                                  <a href="#" class="page-link">1</a>
                              </li>
                              <li class="page-item active">
                                  <a href="#" class="page-link">2</a>
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

                  

                      <aside class="single_sidebar_widget popular_post_widget">
                          <h3 class="widget_title">Các Bài Liên Quan</h3>
                          @foreach ($recent as $postRecent)
                          <div class="media post_item">
                              <img src="{{$postRecent->image}}" alt="post">
                              <div class="media-body">
                                  <a href="single-blog.html">
                                      <h3>{{$postRecent->title}}</h3>
                                  </a>
                                  <p>{{$postRecent->created_at}}</p>
                              </div>
                          </div>
                          @endforeach
                      </aside>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection