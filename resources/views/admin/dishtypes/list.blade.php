@extends('layout.admin_layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dish Type List
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dish Type List</li>
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
                <i class="fa fa-plus-circle" aria-hidden="true"></i> ADD NEW
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
                  <th>Avatar</th>
                  <th>Cooking Recipe count</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($dishtypes as $dt)
                <tr class="bg-light">
                  <td>{{$dt->id}}</td>
                  <td>{{$dt->name}}</td>
                  <td>{{$dt->avatar}}</td>
                  <td>{{$dt->cookingRecipe->count()}} Công thức </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" linkurl="{{ route('dishtype.delete', ['id' => $dt->id]) }}"
                      class="btn btn-xs btn-warning btn-remove">Delete</a>
                    <a class="btn btn-xs btn-success" href="">Edit</a>
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
    {{ $dishtypes->links() }}

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
        <form id="form-add" action="admin/user/add" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="role_id" value="3">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Tên</label>
            <input type="text" class="form-control" id="authorname" name="authorname">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Telephone Number</label>
            <input type="text" class="form-control" id="tel" name="tel">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Mật Khẩu</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Thêm</button>
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
        var conf = confirm('Bạn có chắc chắn muốn xoá loại món ăn này hay không ?');
        if(conf){
          window.location.href = $(this).attr('linkurl');
        }
      });
    });
</script>

@endsection