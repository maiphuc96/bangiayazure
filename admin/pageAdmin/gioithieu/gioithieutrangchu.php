<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/gioithieu/gioithieu.php";
?>
<div class="row">
	<div class="col-lg-12" >
	<form  action="" method="post">
		<div class="shopper-info" id="themsp_lable" >

			
				<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">Shoes shop : Giới thiệu trang chủ</label>
				<?php
				$noidung=layNoiDungGioiThieuTrangChu();
				while ($row_noidung = mysql_fetch_array($noidung)) {
				?>
				<textarea name="gioithieutrangchu" id="gioithieutrangchu"><?php echo $row_noidung['trang_chu']?></textarea>
				<?php
				}
				?>
				<script>CKEDITOR.replace('gioithieutrangchu');</script>
		
			
		</div>
		
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<button type="submit" name="btn_huy" class="btn btn-info" style="border-radius: 0px;width: 100%;margin-top: 5px;margin-bottom: 5px">HỦY</button>
		</div>
			
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<button type="submit" name="btn_hoantat" class="btn btn-warning pull-right"  style="border-radius: 0px;width: 100%;margin-top: 5px">HOÀN TẤT</button>
		</div>
			
		</form>
	
	
	</div>
</div>

<?php

if (isset($_POST['btn_huy']))
{
	 echo "<script> location.replace('index.php'); </script>";
}
if (isset($_POST['btn_hoantat']))
{
	if ($_POST['gioithieutrangchu']==""){
		echo "<script> alert('Dữ liệu trống, vui lòng kiểm tra lại.');</script>";
	}
	else{
		$noidung=$_POST['gioithieutrangchu'];
		if (cnGioiThieuTrangChu($noidung))
		{
			echo "<script> alert('Cập nhật thành công');</script>";
       		echo "<script> location.replace('index.php'); </script>";

		}
		else
		{
			echo "<script> alert('Cập nhật thất bại');</script>";
       		echo "<script> location.replace('index.php'); </script>";
		}

	}
}
?>
