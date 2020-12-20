 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlidonhang/donhangdaxuli.php";
?>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-transform: uppercase; width: 100%;color: #ffffff;background-color: #fe980f;text-align: center;">
	<h2>CHI TIẾT ĐƠN HÀNG</h2>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="shopper-info" id="chitiet_donhang_nguoimua">
		<div style="text-align: center;">Thông tin của quý khách</div>
		<?php
		$iddh=$_GET['iddh'];
		$tt_nguoimua=ttDonHangDXL($iddh);
		while ($row_tt_nguoimua=mysql_fetch_array($tt_nguoimua)) {
		?>
		<div class="thongtinkhachhang">
		
			<input readonly type="text" placeholder="Họ và tên của quý khách." value="<?php echo $row_tt_nguoimua['ten_khach_hang']?>" id="tt_mua_nhan"><br>
			
			<input readonly type="text" placeholder="Email của quý khách." value="<?php echo $row_tt_nguoimua['email_khach_hang']?>" id="tt_mua_nhan"><br>
			
			<input readonly type="text" value="<?php echo $row_tt_nguoimua['so_dien_thoai_khach_hang']?>" placeholder="Số điện thoại của quý khách." id="tt_mua_nhan"><br>
						
			<textarea readonly name="txtdiachi" id="txtdiachi" class="form-control" rows="5" placeholder="Địa chỉ của quý khách." id="tt_mua_nhan" ><?php echo $row_tt_nguoimua['dia_chi_khach_hang']?></textarea>
		</div>
		<?php
		}
		?>
	</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="shopper-info" id="chitiet_donhang_nguoinhan">
		<div style="text-align: center;">Địa chỉ giao & nhận hàng</div>					
		<?php
		$iddh=$_GET['iddh'];
		$tt_nguoinhan=ttDonHangDXL($iddh);
		while ($row_tt_nguoinhan=mysql_fetch_array($tt_nguoinhan)) {
		?>
		<div class="thongtinkhachhang">
	
			<input readonly type="text" placeholder="Họ và tên người nhận hàng." id="tt_mua_nhan" value="<?php echo $row_tt_nguoinhan['ten_nguoi_nhan']?>"><br>
		
			<input readonly type="text" placeholder="Email người nhận hàng." id="tt_mua_nhan" value="<?php echo $row_tt_nguoinhan['email_nguoi_nhan']?>"><br>
		
			<input readonly type="text" placeholder="Số điện thoại người nhận hàng." id="tt_mua_nhan" value="<?php echo $row_tt_nguoinhan['so_dien_thoai_nguoi_nhan']?>"><br>
						
			<textarea readonly name="txtdiachi" id="txtdiachi" class="form-control" rows="5" placeholder="Địa chỉ nhận hàng." id="tt_mua_nhan" ><?php echo $row_tt_nguoinhan['dia_chi_nguoi_nhan']?></textarea>
			<?php
			}
			?>						
		</div>
	</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
	<h2 style="text-transform: uppercase;color: #fe980f;">Thông tin đơn hàng</h2>
</div>

