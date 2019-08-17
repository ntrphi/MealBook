@extends('layout.admin_layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User List
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="form-group">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#show-add">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Author
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Avatar</th>
                  <th>Post count</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                @if ($user->trashed())
                <tr class="bg-red">
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}
                  </td>
                  <td>{{$user->email}}</td>
                  <td><img src="{{$user->image}}" width="50px" height="50px" alt=""></td>
                  <td>{{$user->cookingRecipe->count()}} Công thức và {{$user->mealBook->count()}} Mâm cơm</td>
                  <td class="text-center">
                    @if ($user->role->name=="Member")
                    <a href="javascript:void(0);" linkurl="{{ route('user.delete', ['id' => $user->id]) }}"
                      class="btn btn-xs btn-warning btn-remove">Delete</a>
                    <a class="btn btn-xs btn-success" href="{{route('user.restore', $user->id)}}">Restore</a>
                    @endif

                  </td>
                </tr>
                @else
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}
                  </td>
                  <td>{{$user->email}}</td>
                  <td><img src="{{$user->image}}" width="50px" height="50px" alt=""></td>
                  <td>{{$user->cookingRecipe->count()}} Công thức và {{$user->mealBook->count()}} Mâm cơm</td>
                  <td class="text-center">
                    @if ($user->role->name=="Member")
                    <a href="javascript:void(0);" linkurl="{{ route('user.delete', ['id' => $user->id]) }}"
                      class="btn btn-xs btn-danger btn-remove">Delete tạm</a>
                    <a class="btn btn-xs btn-info" href="{{route('upgradeToAdmin', $user->id)}}">Upgrade To Admin</a>
                    @endif
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- /.box-body -->
        </div>

      </div>
      <!-- /.col -->
    </div>
    {{ $users->links() }}

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- Modal Add-->
<div class="modal fade" id="show-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Author</h4>
      </div>
      <div class="modal-body">
        <form action="sign-in" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name" name="name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          @if( $errors->has('name') )
          <p class="text-warning">{{ $errors->first('name')}}</p>
          @endif
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Tel number" name="tel">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
          @if( $errors->has('tel') )
          <p class="text-warning">{{ $errors->first('tel')}}</p>
          @endif
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          @if( $errors->has('email') )
          <p class="text-warning">{{ $errors->first('email')}}</p>
          @endif
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          @if( $errors->has('password') )
          <p class="text-warning">{{ $errors->first('password')}}</p>
          @endif
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          @if( $errors->has('password_confirmation') )
          <p class="text-warning">{{ $errors->first('password_confirmation')}}</p>
          @endif
          <div class="form-group has-feedback">
            <input type="file" class="form-control" placeholder="choose avatar" name="image">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          @if( $errors->has('image') )
          <p class="text-warning">{{ $errors->first('image')}}</p>
          @endif
          <div class="row">
            <div class="col-xs-8 ">
              <div class="d-none" style="display: none">
                <label>
                  <input type="checkbox" class="" name="term" checked> I agree to the <a href="#">terms</a>
                </label>
              </div>
              @if( $errors->has('term') )
              <p class="text-warning">{{ $errors->first('term')}}</p>
              @endif
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Create</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
      $('.btn-remove').on('click', function(){
        var conf = confirm('Bạn có chắc chắn muốn xoá bài viết này hay không ?');
        if(conf){
          window.location.href = $(this).attr('linkurl');
        }
      });
    });
</script>

@endsection