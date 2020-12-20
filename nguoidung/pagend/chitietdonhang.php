
<section id="cart_items">
		<div class="shopper-informations">
			<?php
				if(isset($_SESSION['username']))
        			$taikhoan=$_SESSION['username'];
        		if (isset($_GET['iddh']))
        			$idDonHang=$_GET['iddh'];
        		settype($idDonHang, 'int');
				$tt_nguoimua_nguoinhan = ttDonHang($taikhoan,$idDonHang);
				while ($row_tt_nguoimua_nguoinhan=mysql_fetch_array($tt_nguoimua_nguoinhan)) {
			?>
				
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >
						<div class="shopper-info" id="nguoimua" style="color: #696763;text-transform: capitalize;">
							Thông tin của quý khách
						
							<form class="thongtinkhachhang">
								<label>Họ và tên </label>
								<input readonly type="text" placeholder="" value="<?php echo $row_tt_nguoimua_nguoinhan['ten_khach_hang']?>">
								<label>Email </label>
								<input readonly type="text" placeholder="" value="<?php echo $row_tt_nguoimua_nguoinhan['email_khach_hang']?>">
								<label>SĐT </label>
								<input readonly type="text" placeholder="" value="<?php echo $row_tt_nguoimua_nguoinhan['so_dien_thoai_khach_hang']?>">
								<label>Địa chỉ </label>						
								<textarea readonly  name="txtdiachi" id="txtdiachi" class="form-control" rows="5" placeholder=""><?php echo $row_tt_nguoimua_nguoinhan['dia_chi_khach_hang']?></textarea>
								
							</form>
							
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="shopper-info" id="nguoinhan" style="color: #696763;text-transform: capitalize;">
							Địa chỉ giao & nhận hàng
							
							<form class="thongtinkhachhang">
								<label>Tên người nhận </label>
								<input readonly type="text" placeholder="" value="<?php echo $row_tt_nguoimua_nguoinhan['ten_nguoi_nhan']?>">
								<label>Email </label>
								<input readonly type="text" placeholder="" value="<?php echo $row_tt_nguoimua_nguoinhan['email_nguoi_nhan']?>">
								<label>SĐT </label>
								<input readonly type="text" placeholder="" value="<?php echo $row_tt_nguoimua_nguoinhan['so_dien_thoai_nguoi_nhan']?>">
								<label>Địa chỉ </label>						
								<textarea readonly name="txtdiachi" id="txtdiachi" class="form-control" rows="5" placeholder=""><?php echo $row_tt_nguoimua_nguoinhan['dia_chi_nguoi_nhan']?></textarea>
								
							</form>
							
						</div>
					</div>
			
				
			<?php
			}
			?>
		</div>
		<div class="col-xs-12 col-sm-12">
					
				
				<?php 
					$tinh_trang = trangthaiDonHang($taikhoan,$idDonHang);
					//Chi cho phep cap nhap don hang o trang thai : dang_cho
					while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
						if ($row_tinh_trang['trang_thai']=='dang_cho'){
							echo "<a href='#doithongtin' data-toggle='modal' style='margin-top: 0px;margin-bottom: 10px;width: 100%;' class='btn btn-primary'  name='btn_cap_nhat_user' role='button'>Cập nhật thông tin(Người mua,người nhận)</a>";
							
						}
						else{
							echo "<a disabled style='margin-top: 0px;margin-bottom: 10px;width: 100%;' class='btn btn-primary'  name='btn_cap_nhat_user' role='button'>Cập nhật thông tin(Người mua,người nhận)</a>";
						}
	         		}
				?>
		</div>
	
		<div class="col-xs-12 col-sm-12" style="padding-right: 35px">
		<!--Begin form delete product from cart-->
			<div class="review-payment">
				<?php 
					$tinh_trang = trangthaiDonHang($taikhoan,$idDonHang);
					while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
					echo "<input type='hidden' name='trang_thai' value='";
					echo $row_tinh_trang['trang_thai'];echo"'>";

					if ($row_tinh_trang['trang_thai']=='dang_cho'){
	                    echo "<h2 style='text-align: center;' name='trangthai' value='";
	              		echo $row_tinh_trang['trang_thai'];
	              		echo "'>Trạng thái : Đang chờ</h2>";}
	                if ($row_tinh_trang['trang_thai']=='da_xu_li'){
	                    echo "<h2 style='text-align: center;' name='trangthai' value='";
	                    echo $row_tinh_trang['trang_thai'];
	                    echo "'>Trạng thái : Đã xử lí</h2>";}
	                if ($row_tinh_trang['trang_thai']=='da_giao_dich'){
	                    echo "<h2 style='text-align: center;' name='trangthai' value='";
	                    echo $row_tinh_trang['trang_thai'];
	                    echo "'>Trạng thái : Đã giao dịch</h2>";
	                }
	          
	         		}
				?>
				<h2 >Thông tin đơn hàng</h2>
				<div style=" text-align: left;">(Lưu ý : Bạn chỉ có thể cập nhật số lượng hay xóa sản phẩm cho đơn hàng đang ở trạng thái ĐANG CHỜ, bạn sẽ không thể cập nhật số lượng hay xóa sản phẩm không ở trạng thái này)</div>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu" >
							<td class="description" id="mn_anhsp" >Ảnh sản phẩm</td>
							<td class="description" id="mn_tensp">Tên sản phẩm</td>
							<td class="price" id="mn_dongia">Đơn giá</td>
							<td class="quantity" id="mn_sl">Số lượng</td>
							<td class="total" id="mn_thanhtien">Thành tiền</td>
							<td class="total" id="mn_action">Action</td>
							<td></td>
						</tr>
					</thead>
					<tbody> <!--Mua ngay chỉ có duy nhất một sản phẩm (khi nhấn mua ngay)-->
						<?php
							$dh_sanpham = chitietDonHangNguoiDung($idDonHang);
							while ($row_dh_sanpham=mysql_fetch_array($dh_sanpham)) {
							
						?>
						
						<tr>
							<td class="cart_product" id="dh_anh">
								<a href="" ><img class="dh_chitiet_anh" src="/images/sanpham/<?php echo $row_dh_sanpham['anh_san_pham']?>" alt=""></a>
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
									$tinh_trang = trangthaiDonHang($taikhoan,$idDonHang);
									while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
										if ($row_tinh_trang['trang_thai']=='dang_cho'){

											echo "<form action='' method='post'>
											<input type='hidden' id='id_sp_sua' name='id_sp_sua' value='";
											echo $row_dh_sanpham['id_san_pham'];echo "'>
											<input class='cart_quantity_input' type='text' name='txt_so_luong_sp' value='";
											echo $row_dh_sanpham['ctdh_so_luong'];echo"'autocomplete='off' size='2'>
											<input type='submit' style='color: white;background-color: #fe980f;height: 28px;'' name='btn_so_luong_sp' value='Ok'>
										</form>";
										}
										else{
											echo "<form action='' method='post'>
											<input type='hidden' id='id_sp_sua' name='id_sp_sua' value='";
											echo $row_dh_sanpham['id_san_pham'];echo "'>
											<input disabled class='cart_quantity_input' type='text' name='txt_so_luong_sp' value='";
											echo $row_dh_sanpham['ctdh_so_luong'];echo"'autocomplete='off' size='2'>
											<input disabled type='submit' style='color: white;background-color: #fe980f;height: 28px;'' name='btn_so_luong_sp' value='Ok'>
										</form>";
										}
			                 		}
								?>



								
								</div>
							</td>
							<td class="cart_total" id="dh_thanhtien">
								<p class="cart_total_price"><?php echo number_format($row_dh_sanpham['thanh_tien'])?> đ</p>
							</td>



							<?php 
									$tinh_trang = trangthaiDonHang($taikhoan,$idDonHang);
									while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
										if ($row_tinh_trang['trang_thai']=='dang_cho'){
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
											
										}
										else{
											echo "<td class='cart_delete_btn'>
												<input disabled type='submit' name='btn_xoa_sp_dh' value='Xóa'>
											</td>";
										}
			                 		}
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
									$tien_don_hang = donHang($idDonHang);
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
			<div class="payment-options" style="margin-bottom: 0px">
				<a class="btn btn-primary"  href="../index.php">Tiếp tục mua hàng</a>

				<?php 
				$tinh_trang = trangthaiDonHang($taikhoan,$idDonHang);
				//Chi cho phep cap nhap don hang o trang thai : dang_cho
				while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
					if ($row_tinh_trang['trang_thai']=='dang_cho'){
						echo"<a";
						echo ' onclick="return confirm(';echo "'Bạn chắc chắn xóa đơn hàng này?'";echo ')"';
						echo "class='btn btn-primary pull-right'  href='index.php?p=huybodonhang&iddh=";
						echo $idDonHang;echo"''>Hủy bỏ đơn hàng</a>";						
					}
					else{
					echo"<a disabled class='btn btn-primary pull-right'  href=''>Hủy bỏ đơn hàng</a>";
					}
	     		}
			?>
			
			</div>
			
		</div>
	

