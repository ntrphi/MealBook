@extends('layout.frontend_layout')
@section('content')
<form action="{{route('postStore')}}" method="post" enctype="multipart/form-data">
@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title"  placeholder="Title">
    @if($errors->has('title'))
      <div class="invalid-feedback">
        <strong>{{$errors->first('title')}}</strong>
      </div>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="image">
    @if($errors->has('image'))
      <div class="invalid-feedback">
        <strong>{{$errors->first('image')}}</strong>
      </div>
    @endif
  </div>
  <div class="form-check">
  <label for="Description"></label>
    <textarea rows="" cols="" name="content"></textarea>
    @if($errors->has('content'))
      <div class="invalid-feedback">
        <strong>{{$errors->first('content')}}</strong>
      </div>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
