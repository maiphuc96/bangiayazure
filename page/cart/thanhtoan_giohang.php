<style>
	#info_tt {
		    font-size: 16px;
		    border-left-style: none;
		    border-right-style: none;
		    border-top-style: none;
		    border-bottom-style: double;
		    margin-bottom: 5px;
		    margin-top: 5px;
		    width: 100%;
	}
	#title_tt {
		    font-size: 20px;
		    text-transform: uppercase;
		    color: #fe980f;
		    text-align: center;
		    margin-top: 10px;
	}

</style>
<?php

//include $_SERVER["DOCUMENT_ROOT"] . "/function/trangchu.php";
if(isset($_POST['btn_capnhat']))
{
	//qty : Ten cua o text so luong voi key la id cua san pham
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
	echo "<script> location.replace('index.php?p=thanhtoan-giohang'); </script>";
}
?>

	<div class="row">
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Thanh toán</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<?php require "blocks/leftsidebar.php"?>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				
				<div class="col-xs-12 col-sm-6">
			
						<div id="title_tt">Thông tin của quý khách</div>
						<form action="index.php?p=thanhtoan-giohang" method="post">
						<div >
						<?php
							if (isset($_SESSION['username'])){
								$taikhoan= $_SESSION['username'];
							//Neu ton tai tai khoan nguoi dung thi lay thong tin nguoi dung
							$nguoidung=thongtinNguoiDung($taikhoan);
							while ( $row_nguoidung = mysql_fetch_array($nguoidung)) {
							//echo"<label>Họ và tên </label>";
							echo"<input id='info_tt' required type='text' name='txtHoTenKhachHang'placeholder='Họ và tên của quý khách.'  value='";echo $row_nguoidung['ho_ten'];echo"'>";
							
							echo"<input  id='info_tt' required type='email' name='txtEmailKhachHang' style='width:100%' placeholder='Email của quý khách.' value='";echo $row_nguoidung['tai_khoan'];echo"'>";
							//echo"<label>SĐT </label>";
							echo"<input id='info_tt' required type='number' maxlength='12' style='width:100%' name='txtSoDTKhachHang' placeholder='Số điện thoại của quý khách.' value='";echo $row_nguoidung['so_dien_thoai'];echo"'>";
							//echo"<label>Địa chỉ </label>";					
							echo"<textarea maxlength='100' id='info_tt' required name='txtDiaChiKhachHang' class='form-control' rows='5' placeholder='Địa chỉ của quý khách.'>";echo $row_nguoidung['dia_chi'];echo"</textarea>";
						
							}
						}
							else{
							//Neu khong dang nhap thi yeu cau khach dien thong tin
							//echo"<label>Họ và tên </label>";
							echo"<input id='info_tt' style='width:100%' required type='text' name='txtHoTenKhachHang' placeholder='Họ và tên của quý khách.' value='";echo"'>";
							//echo"<label>Email </label>";
							echo"<input  id='info_tt' style='width:100%' required type='text' name='txtEmailKhachHang' placeholder='Email của quý khách.' value='";echo"'>";
							//echo"<label>SĐT </label>";
							echo"<input id='info_tt' style='width:100%' required type='number'  name='txtSoDTKhachHang' placeholder='Số điện thoại của quý khách.' type='number' maxlength='12'  value='";echo"'>";
							//echo"<label>Địa chỉ </label>";					
							echo"<textarea maxlength='100'  id='info_tt' required name='txtDiaChiKhachHang' class='form-control' rows='5' placeholder='Địa chỉ của quý khách.'>";echo"</textarea>";
							}
						
							
						?>
						</div>						
				</div>
				<div class="col-xs-12 col-sm-6">
					
						<div id="title_tt">Địa chỉ giao & nhận hàng</div>

						<div >
							<!-- <label>Tên người nhận </label> -->
							<input id="info_tt" required type="text" name="txtTenNguoiNhan" placeholder="Họ và tên người nhận hàng.">
						<!-- 	<label>Email </label> -->
							<input id="info_tt" required type="email" name="txtEmailNguoiNhan" placeholder="Email người nhận hàng.">
							<!-- <label>SĐT </label> -->
							<input id="info_tt"  required  type="number" maxlength="12" name="txtSoDTNguoiNhan" placeholder="Số điện thoại người nhận hàng.">
							<!-- <label>Địa chỉ </label>	 -->					
							<textarea maxlength='100'  id="info_tt" required name="txtDiaChiNguoiNhan"  class="form-control" rows="5" placeholder="Địa chỉ nhận hàng."></textarea>

						</div>							
				</div>
		
				

				<div class="review-payment col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h2 style="margin-bottom: -20px;text-align:center;margin-top: 26px;">Thông tin đơn hàng</h2>
				</div>
				<div>
					<!--Thong tin don hang-->
					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu" >
									<td class="description" id="mn_gh_anhsp" >Ảnh sản phẩm</td>
									<td class="description" id="mn_gh_tensp">Tên sản phẩm</td>
									<td class="price" id="mn_gh_dongia">Size</td>
									<td class="price" id="mn_gh_dongia">Đơn giá</td>
									<td class="quantity" id="mn_gh_sl">Số lượng</td>
									<td class="total" id="mn_gh_thanhtien">Thành tiền</td>
									<td class="total" id="mn_gh_action">Action</td>
									
								</tr>
							</thead>
							<tbody> 

								<?php
								$ok=1;
								if(isset($_SESSION['cart']))
								{
									foreach($_SESSION['cart'] as $k => $v)
									{
										if(isset($k))
										{
											$ok=2;
										}
									}
								}
								if($ok == 2)
								{


									echo "<form action='index.php?p=thanhtoan-giohang' method='post'>";
									foreach($_SESSION['cart'] as $key=>$value)
									{
										$id[]=$key;
									}
									$str=implode(",",$id);
								
										//Lay ra danh sach san pham duoc duoc luu o session cart
																	$sql="SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_ban_dau as gia,size
																	FROM sanpham WHERE san_pham_khuyen_mai=0 AND id_san_pham in ($str)
																	UNION
																	SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_khuyen_mai as gia,size
																	FROM sanpham WHERE san_pham_khuyen_mai=1 AND id_san_pham in ($str)";

																	$query=mysql_query($sql);

																	$total=0;

																	while($row=mysql_fetch_array($query))
																	{
										//So luong duoc lay tu session o page addcart
										$soluong=$_SESSION['cart'][$row['id']];
										$tongtien=$_SESSION['cart'][$row['id']]*$row['gia'];		
										echo"<tr>";
										echo"	<td class='cart_product' id='gh_anh'>";
										echo"		<a href='' ><img class='dh_chitiet_anh' src='images/sanpham/$row[anh]' alt=''></a>";
										echo"	</td>";
										echo"	<td class='cart_description' id='gh_mota'>";
										echo"		<h4><a href='index.php?p=chitietsanpham&idSanPham=$row[id]'>$row[ten]</a></h4>";

										echo"	</td>";
										echo"	<td class='cart_price' id='gh_gia'>";

										echo"			<p>$row[size]</p>";
										echo"	</td>";
										echo"	<td class='cart_price' id='gh_gia'>";

										echo"			<p>";
										echo number_format($row['gia']);echo" đ</p>";
										echo"	</td>";
										echo"	<td class='cart_quantity' >";

										echo"		<p  align='right'><input style='width: 55%;margin-right: 15px;' type='number' name='qty[$row[id]]' size='1' value='$soluong'> ";

										echo"	</td>";

										echo"	<td class='cart_total' id='gh_thanhtien'>";
										echo"		<p class='cart_total_price' id='thanhtien' style='color: red;font-size: 18px;'>";
										echo number_format($tongtien);echo" đ</p>";
										echo"	</td>";
										echo"	<td class='cart_delete_btn'>";
										echo"			<a href='index.php?p=delcartthanhtoan&productid=$row[id]' role='button' style='background-color: #fe980f;border: 1px solid;padding: 5px;color: white;'>Xóa</a></p>";
										echo"	</td>";
										echo"</tr> ";
										$total+=$tongtien;

									}

									echo'		<tr>
									<td colspan="3">&nbsp;</td>
									<td colspan="3">
										<table class="table table-condensed total-result">
											<tbody><tr>
												<td>Tạm tính</td>';
												echo"					<td>";
												echo number_format($total);echo" đ</td>";
												echo'				</tr>
												<tr>
													<td>Thuế GTGT(10%)</td>';
													$thue=$total*0.1;
													$thanhtien=$thue+$total;
													echo"					<td>";
													echo number_format($thue);echo" đ</td>";
													echo'					</tr>

													<tr>
														<td>Thành tiền</td>';
														echo"					<td><span style='color: red;font-size: 16px;'>";
														echo number_format($thanhtien);echo" đ</span></td>";
														echo'					</tr>
													</tbody></table>
												</td>
											</tr>';
										}
										else
										{
											echo "<div class='pro'>";
											echo "<p align='center'>Bạn không có sản phẩm nào trong giỏ hàng<br /><a href='index.php'> --Mua hàng--</a></p>";
											echo "</div>";
										}

										?>				
									</tbody> 
								</table>
							</div>
							<div class="payment-options">
								
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
										<a style="width: 100%" class="btn btn-primary pull-left" href="index.php">Tiếp tục mua hàng</a>
									</div>
									
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
										<input style="width: 100%" class="btn btn-primary pull-left" href="" value="Cập nhật"  name="btn_capnhat" type="submit">
									</div>
									
									
									<?php 
										if ($ok==2)
										{
											echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <input  style="width: 100%" class="btn btn-primary pull-right" value="Thanh toán"  name="btn_thanhtoandonhang" type="submit"></div>';
										}
										else{
										
											echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <input disabled style="width: 100%" class="btn btn-primary pull-right" value="Thanh toán" role="button" name="btn_thanhtoandonhang" type="submit"></div>';
										}

									?>
									
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
										<a style="width: 100%" class="btn btn-primary pull-right" href="index.php?p=delcart&id=0">Xóa bỏ giỏ hàng</a>
									</div>
									

									</form>
								</div>
							</div>
						</div>
					</div>
					<!--End thong tin don hang-->
				</div>

			</div>
		</section> <!--/#cart_items-->
	</div>