</section> <!--/#cart_items-->


<!--Form thay doi thong tin mua, nhan-->
<form action="" method="post">
<div class="modal fade" id="doithongtin">
   <div class="modal-dialog">
        <div class="modal-content">
	         <div class="modal-header" style="background-color: red;">
	            <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
	            <h4 class="modal-title"  style="text-align: center;font-size: 32px;padding: 12px;color: #fff;"> THÔNG TIN ĐƠN HÀNG</h4>
	         </div>

	         <div class="modal-body">
	            <div class="container-fluid">
	               <div class="row">
	                  <div class="col-xs-12 col-sm-12 col-md-12">
					
							<div class="col-sm-6">
								<div class="form-group">
			                        <?php
		                        	$tt_dh = ttDonHang($taikhoan,$idDonHang);
		                        	while ($row_tt_dh=mysql_fetch_array($tt_dh)) {
		                        	?>
		                        	                    
			                        <input id="suathongtindonhang" required type="text" name="txtHoTenKhachHang" placeholder="Họ và tên của quý khách." value="<?php echo $row_tt_dh['ten_khach_hang']?>">

			                        <input id="suathongtindonhang" required type="email" name="txtEmailKhachHang" placeholder="Email của quý khách." value="<?php echo $row_tt_dh['email_khach_hang']?>">

			                        <input id="suathongtindonhang" required type="tel" name="txtSDTKhachHang" placeholder="Số điện thoại của quý khách." value="<?php echo $row_tt_dh['so_dien_thoai_khach_hang']?>">

			                        <textarea id="suathongtindonhang" name="txtDiaChiKhachHang" required cols="" rows="2" placeholder="Địa chỉ của quý khách."><?php echo $row_tt_dh['dia_chi_khach_hang']?></textarea>
								

			 
			                       	<?php
			                     	}
			                        ?>
			                     </div>
							</div>


							<div class="col-sm-6">
								<div class="form-group">
									
									<?php
		                        	$tt_dh = ttDonHang($taikhoan,$idDonHang);
		                        	while ($row_tt_dh=mysql_fetch_array($tt_dh)) {
		                        	?>
									<input id="suathongtindonhang" required type="text" name="txtHoTenNguoiNhan" placeholder="Họ và tên của người nhận." value="<?php echo $row_tt_dh['ten_nguoi_nhan']?>">

									<input id="suathongtindonhang" required type="email" name="txtEmailNguoiNhan" placeholder="Email của người nhận." value="<?php echo $row_tt_dh['email_nguoi_nhan']?>">

									<input id="suathongtindonhang" required type="tel" name="txtSDTNguoiNhan" placeholder="Số điện thoại của người nhận." value="<?php echo $row_tt_dh['so_dien_thoai_nguoi_nhan']?>">
			                       	
			                     
			                        <textarea name="txtDiaChiNguoiNhan" id="suathongtindonhang" required cols="" rows="2" placeholder="Địa chỉ của người nhận."><?php echo $row_tt_dh['dia_chi_nguoi_nhan']?></textarea>

			                       <?php
			                     	}
			                        ?>

			                     </div>
							</div>
	                  </div>
	               </div>
	            </div>
	         </div>

	         <div class="modal-footer">
	            <div class="form-group">
	               <button type="submit" class="btn btn-lg btn-info" name="btn_xacnhan"> Xác nhận <span class="glyphicon glyphicon-saved"></span></button>

	               <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Hủy <span class="glyphicon glyphicon-remove"></span></button>
	            </div>
	         </div>
   		</div>
	</div>
