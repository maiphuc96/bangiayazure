<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/thongke/thongke.php";
 include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
?>

<div class="row"><label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">Thống kê</label></div>

<link rel="stylesheet" href="css/danhsachloaisanpham.css">
  



    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      <div class="thumbnail" id="member">
        <div class="caption">

          <div style="text-align: center;color: white;background-color: #FE980F;height: 30px">
            <h3>Người dùng</h3>
          </div>
          <div style="color: #696763;">
            <p style="text-align: center;font-size: 16px;">Số người dùng</p> 
          </div>
          <div style="color: #696763;">

            <p style="text-align: center;font-size: 32px;"><?php
            $sl=soNguoiDung();
            $number=mysql_fetch_assoc($sl);
            echo $number['sl_nd'];
            ?></p> 
          </div>
         
         
          <button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=quanliuser" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
          </button>

        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      <div class="thumbnail" id="member">
        <div class="caption">

          <div  style="height: 30px;text-align: center;color: white;background-color: #FE980F;">
            <h3>Bình luận</h3>
          </div>
          <div style="color: #696763;">
            <p style="text-align: center;font-size: 16px;">Số bình luận</p> 
          </div>
          <div  style="color: #696763;">
            <p style="text-align: center;font-size: 32px;"><?php
            $sl=soBinhLuan();
            $number=mysql_fetch_assoc($sl);
            echo $number['sl_bl'];
            ?></p> 
          </div>
         
         
          <button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=thongkebinhluan" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
          </button>

        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      <div class="thumbnail" id="member">
        <div class="caption">

          <div style="height: 30px;text-align: center;color: white;background-color: #FE980F;">
            <h3 >Liên hệ</h3>
          </div>
          <div  style="color: #696763;">
            <p style="text-align: center;font-size: 16px;">Số phản hồi</p> 
          </div>
          <div  style="color: #696763;">
            <p style="text-align: center;font-size: 32px;"><?php
            $slph=demPhanHoi();
            $numberph=mysql_fetch_assoc($slph);
            echo $numberph['sl'];
            ?></p> 
          </div>
         
         
          <button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=khachhanglienhe" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
          </button>

        </div>
      </div>
    </div>


    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	      <div class="thumbnail" id="member">
	        <div class="caption">

	          <div  style="height: 30px;text-align: center;color: white;background-color: #FE980F;">
	            <h3>Đơn hàng</h3>
	          </div>
	          <div style="color: #696763;">
	            <p style="text-align: center;font-size: 16px;">Đang chờ</p> 
	          </div>
	          <div  style="color: #696763;">
	            <p style="text-align: center;font-size: 32px;"><?php
            $sl=soDonHangDC();
            $number=mysql_fetch_assoc($sl);
            echo $number['dh_dc'];
            ?></p> 
	          </div>
	         
	         
	          <button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=donhangdangcho" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
	          </button>

	        </div>
	      </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	      <div class="thumbnail" id="member">
	        <div class="caption">

	          <div  style="height: 30px;text-align: center;color: white;background-color: #FE980F;">
	            <h3>Đơn hàng</h3>
	          </div>
	          <div  style="color: #696763;">
	            <p style="text-align: center;font-size: 16px;">Đã xử lí</p> 
	          </div>
	          <div  style="color: #696763;">
	            <p style="text-align: center;font-size: 32px;"><?php
            $sl=soDonHangDXL();
            $number=mysql_fetch_assoc($sl);
            echo $number['dh_dxl'];
            ?></p> 
	          </div>
	         
	         
	          <button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=donhangdaxuli" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
	          </button>

	        </div>
	      </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	      <div class="thumbnail" id="member">
	        <div class="caption">

	          <div  style="height: 30px;text-align: center;color: white;background-color: #FE980F;">
	            <h3>Đơn hàng</h3>
	          </div>
	          <div  style="color: #696763;">
	            <p style="text-align: center;font-size: 16px;">Đã giao dịch</p> 
	          </div>
	          <div  style="color: #696763;">
	            <p style="text-align: center;font-size: 32px;"><?php
            $sl=soDonHangDGD();
            $number=mysql_fetch_assoc($sl);
            echo $number['dh_dgd'];
            ?></p> 
	          </div>
	         
	         
	          <button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=donhandagiaodich" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
	          </button>

	        </div>
	      </div>
    </div>

	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	      <div class="thumbnail" id="member">
	        <div class="caption">

	          <div  style="height: 30px;text-align: center;color: white;background-color: #FE980F;">
	            <h3>Admin</h3>
	          </div>
	          <div  style="color: #696763;">
	            <p style="text-align: center;font-size: 16px;">Quản trị viên</p> 
	          </div>
	          <div  style="color: #696763;">
	            <p style="text-align: center;font-size: 32px;"><?php
            $sl=soQuanTriVien();
            $number=mysql_fetch_assoc($sl);
            echo $number['sl'];
            ?></p> 
	          </div>
	         
	         <?php 
	         	$taikhoan=$_SESSION['username'];
	         	$test=checkQuyen($taikhoan);
	         	$ok=mysql_fetch_assoc($test);
	         	if ($ok['num']>0){
	         		echo '<button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=quanliadmin" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
	          </button>';
	         	}
	         	else {
	         	echo'<button disabled style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
	         	 </button>';
	         	}
	         ?>
	         

	        </div>
	      </div>
    </div>

	<?php
	$ds=LoaiSP();
	while ($row_ds =mysql_fetch_array($ds)) {
	?>

	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
	  <div class="thumbnail" id="member">
	    <div class="caption">

	      <div  style="height: 30px;text-align: center;color: white;background-color: #FE980F;">
	        <h3>Sản phẩm</h3>
	      </div>
	      <div  style="color: #696763;">
	        <p style="text-align: center;font-size: 16px;"><?php echo $row_ds['ten_loai_san_pham']?></p> 
	      </div>
	      <div  style="color: #696763;">
	        <p style="text-align: center;font-size: 32px;"><?php
            $sl=demSPLoaiSP($row_ds['id_loai_san_pham']);
            $number=mysql_fetch_assoc($sl);
            echo $number['sl'];
            ?></p> 
	      </div>
	     
	     
	      <button style="width: 100%; margin-right: 0px;font-size: 18px;margin-top: -10px;" type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=danhmucsanpham&idloai=<?php echo $row_ds['id_loai_san_pham']?>" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
	      </button>

	    </div>
	  </div>
    </div>
	<?php
	}
	?>
	
