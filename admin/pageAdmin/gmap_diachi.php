<script src='js/src_ggmap.js'></script>
<div id='gmap' style='height:400px;width:100%;'></div>
<div style='overflow:hidden;height:50px;width:800px;'>
  <style>#gmap img{max-width:none!important;background:none!important}</style>
</div>
<script type='text/javascript'>
  /*10.8830302710045,106.78271455893014 This is your location*/
  function init_map(){
    var myOptions = {zoom:17,center:new google.maps.LatLng(10.8830302710045,106.78271455893014),mapTypeId: google.maps.MapTypeId.ROADMAP};
    map = new google.maps.Map(document.getElementById('gmap'), myOptions);
    marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(10.8830302710045,106.78271455893014)});
    infowindow = new google.maps.InfoWindow({content:'<strong>Công ty SHOES SHOP</strong><br>khu B ký túc xá đại học quốc gia, Đông Hòa, Tx. Dĩ An, Bình Dương, Vietnam<br>'});
    google.maps.event.addListener(marker, 'click', function(){
      infowindow.open(map,marker);
    });infowindow.open(map,marker);
  }google.maps.event.addDomListener(window, 'load', init_map);
</script>