</div>
</form>

<?php
//Chinh sua thong tin mua,nhan hang
if (isset($_POST['btn_xacnhan']))
{
	//lay thong tin nguoi mua
	$ten_nguoi_mua=$_POST['txtHoTenKhachHang'];
	$emai_nguoi_mua=$_POST['txtEmailKhachHang'];
	$sdt_nguoi_mua=$_POST['txtSDTKhachHang'];
	$dchi_nguoi_mua=$_POST['txtDiaChiKhachHang'];

	//Lay thong tin nguoi nhan
	$ten_nguoi_nhan=$_POST['txtHoTenNguoiNhan'];
	$emai_nguoi_nhan=$_POST['txtEmailNguoiNhan'];
	$sdt_nguoi_nhan=$_POST['txtSDTNguoiNhan'];
	$dchi_nguoi_nhan=$_POST['txtDiaChiNguoiNhan'];

	if (capnhatThongTin($idDonHang,$ten_nguoi_mua,$emai_nguoi_mua,$sdt_nguoi_mua,$dchi_nguoi_mua,$ten_nguoi_nhan,$emai_nguoi_nhan,$sdt_nguoi_nhan,$dchi_nguoi_nhan))
	{
		echo "<script> alert('Cập nhật thành công');</script>";
        echo "<script> location.replace('index.php?p=chitietdonhang&iddh=";
        echo $idDonHang;
        echo"'); </script>";
        exit;//Thoat chuong trinh 
	}
	else{
		echo "<script> alert('Cập nhật thất bại');</script>";
        echo "<script> location.replace('index.php?p=chitietdonhang&iddh=";
        echo $idDonHang;
        echo"'); </script>";
        exit;//Thoat chuong trinh 
	}
}
?>



