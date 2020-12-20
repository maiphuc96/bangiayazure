<?php

session_start();
require"../function/dbCon.php";
if (isset($_GET["p"]))
  $p=$_GET["p"];
else
  $p="";
 


  //check quyen han user
  function checkQuyenHan($taikhoan){
    $qr="SELECT level FROM nguoidung WHERE tai_khoan='$taikhoan'";
    return mysql_query($qr);
  }
  $taikhoan=$_SESSION['username'];
  $check=checkQuyenHan($taikhoan);
  while ($row_checkQH=mysql_fetch_array($check)) {
    $QH=$row_checkQH['level'];
  }
  if (!isset($_SESSION['username'])||$QH<1){   
    echo "<script> location.replace('../index.php'); </script>";
    exit;
  }
 
 
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <style>
   #map {
    height: 428px;
    width: 100%;
  }
</style>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Home | Shoes-Shop</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<link href="css/prettyPhoto.css" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<link rel="stylesheet" href="css/AdminLTE.min.css">
<link rel="stylesheet" href="css/skins/_all-skins.min.css">
<link rel="stylesheet" href="fonts/ggfont.css">

<link rel="stylesheet" href="css/inputImage.css">
<link rel="stylesheet" href="css/danhsachloaisanpham.css">



<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">



<script src="js/jquery-3.2.1.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/inputImage.js"></script> 
<script src="/ckeditor/ckeditor.js"></script>

    
  </head><!--/head-->

  <body>


    <footer id="footer"><!--Footer-->
      <?php require "blocks/headers.php"; ?>
    </footer><!--/Footer-->

    <section>
      <div class="container">

        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <?php 
            require "blocks/leftAdmin.php"
            ?>


          </div>

          <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">       
              <?php 

              switch($p){ 

                case "danhsachloaisanpham"    : require "pageAdmin/loaisanpham/danhsachloaisanpham.php";break;
                case "chitietloaisanpham"    : require "pageAdmin/loaisanpham/chitietloaisanpham.php";break;


                case "danhmucsanpham"    : require "pageAdmin/danhmucsanpham/danhmucsanpham.php";break;
                case "themsanpham"    : require "pageAdmin/danhmucsanpham/themsanpham.php";break;
                case "suasanpham"    : require "pageAdmin/danhmucsanpham/suasanpham.php";break;
                case "doianh"    : require "pageAdmin/danhmucsanpham/doianhsanpham.php";break;

                case "donhangdangcho"    : require "pageAdmin/quanlidonhang/dangcho/donhang_dangcho.php";break;
                case "donhangdangchochitiet"    : require "pageAdmin/quanlidonhang/dangcho/donhang_dangcho_chitiet.php";break;
                
                
                case "xoadonhang"    : require "pageAdmin/quanlidonhang/dangcho/xoadonhangdangcho.php";break;
                case "xoadonhangdxl"    : require "pageAdmin/quanlidonhang/daxuli/xoadonhangdaxuli.php";break;
                
                case "huybodonhangKH"    : require "pageAdmin/quanlidonhang/dangcho/huybodonhangKH.php";break;
                case "xacnhandonhangKH"    : require "pageAdmin/quanlidonhang/dangcho/xacnhandonhangKH.php";break;

                

                case "donhangdaxuli"    : require "pageAdmin/quanlidonhang/daxuli/donhang_daxuli.php";break;
                case "donhangdaxulichitiet"    : require "pageAdmin/quanlidonhang/daxuli/donhang_daxuli_chitiet.php";break;
                case "huybodonhangKHDXL"    : require "pageAdmin/quanlidonhang/daxuli/huybodonhangKHDXL.php";break;

                case "xacnhandonhangKHDXL"    : require "pageAdmin/quanlidonhang/daxuli/xacnhandonhangKHDXL.php";break;


                case "donhandagiaodich"    : require "pageAdmin/quanlidonhang/dagiaodich/donhang_dagiaodich.php";break;
                case "donhandagiaodichchitiet"    : require "pageAdmin/quanlidonhang/dagiaodich/donhang_dagiaodich_chitiet.php";break;


              
                case "binhluan"    : require "pageAdmin/quanlibinhluan/binhluan.php";break;

                case "quanliuser"    : require "pageAdmin/quanlinguoidung/quanliuser.php";break;

                case "baocao"    : require "pageAdmin/baocao/baocao.php";break;
                case "xuatbaocao"    : require "pageAdmin/baocao/excel.php";break;

                case "thongke"    : require "pageAdmin/thongke/thongke.php";break;
                case "thongkebinhluan"    : require "pageAdmin/thongke/thongke_binhluan.php";break;

                case "quanliadmin"    : require "pageAdmin/quanliadmin/quanliadmin.php";break;

                case "giamgia"    : require "pageAdmin/sukien/sukiengiamgia.php";break;
                case "giamgiasua"    : require "pageAdmin/sukien/suakhuyenmai.php";break;

                case "gioithieulogo"    : require "pageAdmin/gioithieu/gioithieulogo.php";break;
                case "gioithieutrangchu"    : require "pageAdmin/gioithieu/gioithieutrangchu.php";break;
                case "gioithieutrangcon"    : require "pageAdmin/gioithieu/gioithieutrangcon.php";break;

                case "thongtinlienhe"    : require "pageAdmin/lienhe/thongtinlienhe.php";break;
                case "khachhanglienhe"    : require "pageAdmin/lienhe/lienhecuakhachhang.php";break;
                case "phanhoi"    : require "pageAdmin/lienhe/phanhoilienhe.php";break;
                
                default : require "pageAdmin/trangchu.php";
              }

              ?>          
          
          </div>  
        </div>

      </div>

    </section>

    <footer id="footer"><!--Footer-->
      <?php require "blocks/footer.php"; ?>
    </footer><!--/Footer-->
    <script src="js/main.js"></script>
    <script src="js/adminlte.min.js"></script>

  </body>
  </html>