<?php
//btn_thanhtoandonhang
//include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
include $_SERVER["DOCUMENT_ROOT"] . "/nguoidung/function/nguoidung.php";

//Luu thong tin don hang cua khach hang
if (isset($_POST['btn_thanhtoandonhang'])){

	//Neu ton tai tai khoan nguoi dung thi : Them du lieu, khong co gui email
	//khach hang co the kiem tra trong profile
	if (isset($_SESSION['username']))
	{
		$taikhoan=$_SESSION['username'];
		$code=md5(mt_rand());
		
		$hotenKH=$_POST['txtHoTenKhachHang'];
		$emailKH=$_POST['txtEmailKhachHang'];
		$sodtKH=$_POST['txtSoDTKhachHang'];
		$diachiKH=$_POST['txtDiaChiKhachHang'];
		$hotenNN=$_POST['txtTenNguoiNhan'];
		$emailNN=$_POST['txtEmailNguoiNhan'];
		$sodtNN=$_POST['txtSoDTNguoiNhan'];
		$diachiNN=$_POST['txtDiaChiNguoiNhan'];

		themDonHang($code,$taikhoan,$hotenKH,$sodtKH,$emailKH,$diachiKH,$hotenNN,$emailNN,$sodtNN,$diachiNN);
		$idDonHang=mysql_fetch_array(layidDonHang($code));
		

			while ($idDonHang) {
				$row_idDonHang=$idDonHang['id_don_hang'];
				
			//Lay thong tin san pham tu session cart de luu vao database
				
				if($ok == 2)
				{
					//Neu goi ra de lay gia tri thi bo qua buoc gan, chi tiet xem o gio hang
					$str=implode(",",$id);

				
					//Lay ra danh sach san pham duoc duoc luu o session cart
					$sql="SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_ban_dau as gia,size
					FROM sanpham WHERE san_pham_khuyen_mai=0 AND id_san_pham in ($str)
					UNION
					SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_khuyen_mai as gia,size
					FROM sanpham WHERE san_pham_khuyen_mai=1 AND id_san_pham in ($str)";
					
					$query=mysql_query($sql);

					$total=0;

					while($row=mysql_fetch_array($query))
					{
					$tongtien=	$_SESSION['cart'][$row['id']]*$row['gia'];
					themChiTietDonHang($row_idDonHang,$row['id'],$_SESSION['cart'][$row['id']],$row['gia'],$tongtien);
					
					$total+=$tongtien;//cong thanh tien cua cac san pham
				
					
					 
				}
				$thue=$total*0.1;
				$thanhtien=$thue+$total;
				capnhatTongTienDH($row_idDonHang,$thue,$thanhtien);
			}
		echo "<script> alert('Đặt hàng thành công.');</script>";
        echo "<script> location.replace('index.php?p=delcart&id=0'); </script>";
        echo "<script> location.replace('index.php'); </script>";
        exit;//Thoat chuong trinh 
		}
	}
	else{
		//Neu khong ton tai tai khoan nguoi dung : gui email + code de khach hang check tinh trang don hang
		$taikhoan="";
		$code=md5(mt_rand());
	
		$hotenKH=$_POST['txtHoTenKhachHang'];
		$emailKH=$_POST['txtEmailKhachHang'];
		$sodtKH=$_POST['txtSoDTKhachHang'];
		$diachiKH=$_POST['txtDiaChiKhachHang'];
		$hotenNN=$_POST['txtTenNguoiNhan'];
		$emailNN=$_POST['txtEmailNguoiNhan'];
		$sodtNN=$_POST['txtSoDTNguoiNhan'];
		$diachiNN=$_POST['txtDiaChiNguoiNhan'];

		$addnd = themDonHang($code,$taikhoan,$hotenKH,$sodtKH,$emailKH,$diachiKH,$hotenNN,$emailNN,$sodtNN,$diachiNN);
		
		$idDonHang=mysql_fetch_array(layidDonHang($code));
		

			while ($idDonHang) {
				$row_idDonHang=$idDonHang['id_don_hang'];
				
			//Lay thong tin san pham tu session cart de luu vao database
				
				if($ok == 2)
				{
					//Neu goi ra de lay gia tri thi bo qua buoc gan, chi tiet xem o gio hang
					$str=implode(",",$id);

				
					//Lay ra danh sach san pham duoc duoc luu o session cart
					$sql="SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_ban_dau as gia,size
					FROM sanpham WHERE san_pham_khuyen_mai=0 AND id_san_pham in ($str)
					UNION
					SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_khuyen_mai as gia,size
					FROM sanpham WHERE san_pham_khuyen_mai=1 AND id_san_pham in ($str)";
					
					$query=mysql_query($sql);

					$total=0;

					while($row=mysql_fetch_array($query))
					{
					$tongtien=	$_SESSION['cart'][$row['id']]*$row['gia'];
					themChiTietDonHang($row_idDonHang,$row['id'],$_SESSION['cart'][$row['id']],$row['gia'],$tongtien);
				
					
					$total+=$tongtien;//cong thanh tien cua cac san pham
				
					
					 
				}
				$thue=$total*0.1;
				$thanhtien=$thue+$total;
				$capnhat = capnhatTongTienDH($row_idDonHang,$thue,$thanhtien);
				
			}

          $mTo = addslashes($emailKH);
          $subject = 'Mua hàng online tại SHOES SHOP';
		  $nTo =$hotenKH;
          $comment = "Xin chào ".$nTo." .Bạn vừa đặt hàng tại SHOES SHOP, mã tra cứu thông tin đơn hàng của bạn là  ".$code." .Hãy nhập mã tra cứu tại đường link dưới đây để biết rõ hơn tình trạng cũng như thông tin về đơn hàng của bạn. Xin cảm ơn! https://bangiay.azurewebsites.net/index.php?p=tracuudonhang";
       
          echo "<script> alert('$comment'); </script>";
          $header = "From:google@gmail.com \r\n";
          /*
          $send=mail($mTo, $subject, $comment, $header);
          

          if($send)
          {
              echo "<script> alert('Đặt hàng thành công. Một email thông báo đã được gửi đến địa chỉ email của quý khách, quý khách hãy kiểm tra lại email của mình để biết thêm chi tiết cũng như tình trạng của đơn hàng. Xin cảm ơn!');</script>";
              
          }
          else {
             echo "<script> alert('Lỗi, Gửi email thất bại. Quý khách có thể liên hệ số điện thoại : 0966 746 080 để được hỗ trợ về thông tin cũng như tình trạng của đơn hàng');</script>";
              
          }*/
 
        echo "<script> location.replace('index.php?p=delcart&id=0'); </script>";
        echo "<script> location.replace('index.php'); </script>";
        exit;//Thoat chuong trinh 
	}
		
	}
}
?>
