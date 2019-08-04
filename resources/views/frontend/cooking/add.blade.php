@extends('layout.frontend_layout')
@section('content')
<form action="{{route('cookingStore')}}" method="post" enctype="multipart/form-data">
@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Tên Món Ăn</label>
    <input type="text" name="name"  placeholder="Title">
    @if($errors->has('name'))
      <div class="invalid-feedback">
        <strong>{{$errors->first('name')}}</strong>
      </div>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Thể Loại </label>
    <select name="dish_type_id">
    @foreach($dishType as $item)
      <option value="<?php echo $item->id;  ?>"><?php echo $item->name;  ?></option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ảnh Món Ăn </label>
    <input type="file" name="avatar" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Thành Phần</label>
    <input type="text" name="ingredient" value="{{old('ingredient')}}">
  </div>
  <div class="form-group">
  <label for="exampleInputPassword1">Công Thức Nấu</label>
    <textarea rows="" cols="" name="recipe" value="{{old('recipe')}}"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>
@endsection
