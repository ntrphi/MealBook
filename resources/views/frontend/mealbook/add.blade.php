@extends('layout.frontend_layout')
@section('content')
<section class="hero-banner mt-5">
        <div class="hero-wrapper container">
        <form method="post" action="mealbook-add-save" enctype="multipart/form-data">
        @csrf
        <div class="hero-right col-md-12 col-12 addMonAnDiv">
                <!-- for mam 4 mon -->
             

                <div class="mamComHome mamComHome-4"  style="display:none">
                    <div class="mamComHome-4-content">

                        <div class="row monAnWrap monAnStt1" >
                            <div class="monAnDiv-5 mx-auto my-auto" name="cookingrecipes[]">
                            </div>
                        </div>

                        <div class=" row monAnWrap monAnStt2">
                            <div class="monAnDiv-5 mx-auto my-auto"  name="cookingrecipes[]">
                            </div>
                        </div>

                        <div class="row monAnWrap monAnStt3" >
                            <div class="monAnDiv-5 mx-auto my-auto" name="cookingrecipes[]">
                            </div>
                        </div>

                        <div class="row monAnWrap monAnStt4" >
                            <div class="monAnDiv-5 mx-auto my-auto" name="cookingrecipes[]">
                            </div>
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
                <div class="mamComHome mamComHome-6 " >
                    <div class="mamComHome-6-content " >
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
            <button type="submit" class="btn-danger">Lưu Món Ăn</button>
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
                            <img src="{{$item->avatar}}" alt="" value="{{$item->id}}" >
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




            <!-- ============= -->

            <!-- <ul class="social-icons d-none d-lg-block">
        <li><a href="#"><i class="ti-facebook"></i></a></li>
        <li><a href="#"><i class="ti-twitter"></i></a></li>
        <li><a href="#"><i class="ti-instagram"></i></a></li>
      </ul> -->
        </div>
    </section>








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
