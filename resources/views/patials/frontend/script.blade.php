<script src="vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="vendors/nice-select/jquery.nice-select.min.js"></script>
<script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
<script src="vendors/jquery.ajaxchimp.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
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
});
</script>