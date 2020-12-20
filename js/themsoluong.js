$(document).ready(function(){
  $("#soluong").change(function() {
    
         soluongm = $(this).val();
         maspp = $(this).attr('data-masp');
        $.post('page/cart.php',{
          soluongmoi:soluongm,
          masp:maspp
        }, function(data) {
         location.reload();
         });
       });
});