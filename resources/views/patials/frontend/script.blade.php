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
    $(".monAnWrap").hover(
    function () {
        $(this).find('.popUp-monAn').slideDown('medium');
    }, 
    function () {
        $(this).find('.popUp-monAn').slideUp('medium');
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

  
    $("#soLuongMon").change(function () {
                var soLuongMon = $("#soLuongMon").val();
                console.log(soLuongMon);
                if (soLuongMon == 4) {
                    $(".mamComHome-5, .mamComHome-6").css('display', 'none');
                    $(".mamComHome-4").slideDown('medium');

                }
                if(soLuongMon == 5){
                    $(".mamComHome-4,.mamComHome-6").css('display', 'none');
                    $(".mamComHome-5").slideDown('medium');
                }
                if(soLuongMon == 6){
                    $(".mamComHome-4,.mamComHome-5").css('display', 'none');
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