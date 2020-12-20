<?php
session_start();
 include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
//Su dung duong dan tuong doi tranh tinh trang sai path
 include $_SERVER["DOCUMENT_ROOT"] . "/function/trangchu.php";
if (isset($_GET["p"]))
	$p=$_GET["p"];
else
	$p="";
?>



<!DOCTYPE html>
<html lang="en">
<head>
	 <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
	<link href="css/btr-menu.css" rel="stylesheet" />
	<link href="css/starter-template.css" rel="stylesheet" />
	<title>Home | Shoes-Shop</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/swiper.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/thongtinnguoidung.css">
	


	
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
   
    <![endif]-->  
    <script src="js/jquery-3.2.1.min.js"></script> 
   <!--  <script src="js/bootstrap.min.js"></script>  -->
   <!--  <script src="js/html5shiv.js"></script> -->
 	<script src="js/swiper.min.js"></script> 
	<!-- <script src="js/ajax.js"></script>  -->
 
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
    :root .carbonad,
    :root #carbonads-container,
    :root #content > #right > .dose > .dosesingle,
    :root #content > #center > .dose > .dosesingle
    { display: none !important; }
    </style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php require "blocks/header.php"; ?>

	</header><!--/header-->
	

	
	
	<section>
		<div class="container">

			<?php
			
					
			switch($p){
				//profile
				case "dangki" : require "page/profile/dangki.php";break;
				case "dangnhap" : require "page/profile/dangnhap.php";break;
				case "dangxuat" : require "page/profile/dangxuat.php";break;
				case "xulidangki" : require "page/profile/xulidangki.php";break;
				
				//cart
				case "unloggin-chitietdonhang" : require "page/cart/chitietdonhang_khongdangnhap.php";break;
				case "giohang" : require "page/cart/addcart.php";break;
				case "giohangds" : require "page/cart/cart.php";break;
				case "delcart" : require "page/cart/delcart.php";break;
				case "muangay" : require "page/cart/muangay.php";break;
				case "thanhtoan-giohang" : require "page/cart/thanhtoan_giohang.php";break;
				case "delcartthanhtoan" : require "page/cart/delcartthanhtoan.php";break;
				case "tracuudonhang" : require "page/cart/tracuudonhang.php";break;
				case "huybodonhang" : require "page/cart/huybodonhang.php";break;
				
				//chi tiet san pham
				
				case "chitietsanpham" : require "page/chitietsanpham/chitietsanpham.php";break;	
				//trang chu
				case "gioithieu" : require "page/trangchu/gioithieu.php";break;
				case "lienhe" : require "page/trangchu/lienhe.php";break;
				case "timkiemgia" : require "page/timkiem/timkiem_theogia.php";break;
				case "timkiemten" : require "page/timkiem/timkiem_theoten.php";break;
				case "sanpphamtheoloai" : require "page/trangchu/sanphamtheoLoai.php";break;
				case "size" : require "page/timkiem/size.php";break;
				//neu nguoi dung dang nhap thi se chuyen qua gio hang cua nguoi dung
				
				default : require "page/trangchu/trangchu.php";
			}
			?>
			
		</div>
		
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require "blocks/footer.php"; ?>
	</footer><!--/Footer-->
	
	<script>
		var x = screen.width;
	
		if (x<=768){
			var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			slidesPerView: 2,
			paginationClickable: true,
			spaceBetween: 30,
			freeMode: true
			});
		}
		if (x>768 && x <= 991){
			var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			slidesPerView: 3,
			paginationClickable: true,
			spaceBetween: 30,
			freeMode: true
			});
		}
		if (x>991 && x <= 1190){
			var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			slidesPerView: 4,
			paginationClickable: true,
			spaceBetween: 30,
			freeMode: true
			});
		}
		if (x > 1190){
			var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			slidesPerView: 5,
			paginationClickable: true,
			spaceBetween: 30,
			freeMode: true
			});
		}
		
	</script> 
	
	<!-- <script src="js/jquery.js"></script> -->
	<!-- <script src="js/bootstrap.min.js"></script> -->
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<!-- <script src="js/main.js"></script> -->

	<script>
      function initMap() {
        var uluru = {lat: 10.8830302710045, lng: 106.78271455893014};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOArsadPOME1l9Tsr2gKer7LlD6QO23gc&callback=initMap">
    </script>

	<script src="js/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="js/btr-menu.js"></script>
	<script>
	    $(document).ready(function () {
	        $("#navbar").btrmenu();
	    });
	</script>
</body>
</html>
