<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/lienhe/lienhe.php";
?>
<div class="row">
	<div class="col-lg-12" >
	<form  action="" method="post">
		<div class="shopper-info" id="themsp_lable">

			
				<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">Shoes shop : Thông tin liên hệ</label>
				<?php
				$noidung=layNoiDungLienHe();
				while ($row_noidung = mysql_fetch_array($noidung)) {
				?>
				<textarea name="lienhe" id="lienhe"><?php echo $row_noidung['noi_dung_thong_tin_lien_he']?></textarea>
				<?php
				}
				?>
				<script>CKEDITOR.replace('lienhe');</script>
			
			
		</div>
		
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<button type="submit" name="btn_huy" class="btn btn-info" style="width: 100%; border-radius: 0px;margin-top: 5px;margin-bottom: 5px">HỦY</button>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<button type="submit" name="btn_hoantat" class="btn btn-warning pull-right"  style="width: 100%; border-radius: 0px;margin-top: 5px">HOÀN TẤT</button>
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
	if ($_POST['lienhe']==""){
		echo "<script> alert('Dữ liệu trống, vui lòng kiểm tra lại.');</script>";
	}
	else{
		$noidung=$_POST['lienhe'];
		

		if (cnNoiDungLienHe($noidung))
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



