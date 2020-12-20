<?php
session_start();
require"../function/dbCon.php";

//Su dung duong dan tuong doi tranh tinh trang sai path
include $_SERVER["DOCUMENT_ROOT"] . "/nguoidung/function/nguoidung.php";
if (isset($_GET["p"]))
	$p=$_GET["p"];
else
	$p="";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
	<link href="css/btr-menu.css" rel="stylesheet" />
	<link href="css/starter-template.css" rel="stylesheet" />
	<title>Home | Shoes-Shop</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="css/swiper.min.css"> -->
	<!-- <link rel="stylesheet" href="css/swiper.css"> -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/thongtinnguoidung.css">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
  
   <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/html5shiv.js"></script>

	

	


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
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<?php 
					require "blocks/leftnguoidung.php"
					?>

				</div>

				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="padding-right: 5px;margin-bottom: 20px;margin-top: 10px;">
								
						<?php 

						switch($p){	

							case "hosocanhan"    : require "pagend/hosocanhan.php";break;
							case "hosocanhansua"    : require "pagend/hosocanhansua.php";break;
							case "quanlibinhluan"    : require "pagend/quanlibinhluan.php";break;
							case "quanlibinhluansua"    : require "pagend/quanlibinhluan_sua.php";break;
							case "danhsachdonhang"    : require "pagend/danhsachdonhang.php";break;
							case "chitietdonhang"    : require "pagend/chitietdonhang.php";break;
							case "huybodonhang"    : require "pagend/huybodonhang.php";break;
							case "timkiem"    : require "pagend/timkiem.php";break;
							default : require "pagend/hosocanhan.php";
						}
						
						?>					
					
				</div>	
			</div>

		</div>
		
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require "blocks/footer.php"; ?>
	</footer><!--/Footer-->
	
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
