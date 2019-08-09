@extends('layout.frontend_layout')
@section('content')
<section class="hero-banner mt-5">
    <div class="hero-wrapper container">
        <form method="post" action="mealbook-add-save" enctype="multipart/form-data">
            <div class="hero-right col-md-12 col-12 addMonAnDiv">
                <!-- for mam 4 mon -->


                <div class="mamComHome mamComHome-4" style="display:none">
                    <div class="mamComHome-4-content">

                        <div class="row monAnWrap monAnStt1">
                            <div class="monAnDiv-5 mx-auto my-auto" name="cookingrecipes[]">
                            </div>
                            <input type="checkbox" class="checkMeal4" style="display:none">
                        </div>

                        <div class=" row monAnWrap monAnStt2">
                            <div class="monAnDiv-5 mx-auto my-auto" name="cookingrecipes[]">
                            </div>
                            <input type="checkbox" class="checkMeal4" style="display:none">
                        </div>

                        <div class="row monAnWrap monAnStt3">
                            <div class="monAnDiv-5 mx-auto my-auto" name="cookingrecipes[]">
                            </div>
                            <input type="checkbox" class="checkMeal4" style="display:none">
                        </div>

                        <div class="row monAnWrap monAnStt4">
                            <div class="monAnDiv-5 mx-auto my-auto" name="cookingrecipes[]">
                            </div>
                            <input type="checkbox" class="checkMeal4" style="display:none">
                        </div>
                        <div class="nuocCham">
                            <img src="/image/nuoc cham.jpg" alt="">
                        </div>
                    </div>
                </div>

                <!-- for mam 5 mon -->
                <div class="mamComHome mamComHome-5" style="display: none">
                    <div class="mamComHome-5-content">
                        <div class="row monAnWrap monAnStt1">
                            <div class="monAnDiv-5 mx-auto my-auto">
                            </div>
                        </div>

                        <div class="row monAnWrap monAnStt2">
                            <div class="monAnDiv-5 mx-auto my-auto">
                            </div>
                        </div>

                        <div class="row monAnWrap monAnStt3">
                            <div class="monAnDiv-5 mx-auto my-auto">
                            </div>
                        </div>

                        <div class="row monAnWrap monAnStt4">
                            <div class="monAnDiv-5 mx-auto my-auto">
                            </div>
                        </div>

                        <div class="row monAnWrap monAnStt5">
                            <div class="monAnDiv-5 mx-auto my-auto">
                            </div>
                        </div>

                        <div class="nuocCham">
                            <img src="/images/nuoc cham.jpg" alt="">
                        </div>



                    </div>
                </div>

                <!-- for mam 6 mon -->
                <div class="mamComHome mamComHome-6 ">
                    <div class="mamComHome-6-content ">
                        <div class="row monAnWrap monAnStt1">
                            <div class="monAnDiv-5 mx-auto my-auto">

                            </div>
                        </div>
                        <div class="row monAnWrap monAnStt2">
                            <div class="monAnDiv-5 mx-auto my-auto">

                            </div>

                        </div>
                        <div class="row monAnWrap monAnStt3">
                            <div class="monAnDiv-5 mx-auto my-auto">

                            </div>

                        </div>
                        <div class="row monAnWrap monAnStt4">
                            <div class="monAnDiv-5 mx-auto my-auto">

                            </div>

                        </div>
                        <div class="row monAnWrap monAnStt5">
                            <div class="monAnDiv-5 mx-auto my-auto">

                            </div>

                        </div>
                        <div class="row monAnWrap monAnStt6">
                            <div class="monAnDiv-5 mx-auto my-auto">

                            </div>

                        </div>

                        <!-- nuoc cham   -->
                        <div class="nuocCham">
                            <img src="/images/nuoc cham.jpg" alt="">
                        </div>
                    </div>
                </div>
                {{-- bấm vào nút này sẽ nhận các ảnh món ăn đã kéo vào và hiện lên trong hộp thoại add --}}
                <button type="button" class="btn btn-success btn-meal" data-toggle="modal" data-target="#show-add" >
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> ADD NEW
                </button>
            </div>

        </form>
        <div class="hero-left col-md-6 col-12 khoMonAn">

            <div class="row">
                <div class="col-md-5">
                    <select id="soLuongMon" class="col-md-10 ml-4 mt-2 custom-select">
                        <option value="6">6 Món</option>
                        <option value="5">5 Món</option>
                        <option value="4">4 Món</option>
                    </select>
                </div>
                <h2 class="col-md-7 text-right mb-4 pr-4">Kho món ăn</h2>
            </div>
            <div class="container-fluid khoMonAnContent">
                @foreach ($cooking as $item)
                <div class="row monAnBoxWrap">
                    <div class="monAnBox">
                        <img src="{{$item->avatar}}" alt="" data-id="{{$item->id}}" data-name="{{$item->name}}">
                    </div>
                    <div class="popUp-monAn">
                        <h3 class="text-center mt-3">Cua rim</h3>
                        <div class="container-fluid">
                            <h5 class="congThucTitle">Cong thuc :</h5>
                            <p>
                                asdaadadsad
                            </p>
                            <a class="xemThemBtn" href="">
                                Xem chi tiet
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Modal Add-->
    <div class="modal fade" id="show-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thêm món ăn</h4>
                </div>
                <div class="modal-body">
                    <form id="form-add" action="mealbook-add-save" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="role_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tên Món Ăn</label>
                            <input type="text" class="form-control" id="authorname" name="name">
                        </div>
                        <div class="check-list">

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
    </div>
</section>
<script>
    $(document).ready(function(){
        $('button[data-toggle="modal"]').click(function(){
            // lấy ra 1 mảng các ảnh món ăn
            var arr = $('.monAnWrap img');
            $content="";
            // mỗi món ăn trong mảng đc add vào form. có thể ttheem class để css.
            for (var index = 0; index < arr.length; index++) {
                $content+= `<div class="form-group">`
                                + `<img src="` + arr[index].currentSrc + `" width="50px"; height="50px">`
                                + `<span>`+arr[index].dataset.name+`</span>`
                                + `<input type="hidden" value="`+arr[index].dataset.id+`" name="cookingrecipes[]" checked>
                            </div>`;
                
            }
            
            $('.check-list').append($content);
        });
    
    })
</script>







<!-- <form method="post" action="mealbook-add-save" enctype="multipart/form-data">
{{ csrf_field() }}   
    <input type="text" placeholder="name" name="name">
    
    {{-- các id của món ăn đc nhận từ khi kéo thả vào mâm cơm --}}
    <label for="">món1</label><input type="checkbox" name="cookingrecipes[]" value="1" checked> 
    <label for="">món2</label><input type="checkbox" name="cookingrecipes[]" value="2" checked>            
    <label for="">món3</label><input type="checkbox" name="cookingrecipes[]" value="3" checked>  

    <button type="submit">Save</button>
</form> -->
@endsection