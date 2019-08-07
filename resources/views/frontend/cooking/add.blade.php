@extends('layout.frontend_layout')
@section('content')
<div class="container addMonAnWrap mt-5">
        <h2 class="text-center">Tao mon an cua rieng ban</h2>
        <div class="col-md-9 mx-auto addMonAnField">  
        <form action="{{route('cookingStore')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
          <label for="exampleInputPassword1">Ảnh Món Ăn </label>
          <input type="file" name="avatar" >
          @if( $errors->has('avatar') )
              <p class="text-warning">{{ $errors->first('avatar')}}</p>
          @endif
       </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Tên Món Ăn</label>
              <input type="text" name="name"  placeholder="Title">
              @if( $errors->has('name') )
                  <p class="text-warning">{{ $errors->first('name')}}</p>
              @endif
         </div>
         <div class="form-group">
              <label for="exampleInputPassword1">Thể Loại </label>
              <select name="dish_type_id">
              @foreach($dishType as $item)
                <option value="<?php echo $item->id;  ?>"><?php echo $item->name;  ?></option>
                @endforeach
                @if( $errors->has('dish_type_id') )
                  <p class="text-warning">{{ $errors->first('dish_type_id')}}</p>
              @endif
              </select>
           </div>
                
          <div class="form-group">
            <label for="exampleInputPassword1">Thành Phần</label>
            <input type="text" name="ingredient" value="{{old('ingredient')}}">
            @if( $errors->has('ingredient') )
                <p class="text-warning">{{ $errors->first('ingredient')}}</p>
            @endif
          </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Công Thức Nấu</label>
            <textarea rows="" cols="" name="recipe" value="{{old('recipe')}}"></textarea>
            @if( $errors->has('recipe') )
                <p class="text-warning">{{ $errors->first('recipe')}}</p>
            @endif
           </div>
          <button type="submit" class="btn btn-primary" >Submit</button>

            </form>
        </div>
    </div>
@endsection
