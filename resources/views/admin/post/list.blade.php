@extends('layout.admin_layout')
@section('content')
<!-- Page Content -->

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 50px;">
                <h1 class="page-header">Bài Viết 
                    <small>Danh Sách</small>
                </h1>
                @if(session('flash_success'))
                <div class="alert alert-success">
                    <strong>Thành Công! </strong>{{ session('flash_success') }}
                </div>
                @endif
                @if(session('flash_err'))
                <div class="alert alert-danger">
                    <strong>Cảnh Báo! </strong>{{ session('flash_err') }}
                </div>
                @endif
                <table class="table table-striped table-bordered table-hover " id="example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Avatar</th>
                            <th>Content</th>
                            <th>Created At</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $post)
                          @if($post->trashed())
                            <tr class="odd gradeX bg-red">
                                <td>{{ $post->id }}</td>
                                <td>
                                    {{ $post->title }}
                                </td>
                        
                                <td>
                                    {{$post->user->name}}
                                </td>

                                <td><img src="{{ $post->image }}" alt="" width="50px"> </td>
                                <td class="text-center">{{ strip_tags(html_entity_decode($post->content)) }}</td>
                            
                                <td>{{ $post->created_at }}</td>
                                <td>
                                <a href="javascript:void(0);" linkurl="{{ route('post.delete', ['id' => $post->id]) }}"
                                    class="btn btn-xs btn-warning btn-remove">Delete </a>
                                    <a class="btn btn-xs btn-success" href="{{route('post.restore', $post->id)}}">Restore</a>
                                </td>
                            </tr>
                        @else
                            <tr class="odd gradeX">
                                <td>{{ $post->id }}</td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{$post->user->name}}
                                </td>

                                <td><img src="{{ $post->image }}" alt="" width="50px"> </td>
                                <td class="text-center">{{ strip_tags(html_entity_decode($post->excerpt())) }}</td>
                            
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <a href="javascript:void(0);" linkurl="{{ route('post.delete', ['id' => $post->id]) }}"
                                    class="btn btn-xs btn-danger btn-remove">Delete</a>
                                    @if(Auth::user()->id == $post->user_id)
                                    <a href="{{route('postEdit',$post->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Xóa Bài Viết</h4>
            </div>
            <div class="modal-body">
                <form id="form-delete">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="del-id">
                    <p>Bạn có chắc muốn xóa bài viết với id = <strong id="del-id"></strong> này?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-danger" id="delete">Xóa</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    //  $('#modal-delete').on('show.bs.modal', function(event) {
    //         var button = $(event.relatedTarget)
    //         var iddel = button.data('id')
    //         var modal = $(this)
    //         modal.find('.modal-body #del-id').html(iddel);
    //         modal.find('.modal-body #delete').attr('href', 'admin/posts/delete/' + iddel);
    //     })
    $(document).ready(function(){
      $('.btn-remove').on('click', function(){
        var conf = confirm('Bạn có chắc chắn muốn xoá bài viết này hay không ?');
        if(conf){
          window.location.href = $(this).attr('linkurl');
        }
      });
    });
</script>
<script src="admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap-flash-alert.js"></script>
@endsection