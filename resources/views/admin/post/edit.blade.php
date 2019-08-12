@extends('layout.admin_layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa Bài Viết
            {{-- <small>Preview</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Post</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements disabled -->
                <div class="box box-warning">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                           @foreach($errors->all() as $err)
                           {{ $err }}<br>
                           @endforeach
                       </div>
                       @endif
                    <div class="box-header with-border">
                        <h3 class="box-title">General Elements</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{route('managerPost')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}                   
                        <!-- text input -->
                            <div class="form-group">
                            <input type="hidden" name="id" id="" value="{{$post->id}}">
                            <label>Tên Bài Viết</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="title" value="{{$post->title}}">
                            </div>
                            <!-- textarea -->
                           
                            <div class="form-group">
                                <label>Nội Dung </label>
                                <!-- ckeditor -->
                                <textarea class=" form-control" id="editor1" rows="3" placeholder="Place some text here"  name="content">{{$post->content}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="">Avatar</label>
                                <input type="file" class="form-control" name="image" id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-success">Save</button>
                            <a href="{{route('list-post')}}" class="btn btn-lg btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </section>
</div>
<script>
    CKEDITOR.replace( 'editor1' );  
</script>

@endsection