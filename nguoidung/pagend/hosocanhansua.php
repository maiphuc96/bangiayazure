<div class="row">
	<h3 style="margin-top: 0px;background-color: #FE980F;text-transform: uppercase;text-align: center;color: #ffffff;padding-bottom: 10px;padding-top: 10px;">thông tin cá nhân</h3>
</div>

<div class=row>
	<form action="" method="POST" class="thongtinkhachhang" >
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="shopper-info" id="themsp_lable">
							<?php
								$taikhoan=$_SESSION['username'];
								$info=thongtinNguoiDung($taikhoan);
								while ($row_info=mysql_fetch_array($info)) {
							?>
							<label id="nomal_lable">Họ tên </label>
							<input id="suathongtincanhan" required type="text" placeholder="Nhập họ tên." value="<?php echo $row_info['ho_ten']?>" name="txtTen">
							

							<label id="nomal_lable">Giới tính </label>
							<select class="form-control" name="OpGioiTinh">
								<?php
									if ($row_info['gioi_tinh']==1){
										echo ' <option value="1" selected > Nam</option>
			                    			<option value="0" > Nữ</option>  ';
									}
									else{
										echo ' <option value="1"> Nam</option>
			                    			<option value="0" selected> Nữ</option>  ';
									}
								?>
			                             
		             		</select>
		             		<?php
								}
							?>
			           	
					</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="shopper-info" id="themsp_lable">
					<?php
						$taikhoan=$_SESSION['username'];
						$info=thongtinNguoiDung($taikhoan);
						while ($row_info=mysql_fetch_array($info)) {
					?>
					<label id="nomal_lable">Số điện thoại </label>
					<input name="txtSDT" id="suathongtincanhan" type="number" required placeholder="Nhập số điện thoại." value="<?php echo $row_info['so_dien_thoai']?>" id="nomal_lable">
					<label id="nomal_lable">Địa chỉ </label>
					<textarea id="suathongtincanhan" name="DiaChi" required id="nomal_lable" rows="3" placeholder="Nhập địa chỉ." maxlength="100" style="height: 63px;" value="<?php echo $row_info['dia_chi']?>"><?php echo $row_info['dia_chi']?></textarea>

					
					<?php
						}
					?>

				
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<button  type="submit" name="btn_huy" class="btn btn-info pull-left" style="border-radius: 0px;width: 100%;margin-bottom: 10px"> Hủy bỏ</button>
		</div>
			
		<div class="col-xs-12 col-sm-6 col-md-offset-6 col-md-3 col-lg-offset-6 col-lg-3">
			<button type="submit" name="btn_xacnhan" class="btn btn-warning pull-right"  style=" border-radius: 0px;width: 100%;margin-bottom: 10px">Hoàn tất</button>
		</div>		
     		
	</form>
	
</div>


<?php
	if (isset($_POST['btn_huy']))
	{
		
	    echo "<script> location.replace('index.php?p=hosocanhan'); </script>";
	    exit;
		
	}

	if (isset($_POST['btn_xacnhan']))
	{
		$taikhoan=$_SESSION['username'];
		$ten=$_POST['txtTen'];
		$_SESSION['hoten']=$_POST['txtTen'];
		$gioitinh=$_POST['OpGioiTinh'];
		$sdt=$_POST['txtSDT'];
		$diachi=$_POST['DiaChi'];

		if (updateThongTin($taikhoan,$ten,$gioitinh,$sdt,$diachi)){
			echo "<script> alert('Cập nhật thông tin cá nhân thành công.');</script>";
            echo "<script> location.replace('index.php?p=hosocanhan'); </script>";
            exit;
		}
		else{
			echo "<script> alert('Cập nhật thất bại, vui lòng thử lại.');</script>";
		}
	}
?>