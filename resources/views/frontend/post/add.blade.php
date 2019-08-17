@extends('layout.frontend_layout')
@section('content')
<div class="container addMonAnWrap mt-5">
        <h2 class="text-center mb-4">Tạo Tin Tức Của Bạn</h2>
        <div class="col-md-9 mx-auto mb-5 addMonAnField pb-3">
    <form action="{{route('postStore')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group uploadIMGWrap pt-3">
                  <div class="afterUploadingIMG">
                    <img src="" alt="">
                  </div>
                  <div class="overlay-uploadIMG text-center mt-3">
                    <input type="file" style="opacity: 0" class="form-control-file" name="image" onchange="displayIMG(this)" accept="images/*">
                  
                    <span><i class="fa fa-camera"></i></span>
                    <p>Tải ảnh lên...</p>
                    @if( $errors->has('image') )
                  <p class="text-warning">{{ $errors->first('image')}}</p>
                  @endif
                  </div>
                </div>
          <div class="form-group">
          <label class="text-dark font-weight-bold off-outline" for="my-input">Title</label>
              <input type="text" name="title" class="form-control border-gray"  placeholder="Title">
              @if( $errors->has('title') )
                  <p class="text-warning">{{ $errors->first('title')}}</p>
              @endif
            </div>
            <div class="form-group">
            <label class="text-dark font-weight-bold off-outline" for="my-input">Nội Dung</label>
              <textarea name="content"  id="editor1"  class="form-control border-gray"></textarea>
              @if( $errors->has('content') )
                  <p class="text-warning">{{ $errors->first('content')}}</p>
                  @endif
            </div>
                <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<script>

function displayIMG(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.afterUploadingIMG>img')
                    .attr('src', e.target.result)
                    .width('100%');
                $('.afterUploadingIMG').css('box-shadow','0px 0px 10px 3px rgba(0,0,0,0.75)');
                    
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    CKEDITOR.replace( 'editor1' );  
</script>
@endsection