<?php
	

	//cap nhat so luong cua san pham
	if (isset($_POST['btn_so_luong_sp']))
	{
		$sl=$_POST['txt_so_luong_sp'];
		$idSP=$_POST['id_sp_sua'];
		capnhatSoLuongSPctdh($idDonHang,$idSP,$sl);
		echo("<meta http-equiv='refresh' content='1'>");
		capnhatthanhtienctdh($idDonHang,$idSP);
		echo("<meta http-equiv='refresh' content='1'>");
		capnhatDonHang($idDonHang);
		echo("<meta http-equiv='refresh' content='1'>");
		
	}
		
		
	//Xoa san pham khoi don hang,trang thai : dang_cho
	if (isset($_POST['btn_xoa_sp_dh']))
	{
		$id=$_POST['id_sp_xoa'];
	
		
			xoaSPDH($idDonHang,$id);
			echo("<meta http-equiv='refresh' content='1'>");
			capnhatDonHang($idDonHang);
			echo("<meta http-equiv='refresh' content='1'>");
			$n=countSP($idDonHang);
			while ($row_n = mysql_fetch_array($n)) {
				$x=$row_n['so_san_pham'];
			}
			if ($x==0){
				mysql_query("DELETE FROM donhang WHERE id_don_hang=$idDonHang");
			}

			echo("<meta http-equiv='refresh' content='1'>");
	}
?>
