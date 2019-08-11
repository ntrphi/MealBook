@extends('layout.frontend_layout')
@section('content')
<div class="container addMonAnWrap mt-5">
        <h2 class="text-center mb-4">Tao mon an cua rieng ban</h2>
        <div class="col-md-9 mx-auto mb-5 addMonAnField">
            <form action="{{route('cookingStore')}}" class="col-md-10 mx-auto pb-5" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group uploadIMGWrap pt-3">
                  <div class="afterUploadingIMG">
                    <img src="" alt="">
                  </div>
                  <div class="overlay-uploadIMG text-center mt-3">
                    <input type="file" style="opacity: 0" class="form-control-file" name="avatar" onchange="displayIMG(this)" accept="images/*">
                  
                    <span><i class="fas fa-camera"></i></span>
                    <p>Tải ảnh món ăn lên...</p>
                    @if( $errors->has('avatar') )
                        <p class="text-warning">{{ $errors->first('avatar')}}</p>
                    @endif
                  </div>
                </div>
                <div class="form-group mt-5">
                    <label class="text-dark font-weight-bold off-outline" for="my-input">Tên món ăn</label>
                    <input class="form-control border-gray" type="text" name="name" placeholder="Nhập tên món ăn của bạn..." value="{{old('title')}}">
                    @if( $errors->has('name') )
                  <p class="text-warning">{{ $errors->first('name')}}</p>
              @endif
                </div>
                <div class="form-group mt-5">
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
                    <label class="text-dark font-weight-bold off-outline" for="my-input">Nguyên liệu & công thức</label>
                    <input class="typeahead form-control border-gray " name="ingredient" id="nhapNguyenLieuInput" type="text" placeholder="Nhập nguyên liệu tại đây...">
                    <div class="row mx-auto mt-4 mb-4 nguyenLieuCongThucContent">
                       <div class="col-md-5 border-right">
                            <h6 class="pt-3">Nguyên liệu</h6>
                            <div class="nguyenLieuDiv">
                                <!-- <p>
                                    <span class="text-dark " id="log">ga</span>
                                    <span class="ml-auto position-relative text-dark">
                                        <span class="soLuongNguyenLieu">...</span>
                                        <input class="nhapSoLuong" type="text" >
                                    </span>
                                </p> -->
                                @if( $errors->has('ingredient') )
                                  <p class="text-warning">{{ $errors->first('ingredient')}}</p>
                              @endif
                            </div>
                       </div>
                       <div class="col-md-7">
                           <h6 class="pt-3">Cách làm</h6>
                           <div class="congThucDiv">
                            <textarea  id="" cols="30" rows="10" name="recipe" placeholder="Nhập công thực tại đây..."></textarea>
                            @if( $errors->has('recipe') )
                              <p class="text-warning">{{ $errors->first('recipe')}}</p>
                          @endif
                           </div>
                       </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger">Save món ăn</button>
                    <button class="btn btn-dark">Hủy tạo món</button>
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
 
$(document).ready(function () {
    // validate du lieu so luong nhap vao
    $('.soLuongNguyenLieu').click(function(){
        $('.nhapSoLuong').css({'opacity' : '1', 'width' : '100px'});
        $('.nhapSoLuong').keyup(function(){
            const regGr = /[0-999][g][r]{3,5}$/;
            const regKg = /[0-999][k][g]/;
            if(regGr.test($(this).val()) == true){
                console.log('ok');
            }
            else{
                console.log('sai')
            }
            // $('.soLuongNguyenLieu').text($(this).val());
            // $(this).val();
            // console.log(regGr.test($(this).val()));
            
        })
        $('.nhapSoLuong').focusout(function(){
            console.log( $('.soLuongNguyenLieu').text());
            // if($('.soLuongNguyenLieu').text() ==null){
            //     console.log('trong');
            // }
            // $(this).css({'opacity' : '0', 'width' : '0px'});
        })
    });




    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            
            });
        }  
    });

    



    // tao autocomplete cho form nhap vao nguyen lieu
    // function log( message ) {
    //     $( "<div>" ).text( message ).prependTo( "#log" );
    //     $( "#log" ).scrollTop( 0 );
    // }

    // $( "#nhapNguyenLieuInput" ).autocomplete({
    //   source: function( request, response ) {
    //     $.ajax( {
    //       url: "/autocomplete",
    //       dataType: "jsonp",
    //       data: {
        
    //         data: request.data
    //       },
    //       success: function( data ) {
    //         response( data );
    //       }
    //     } );
    //   },
    //   minLength: 2,
    //   select: function( event, ui ) {
    //     log( ui.item.value);
    //   }
    // } );


// some js code



});

</script>
@endsection
