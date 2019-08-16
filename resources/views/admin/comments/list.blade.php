@extends('layout.admin_layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Comment List
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Comment List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="form-group">
     
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
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