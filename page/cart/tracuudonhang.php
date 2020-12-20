<div class="col-sm-12" style="margin-left: 32px;">
	<div style="font-size: 20px;text-align: center;text-transform: uppercase;color: #696763;">
		Kiểm tra đơn hàng
		
			<div>
			<form action="" method="post">
				<input id="thanhtoandonhang" required="" type="text" name="txtMaTraCuu" placeholder="Nhập mã tra cứu tại đây." value="">
				<div class='col-sm-12'>
				<input type="submit" name="btn_tracuu" value="Kiểm tra" style="margin-top: 5px;width: 100%;color: white;background-color: #e07f0f;">
				</div>
			</form>

			<form action="" method="post">
				<div class='col-sm-12'>
				<input type="submit" name="btn_xoabotracuu" value="Xóa bỏ tra cứu" style="margin-top: 5px;width: 100%;color: white;background-color: #e07f0f;">
				<div style="text-transform: initial;color: red;">Chúng tôi khuyến nghị bạn nên xóa kết quả tra cứu để đảm bảo an toàn về thông tin đơn hàng của bạn! Nếu bạn gặp khó khăn thì hãy liên lạc số điện thoại của chúng tôi để được hỗ trợ (Tại phần giới thiệu của trang web)</div>
				</div>
			</form>	
			</div>
		
	</div>
</div>

