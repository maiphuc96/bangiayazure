<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/lienhe/lienhe.php";
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color: #fe980f;color: #ffffff;text-align: center;text-transform: uppercase;font-size: 32px;">
		Liên hệ của khách hàng
	</div>



	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin-top: 10px;">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr id="tieude_ds_sp">

						<th id="tieude">ID</th>
						<th id="tieude">Tên khách hàng</th>
						<th id="tieude">email</th>
						<th id="tieude">Chủ đề</th>
						<th id="tieude">Nội dung</th>
						<th id="tieude">Hồi đáp</th>
						<th id="tieude">Ngày</th>
						<th id="tieude">Action</th>
						
						
					</tr>
				</thead>
				<tbody>
					<?php
					$lienheKH=thongtinLienHeKH();
					while ($row_lienheKH=mysql_fetch_array($lienheKH)) {
					?>
					<tr>
						<td id="tieude"><?php echo $row_lienheKH['id_lien_he'];?></td>
						<td id="tieude"><?php echo $row_lienheKH['ho_ten'];?></td>
						<td id="tieude"><?php echo $row_lienheKH['email'];?></td>
						<td style="
						width: 150px;
						" id="tieude"><?php echo $row_lienheKH['chu_de'];?></td>
						<td style="
						width: 270px;
						" id="tieude"><?php echo $row_lienheKH['noi_dung_lien_he'];?></td>
						<td style="
						width: 270px;
						" id="tieude"><?php echo $row_lienheKH['phan_hoi_cho_khach_hang'];?></td>
						<td id="tieude"><?php echo $row_lienheKH['ngay_tao'];?></td>
						<td style="font-size: 14px" id="tieude"> 
							<a href="index.php?p=phanhoi&id=<?php echo $row_lienheKH['id_lien_he']?>">Phản hồi</a> <br>

							<form action="" method="post">
								<input type="hidden" name="idbl" value="<?php echo $row_lienheKH['id_lien_he'];?>">
								<button type="submit" class="btn btn-default pull-right" id="btnXoa" style="border: 0px;margin-left: 10px;height: 33px;color: #4793c0;;border-radius: unset;background-color:  #ffffff;;" onclick="return confirm('Bạn chắc chắn xóa phản hồi này?')" name="btn_xoa">Xóa</button>
							</form>
						</td>
					</tr>
					<?php
					}
					?>

				</tbody>

			</table>


		</div>
	</div>    
</div>

<?php
	if (isset($_POST['btn_xoa']))
	{
		$id=$_POST['idbl'];
		if (xoaphanhoiLienHeKH($id)){
			echo "<script> alert('Xóa phản hồi thành công.');</script>";
	        echo "<script> location.replace('index.php?p=khachhanglienhe'); </script>";
	        exit;//Thoat chuong trinh 
		}
		else{
			echo "<script> alert('Thao tác thất bại.');</script>";
	        echo "<script> location.replace('index.php?p=khachhanglienhe'); </script>";
	        exit;//Thoat chuong trinh 
		}
	}
?>