<div class="table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-condensed">
			<thead>
				<tr class="" style="font-size: 16px;color: white;background-color:#fe980f;" >
					<td class="description" id="mn_anhsp" >Ảnh sản phẩm</td>
					<td class="description" id="mn_tensp">Tên sản phẩm</td>
					<td class="price" id="mn_dongia">Đơn giá</td>
					<td class="quantity" id="mn_sl">Số lượng</td>
					<td class="total" id="mn_thanhtien">Thành tiền</td>
					<td class="total" id="mn_action">Action</td>
					<td></td>
				</tr>
			</thead>
			<tbody> 
				<?php
					$dh_sanpham = chitietDHNDDXL($iddh);
					while ($row_dh_sanpham=mysql_fetch_array($dh_sanpham)) {
				?>
				
				<tr>
					<td class="" id="dh_anh">
						<a href="" ><img class="dh_chitiet_anh" src="/bangiay_v2/images/sanpham/<?php echo $row_dh_sanpham['anh_san_pham']?>" alt=""></a>
					</td>
					<td class="cart_description" id="dh_mota">
						<h4><a href="../index.php?p=chitietsanpham&idSanPham=<?php echo $row_dh_sanpham['id_san_pham']?>"><?php echo $row_dh_sanpham['ten_san_pham']?></a></h4>
						
					</td>
					<td class="cart_price" id="dh_gia">

						<?php 
							$km=$row_dh_sanpham['san_pham_khuyen_mai'];
							if($km==1){
								echo "<p>";
								echo number_format($row_dh_sanpham['gia_khuyen_mai']);
								echo " đ</p>";
							}
							else{
								echo "<p>";
								echo number_format($row_dh_sanpham['gia_ban_dau']);
								echo " đ</p>";
							}
						?>
					
					</td>
					<td class="cart_quantity">
						<div style="padding-left: 20px;" class="cart_quantity_button" id="mn_soluong">
							
							<?php

								echo "<form action='' method='post'>
								<input type='hidden' id='id_sp_sua' name='id_sp_sua' value='";
								echo $row_dh_sanpham['id_san_pham'];echo "'>
								<input class='cart_quantity_input' type='number' style='width: 45%;' name='txt_so_luong_sp' value='";
								echo $row_dh_sanpham['ctdh_so_luong'];echo"'autocomplete='off' size='2'>
								<input type='submit' style='color: white;background-color: #fe980f;height: 28px;'' name='btn_so_luong_sp' value='Ok'>";
							?>

						</div>
					</td>
					<td class="cart_total" id="dh_thanhtien">
						<p class="cart_total_price"><?php echo number_format($row_dh_sanpham['thanh_tien'])?> đ</p>
					</td>

					<?php 
							
						echo"<form action='' method='post'>
							<td class='cart_delete_btn'>
								<input ";
						echo 'onclick="return confirm(';
						echo "'Bạn chắc chắn xóa sản phẩm này?'";
						echo ')"';
						echo "type='submit' style='color: white;background-color: #fe980f;' name='btn_xoa_sp_dh' value='Xóa'>
								<input type='hidden' id='id_sp_xoa' name='id_sp_xoa' value='";echo $row_dh_sanpham['id_san_pham'];echo"'>
							</td>
							</form>";

					?>
					
					
				</tr>
				<?php
				}
				?>
			
				<tr>
					<td colspan="3">&nbsp;</td>
					<td colspan="3">
						<table class="table table-condensed total-result">
						<?php 
							$tien_don_hang = DHDXL($iddh);
							while ($row_tien_don_hang=mysql_fetch_array($tien_don_hang)) {	
						?>
							<tr>
								<td>Tạm tính</td>
								<td><?php echo number_format($row_tien_don_hang['tong_tien']-$row_tien_don_hang['thue_GTGT'])?> đ</td>
							</tr>
							<tr>
								<td>Thuế GTGT(10%)</td>
								<td><?php echo number_format($row_tien_don_hang['thue_GTGT'])?> đ</td>
							</tr>
							
							<tr>
								<td>Thành tiền</td>
								<td><span><?php echo number_format($row_tien_don_hang['tong_tien'])?> đ</span></td>
							</tr>
						<?php
						}
						?>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
</div>

<div class="payment-options">
		<?php 
			echo"<a";
			echo ' onclick="return confirm(';echo "'Bạn chắc chắn đơn hàng này đã được giao dịch và thanh toán?'";echo ')"';
			echo "class='btn btn-primary col-xs-12 col-sm-5 col-md-5 col-lg-5'  href='index.php?p=xacnhandonhangKHDXL&iddh=";
			echo $iddh;echo"''>Đã giao dịch và thanh toán</a>";						
		?>

		<?php 
			echo"<a";
			echo ' onclick="return confirm(';echo "'Bạn chắc chắn hủy bỏ đơn hàng này?'";echo ')"';
			echo "class='btn btn-primary col-xs-12 col-sm-offset-2 col-sm-5 col-md-offset-2 col-md-5 col-lg-offset-2 col-lg-5'  href='index.php?p=huybodonhangKHDXL&iddh=";
			echo $iddh;echo"''>Hủy bỏ đơn hàng</a>";						
		?>				
</div>


<?php
	//cap nhat so luong cua san pham
	if (isset($_POST['btn_so_luong_sp']))
	{
		$sl=$_POST['txt_so_luong_sp'];
		$idSP=$_POST['id_sp_sua'];
		$iddh=$_GET['iddh'];
		cnchitietsoluong($iddh,$idSP,$sl);
		echo("<meta http-equiv='refresh' content='1'>");
		cnthanhtien($iddh,$idSP);
		echo("<meta http-equiv='refresh' content='1'>");
		cnDonHang($iddh);
		echo("<meta http-equiv='refresh' content='1'>");
		
	}


	//Xoa san pham khoi don hang
	if (isset($_POST['btn_xoa_sp_dh']))
	{
		$id=$_POST['id_sp_xoa'];
		$iddh=$_GET['iddh'];
		
		xoaSPKH($iddh,$id);
		echo("<meta http-equiv='refresh' content='1'>");
		cnDonHang($iddh);
		echo("<meta http-equiv='refresh' content='1'>");
		$n=countSPKH($iddh);
		while ($row_n = mysql_fetch_array($n)) {
			$x=$row_n['so_san_pham'];
		}
		if ($x==0){
			mysql_query("DELETE FROM donhang WHERE id_don_hang=$iddh");
			
			echo "<script> location.replace('index.php?p=donhangdangcho'); </script>";
		}

		echo("<meta http-equiv='refresh' content='1'>");
	}
?>