<?php 
	if (isset($_POST['btn_xoabotracuu'])){
		if (isset($_SESSION['code']))
		{
			unset($_SESSION['code']);
			echo "<script> location.replace('index.php?p=tracuudonhang'); </script>";
		}
	}

	//Khi lan dau nhap code thi khoi tao session code
	if (isset($_POST['btn_tracuu']))
	{
		$code=$_POST['txtMaTraCuu'];
		$test = kiemtraCode($code);
		while ($row_test=mysql_fetch_array($test)) {
			$num=$row_test['num'];
		}
		if ($num!=0){
			$_SESSION['code']=$code;
		}
		else{
			echo "<script> alert('Mã tra cứu không hợp lệ, kiểm tra lại!.');</script>";
       		 echo "<script> location.replace('index.php?p=tracuudonhang'); </script>";
		}
		
	}

	//Khi nhap xong code thi form nay tu dong hien ra, tranh viec nguoi dung phai nhap lai code
	if (isset($_SESSION['code']))
	{
		$MaTraCuu=$_SESSION['code'];
		$id = layIDDH($MaTraCuu);
		while ($row_id=mysql_fetch_array($id)) {
			$idDonHang=$row_id['id_don_hang'];
		}
		
		echo'
		<section id="cart_items">
			<div class="container">
				<div class="shopper-informations">';
				
		        		$MaTraCuu=$_SESSION['code'];
		        		
						$tt_nguoimua_nguoinhan = tracuuttDonHang($MaTraCuu);
						while ($row_tt_nguoimua_nguoinhan=mysql_fetch_array($tt_nguoimua_nguoinhan)) {
						echo '<div class="row">
							<div class="col-sm-6">
								<div class="shopper-info" id="nguoimua" style="color: #696763;text-transform: capitalize;margin-top: 10px;">
									Thông tin của quý khách
								
									<form class="thongtinkhachhang">
										<label>Họ và tên </label>
										<input disabled="" id="suathongtindonhang" type="text" placeholder="" value="';echo $row_tt_nguoimua_nguoinhan['ten_khach_hang'];echo'">
										<label>Email </label>';
										echo '<input id="suathongtindonhang" disabled="" type="text" placeholder="" value="';echo $row_tt_nguoimua_nguoinhan['email_khach_hang'];echo'">
										<label>SĐT </label>
										<input disabled="" id="suathongtindonhang" type="text" placeholder="" value="';echo $row_tt_nguoimua_nguoinhan['so_dien_thoai_khach_hang'];echo'">
										<label>Địa chỉ </label>						
										<textarea disabled="" id="suathongtindonhang"  name="txtdiachi" id="txtdiachi" class="form-control" rows="2" placeholder="">';echo $row_tt_nguoimua_nguoinhan['dia_chi_khach_hang'];echo'</textarea>
										
									</form>
									
								</div>
							</div>
							<div class="col-sm-6" >
								<div class="shopper-info" id="nguoinhan" style="color: #696763;text-transform: capitalize;margin-top: 10px;">
									Địa chỉ giao & nhận hàng
									
									<form class="thongtinkhachhang">
										<label>Tên người nhận </label>
										<input disabled="" id="suathongtindonhang" type="text" placeholder="" value="';echo $row_tt_nguoimua_nguoinhan['ten_nguoi_nhan'];echo'">
										<label>Email </label>
										<input disabled="" id="suathongtindonhang" type="text" placeholder="" value="';echo $row_tt_nguoimua_nguoinhan['email_nguoi_nhan'];echo'">
										<label>SĐT </label>
										<input disabled="" id="suathongtindonhang" type="text" placeholder="" value="';echo $row_tt_nguoimua_nguoinhan['so_dien_thoai_nguoi_nhan'];echo'">
										<label>Địa chỉ </label>						
										<textarea disabled="" id="suathongtindonhang" name="txtdiachi" id="txtdiachi" class="form-control" rows="2" placeholder="">';echo $row_tt_nguoimua_nguoinhan['dia_chi_nguoi_nhan'];echo'</textarea>
										
									</form>
									
								</div>

							</div>
						</div>';
					}
				
			echo"</div>";
				echo '<div class="row">';
							
						
					
							$tinh_trang = traucuutrangthaiDonHang($MaTraCuu);
							//Chi cho phep cap nhap don hang o trang thai : dang_cho
							while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
								if ($row_tinh_trang['trang_thai']=='dang_cho'){
									echo "<a href='#doithongtin' data-toggle='modal' style='margin-top: 0px;margin-bottom: 10px;width: 100%;' class='btn btn-primary'  name='btn_cap_nhat_user' role='button'>Cập nhật thông tin(Người mua,người nhận)</a>";
									
								}
								else{
									echo "<a disabled style='margin-top: 0px;margin-bottom: 10px;width: 100%;' class='btn btn-primary'  name='btn_cap_nhat_user' role='button'>Cập nhật thông tin(Người mua,người nhận)</a>";
								}
			         		}
						
			echo'</div>
				<div class="row">
					<div class="col-sm-12">
					<!--Begin form delete product from cart-->
						<div class="review-payment">';
							
								$tinh_trang = traucuutrangthaiDonHang($MaTraCuu);
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
							
				echo'		<h2 >Thông tin đơn hàng</h2>
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
								<tbody>'; echo'<!--Mua ngay chỉ có duy nhất một sản phẩm (khi nhấn mua ngay)-->';
								
										$dh_sanpham = tracuuchitietDonHangNguoiDung($MaTraCuu);
										while ($row_dh_sanpham=mysql_fetch_array($dh_sanpham)) {
								
									
									echo'<tr>
										<td class="cart_product" id="dh_anh">
											<a href="" ><img class="dh_chitiet_anh" src="/images/sanpham/';echo $row_dh_sanpham['anh_san_pham'];echo'" alt=""></a>
										</td>
										<td class="cart_description" id="dh_mota">
											<h4><a href="../index.php?p=chitietsanpham&idSanPham=';echo $row_dh_sanpham['id_san_pham'];echo'">';echo $row_dh_sanpham['ten_san_pham'];echo'</a></h4>
											
										</td>
										<td class="cart_price" id="dh_gia">';

											
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
									
										
										echo'</td>
										<td class="cart_quantity">
											<div style="padding-left: 20px;" class="cart_quantity_button" id="mn_soluong">';

										
												$tinh_trang = traucuutrangthaiDonHang($MaTraCuu);
												while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
													if ($row_tinh_trang['trang_thai']=='dang_cho'){

														echo "<form action='index.php?p=tracuudonhang' method='post'>
														<input type='hidden' id='id_sp_sua' name='id_sp_sua' value='";
														echo $row_dh_sanpham['id_san_pham'];echo "'>
														<input class='cart_quantity_input' type='text' name='txt_so_luong_sp' value='";
														echo $row_dh_sanpham['ctdh_so_luong'];echo"'autocomplete='off' size='2'>
														<input type='submit' style='color: white;background-color: #fe980f;height: 28px;'' name='btn_so_luong_sp' value='Ok'>
													</form>";
													}
													else{
														echo "<form action='index.php?p=tracuudonhang' method='post'>
														<input type='hidden' id='id_sp_sua' name='id_sp_sua' value='";
														echo $row_dh_sanpham['id_san_pham'];echo "'>
														<input disabled class='cart_quantity_input' type='text' name='txt_so_luong_sp' value='";
														echo $row_dh_sanpham['ctdh_so_luong'];echo"'autocomplete='off' size='2'>
														<input disabled type='submit' style='color: white;background-color: #fe980f;height: 28px;'' name='btn_so_luong_sp' value='Ok'>
													</form>";
													}
						                 		}
									



											
									echo'	</div>
										</td>
										<td class="cart_total" id="dh_thanhtien">
											<p class="cart_total_price">';echo number_format($row_dh_sanpham['thanh_tien']);echo' đ</p>
										</td>';



								
												$tinh_trang = traucuutrangthaiDonHang($MaTraCuu);
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
								
										
									echo'	
									</tr>';
								
									}
								
								
									echo'<tr>
										<td colspan="3">&nbsp;</td>
										<td colspan="3">
											<table class="table table-condensed total-result">';
										
												$tien_don_hang = tracuudonHang($MaTraCuu);
												while ($row_tien_don_hang=mysql_fetch_array($tien_don_hang)) {	
										
											 echo'	<tr>
													<td>Tạm tính</td>
													<td>';echo number_format($row_tien_don_hang['tong_tien']-$row_tien_don_hang['thue_GTGT']);echo' đ</td>
												</tr>
												<tr>
													<td>Thuế GTGT(10%)</td>
													<td>';echo number_format($row_tien_don_hang['thue_GTGT']);echo' đ</td>
												</tr>
												
												<tr>
													<td>Thành tiền</td>
													<td><span>';echo number_format($row_tien_don_hang['tong_tien']);echo' đ</span></td>
												</tr>';
										
											}
										echo'
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="payment-options">
							<a class="btn btn-primary"  href="index.php">Tiếp tục mua hàng</a>';

						
							$tinh_trang = traucuutrangthaiDonHang($MaTraCuu);
							//Chi cho phep cap nhap don hang o trang thai : dang_cho
							while ($row_tinh_trang = mysql_fetch_array($tinh_trang)) {
								if ($row_tinh_trang['trang_thai']=='dang_cho'){
									echo"<a";
									echo ' onclick="return confirm(';echo "'Bạn chắc chắn xóa đơn hàng này?'";echo ')"';
									echo "class='btn btn-primary pull-right'  href='index.php?p=huybodonhang&iddh=";
									echo $idDonHang;echo "'>Hủy bỏ đơn hàng</a>";						
								}
								else{
								echo"<a disabled class='btn btn-primary pull-right'  href=''>Hủy bỏ đơn hàng</a>";
								}
			         		}
					
						echo'
						</div>
						
					</div>
				</div>

			</div>
		</section> <!--/#cart_items-->';

		echo'		<!--Form thay doi thong tin mua, nhan-->
		<form action="" method="post">
		<div class="modal fade" id="doithongtin">
		   <div class="modal-dialog">
		        <div class="modal-content">
			         <div class="modal-header" style="background-color: red;">
			            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
			            <h4 class="modal-title"  style="text-align: center;font-size: 32px;padding: 12px;color: #fff;"> THÔNG TIN ĐƠN HÀNG</h4>
			         </div>

			         <div class="modal-body">
			            <div class="container-fluid">
			               <div class="row">
			                  <div class="col-xs-12 col-sm-12 col-md-12">
							
									<div class="col-sm-6">
										<div class="form-group">';
					                       
				                        	$tt_dh = tracuuttDonHang($MaTraCuu);
				                        	while ($row_tt_dh=mysql_fetch_array($tt_dh)) {
				                        	
				                        	 echo'                   
					                        <input id="suathongtindonhang" required type="text" name="txtHoTenKhachHang" placeholder="Họ và tên của quý khách." value="';echo $row_tt_dh['ten_khach_hang'];echo'">

					                        <input id="suathongtindonhang" required type="email" name="txtEmailKhachHang" disabled placeholder="Email của quý khách." value="';echo $row_tt_dh['email_khach_hang'];echo'">

					                        <input id="suathongtindonhang" required type="tel" name="txtSDTKhachHang" placeholder="Số điện thoại của quý khách." value="';echo $row_tt_dh['so_dien_thoai_khach_hang'];echo'">

					                        <textarea id="suathongtindonhang" name="txtDiaChiKhachHang" required cols="" rows="2" placeholder="Địa chỉ của quý khách.">';echo $row_tt_dh['dia_chi_khach_hang'];echo'</textarea>';
					                       	
					                     	}         
					                   echo'  </div>
									</div>


									<div class="col-sm-6">
										<div class="form-group">';
											
										
				                        	$tt_dh =  tracuuttDonHang($MaTraCuu);;
				                        	while ($row_tt_dh=mysql_fetch_array($tt_dh)) {
				                        echo'
											<input id="suathongtindonhang" required type="text" name="txtHoTenNguoiNhan" placeholder="Họ và tên của người nhận." value="';echo $row_tt_dh['ten_nguoi_nhan'];echo'">

											<input id="suathongtindonhang" required type="email" name="txtEmailNguoiNhan" placeholder="Email của người nhận." value="';echo $row_tt_dh['email_nguoi_nhan'];echo'">

											<input id="suathongtindonhang" required type="tel" name="txtSDTNguoiNhan" placeholder="Số điện thoại của người nhận." value="';echo $row_tt_dh['so_dien_thoai_nguoi_nhan'];echo'">
					                       	
					                     
					                        <textarea name="txtDiaChiNguoiNhan" id="suathongtindonhang" required cols="" rows="2" placeholder="Địa chỉ của người nhận.">';echo $row_tt_dh['dia_chi_nguoi_nhan'];echo'</textarea>';

					                   
					                     	}
					                   echo'
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
		</form>';
	}

	if (isset($_SESSION['code'])){
		$MaTraCuu=$_SESSION['code'];
		$id = layIDDH($MaTraCuu);
		while ($row_id=mysql_fetch_array($id)) {
			$idDonHang=$row_id['id_don_hang'];
		}
		//cap nhat so luong cua san pham
		if (isset($_POST['btn_so_luong_sp']))
		{
			
			$sl=$_POST['txt_so_luong_sp'];
			$idSP=$_POST['id_sp_sua'];

			tracuucapnhatSoLuongSPctdh($MaTraCuu,$idSP,$sl);
			
			tracuucapnhatthanhtienctdh($MaTraCuu,$idSP);

			tracuucapnhatDonHang($idDonHang);
			echo("<meta http-equiv='refresh' content='0'>");
			
		}
		
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

			if (tracuucapnhatThongTin($idDonHang,$ten_nguoi_mua,$emai_nguoi_mua,$sdt_nguoi_mua,$dchi_nguoi_mua,$ten_nguoi_nhan,$emai_nguoi_nhan,$sdt_nguoi_nhan,$dchi_nguoi_nhan))
			{
				echo "<script> alert('Cập nhật thành công');</script>";
		        echo "<script> location.replace('index.php?p=tracuudonhang'); </script>";
		        exit;//Thoat chuong trinh 
			}
			else{
				echo "<script> alert('Cập nhật thất bại');</script>";
		        echo "<script> location.replace('index.php?p=tracuudonhang'); </script>";
		     
		        exit;//Thoat chuong trinh 
			}
		}
		
	
				
		//Xoa san pham khoi don hang,trang thai : dang_cho
		if (isset($_POST['btn_xoa_sp_dh']))
		{
			$id=$_POST['id_sp_xoa'];

			tracuuxoaSPDH($idDonHang,$id);
			echo("<meta http-equiv='refresh' content='0'>");
			tracuucapnhatDonHang($idDonHang);
			echo("<meta http-equiv='refresh' content='0'>");
			$n=tracuucountSP($idDonHang);
			while ($row_n = mysql_fetch_array($n)) {
				$x=$row_n['so_san_pham'];
			}
			if ($x==0){
				mysql_query("DELETE FROM donhang WHERE id_don_hang=$idDonHang");
				if (isset($_SESSION['code']))
				{
					unset($_SESSION['code']);
					echo "<script> location.replace('index.php?p=tracuudonhang'); </script>";
				}
			}

			echo("<meta http-equiv='refresh' content='0'>");
		}

		

	}
?>



