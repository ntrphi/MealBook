@extends('layout.admin_layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="admin/dist/img/user4-128x128.jpg"
              alt="User profile picture">

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Cooking Recipes Posted</b> <a class="pull-right">{{$user->cookingRecipe()->count()}}</a>
              </li>
              <li class="list-group-item">
                <b>Meal Book Posted</b> <a class="pull-right">{{$user->mealBook()->count()}}</a>
              </li>
              <li class="list-group-item">
                <b>Post</b> <a class="pull-right">{{$user->post()->count()}}</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#activity">Your Comments</a></li>
            <li class="active"><a href="#timeline" data-toggle="tab">Your Cooking Recipes</a></li>
            <li><a href="#mealbook" data-toggle="tab">Your mealbook</a></li>
            @if ($user->id == Auth::user()->id)
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
            @endif
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="activity">
              <!-- Post -->
              @foreach ($user->comment as $comment)

              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{$user->images}}" alt="user image">
                  <span class="username">
                    <a href="#">{{$comment->title}}</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Shared publicly - {{$comment->created_at}}</span>
                </div>
                <!-- /.user-block -->
                <p>
                  {{$comment->content}}
                </p>
                <ul class="list-inline">
                  {{-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li> --}}
                  {{-- <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li> --}}
                </ul>

                <input class="form-control input-sm" type="text" placeholder="Type a comment">
              </div>
              @endforeach

              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="active tab-pane" id="timeline">
              @foreach ($user->cookingRecipe as $recipe)

              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{$recipe->images}}" alt="user image">
                  <span class="username">
                    <a href="#">{{$recipe->name}}</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Shared publicly - {{$recipe->created_at}}</span>
                </div>
                <!-- /.user-block -->
                <p>
                  {{$recipe->ingredient}}
                </p>
                <ul class="list-inline">
                  {{-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li> --}}
                  {{-- <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li> --}}
                </ul>

                <input class="form-control input-sm" type="text" placeholder="Type a comment">
              </div>
              @endforeach
            </div>
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
            <div class="tab-pane" id="mealbook">
              @foreach ($user->mealBook as $mealbook)

              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{$mealbook->images}}" alt="user image">
                  <span class="username">
                    <a href="#">{{$mealbook->name}}</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Shared publicly - {{$mealbook->created_at}}</span>
                </div>
                <!-- /.user-block -->
                <p>
                  Mâm cơm gồm các món :
                  @foreach ($mealbook->mealBookDishes as $dish)
                  {{$dish->name}},&nbsp;
                  @endforeach
                </p>
                <ul class="list-inline">
                  {{-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li> --}}
                  {{-- <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li> --}}
                </ul>

                <input class="form-control input-sm" type="text" placeholder="Type a comment">
              </div>
              @endforeach
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="settings">
              <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" name="name" placeholder="Name" value="{{$user->name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$user->email}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTel" class="col-sm-2 control-label">Tel</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputTel" name="tel" placeholder="Tel" value="{{$user->tel}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputImage" class="col-sm-2 control-label">Avatar</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="image" id="inputImage">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Change Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputSkills" placeholder="password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
@endsection