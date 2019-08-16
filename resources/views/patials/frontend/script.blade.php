<script src="vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="https://use.fontawesome.com/b4b924cc49.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="vendors/nice-select/jquery.nice-select.min.js"></script>
<script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
<script src="vendors/jquery.ajaxchimp.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="/ckeditor/ckeditor.js"></script>  

<script>

$(document).ready(function(){
    $(".monAnWrap").click(function () {
        $('.popUpActive').slideUp('medium');
        $('.popUpActive').removeClass('popUpActive');
        isShown = false;
        $(this).find('.popUp-monAn').addClass('popUpActive');
        $(this).find('.popUpActive').slideDown('medium');
        isShown = true;
        // if( isShown == false )
        // {
        //     $(this).find('.popUp-monAn').addClass('popUpActive');
        //     $(this).find('.popUp-monAn').addClass('isShown');
        //     $(this).find('.isShown').slideDown('medium');
        //     isShown = true;
            
        // }
        // else{
        //     $(this).find('.isShown').slideUp('medium');
        //     // $(this).removeClass('active-X');
        //     isShown = false;
        // }
        
    }
    ); 
 
    $( ".monAnBox>img" ).draggable({
        
        scroll: true,
        helper: "clone",
        disable: false,
        start: function( event, ui ) {
                $(ui.item).addClass("active-draggable");
        },
        drag: function( event, ui ) {
        },
        stop:function( event, ui ) {
                $(ui.item).removeClass("active-draggable");
        }
    });


    $( ".monAnDiv-5" ).droppable({
        accept: ".monAnBox>img",
        class: {
            "ui-droppable-active":"ac",
            "ui-droppable-hover":"hv"
        },
        over: function ( event, ui){

        },
        drop: function( event, ui ) {
            $(this).empty();
            $(this).append($(ui.helper).clone());
            $(this).find('img').removeAttr("style");
            
        }
    
    });

     $('button[data-toggle="modal"]').click(function(){
            // lấy ra 1 mảng các ảnh món ăn
            var arr = $('.monAnWrap img');
            $content="";
            // mỗi món ăn trong mảng đc add vào form. có thể ttheem class để css.
            for (var index = 0; index < arr.length; index++) {
                $content+= `<div class="form-group">`
                                +`<div class="row container">
                                    <div class="confirm-img-box col-md-5">
                                        <img src="` + arr[index].currentSrc + `">
                                    </div>
                                    <span class="col-md-7 font-weight-bold text-dark">`+arr[index].dataset.name+`</span>
                                 </div>`
                                + `<input type="hidden" value="`+arr[index].dataset.id+`" name="cookingrecipes[]" checked>
                            </div>`;
                
            }
            $('.check-list').empty();
            $('.check-list').append($content);
        });


    $("#soLuongMon").change(function () {
                var soLuongMon = $(this).val();
                $('.check-list').empty();
                if (soLuongMon == 4) {
                    $(".mamComHome-5, .mamComHome-6").css('display', 'none');
                    $(".mamComHome-5 .monAnWrap img, .mamComHome-6 .monAnWrap img").remove();
                    $(".mamComHome-4").slideDown('medium');
                    
                }
                if(soLuongMon == 5){
                    $(".mamComHome-4,.mamComHome-6").css('display', 'none');
                    $(".mamComHome-4 .monAnWrap img, .mamComHome-6 .monAnWrap img").remove();
                    $(".mamComHome-5").slideDown('medium');
                    
                }
                if(soLuongMon == 6){
                    $(".mamComHome-4,.mamComHome-5").css('display', 'none');
                    $(".mamComHome-4 .monAnWrap img, .mamComHome-5 .monAnWrap img").remove();
                    $(".mamComHome-6").slideDown('medium');
                    
                }
                
    });
    // $(".saveMonAn").click(function() {
    //     var element = document.querySelector('.mamComHome');
    //     html2canvas(element,{
    //         imageTimeout: 0,
    //         removeContainer: false

    //     }).then(
    //         function(canvas) {
    //         // $('.canvasContainer').append(canvas);
            
    //         var base64image = canvas.toDataURL("image/png");
    //         $('.displayBase64').attr('src',base64image);
            
    //         }
    //     );
    //     console.log('123');
        
        
    // });

});
</script>