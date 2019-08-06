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
                  <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                  @foreach($user as $users)
                <tr>
                <td>{{$user->id}}</td>
                  <td>{{$user->name}}
                  </td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->avatar}}</td>
                  <td>{{$user->cookingRecipe->count()}}</td>
                  <td>
                    <button type="submit" onclick="delete($user->id, $user->name)">Delete</button>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('script')
<script>
  function delete(id, name){
    var prompt = prompt('Delete author '.name.'?');
    if (promt) {
      
    }
  }
</script>

@endsection
