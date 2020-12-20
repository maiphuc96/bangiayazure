<script>
	
	var count=1;
	$(document).ready(function(){
	

		var idsp = $("#idsp").val();
		//hien thi 5 binh luan dau
		 $.get("page/chitietsanpham/chitietsanpham_binhluan.php",{page : count,idSanPham:idsp},function(data){
				$("#binhluan").html(data);
				count++;
			});
		 
		 //hien thi binh luan thi xem them
		$("#binhluan_xemthem").click(function(){
			$.get("page/chitietsanpham/chitietsanpham_binhluan.php",{page : count,idSanPham:idsp},function(data){
				$("#binhluan").append(data);
				count++;
			});
		});


		
	});
</script>


<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<?php require "blocks/leftsidebar.php"?>
			</div>

			<?php 
				if ( isset($_GET['idSanPham']) )
				{
					$id_san_pham = $_GET['idSanPham'];
				}
				settype($id_san_pham, 'int');
				$san_pham = chitietSanPham($id_san_pham);
				while ($row_san_pham = mysql_fetch_array($san_pham)) 
				{
			?>
			<!--Lay ra idsp de phan trang binh luan cua san pham-->
			<input type="hidden" id="idsp" value="<?php echo $id_san_pham;?>">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
						<div class="view-product">
							<img src="images/sanpham/<?php echo $row_san_pham['anh_san_pham']?>" alt="" style="width: 80%"/>
						</div>
						

					</div>
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-offset-1 col-lg-7">
						<!--/product-information-->
						
							<h2 style="margin-top: 70px"><?php echo $row_san_pham['ten_san_pham']?> <?php
							if ($row_san_pham['san_pham_khuyen_mai'] ==1)
								echo "(Hàng giảm giá)";?></h2>
							
									<?php 


										if ($row_san_pham['san_pham_khuyen_mai']==1)
										{	
											echo "<span>";
											echo "<h5><div style='float: left;font-size: 20px;text-decoration: line-through;'>Giá gốc : ";
											echo number_format($row_san_pham['gia_ban_dau']);
											echo "đ</div> <div style='font-size: 20px;float: left;margin-left: 20px;'>Giá KM :";
											echo number_format($row_san_pham['gia_khuyen_mai']);
											echo "đ</div></h5>";
											echo"</span>";
										}
										else
										{
											echo "<span>";
											echo "<h5><div style='float: left;font-size: 20px;'>Giá gốc : ";
											echo number_format($row_san_pham['gia_ban_dau']);
											echo "đ</div>  <div style='font-size: 20px;text-decoration: line-through;float: left;margin-left: 20px;'>Giá KM :";
											echo number_format($row_san_pham['gia_khuyen_mai']);
											echo "đ</div></h5>";
											echo"</span>";
										}
									?>
							
							
								<p>
								<br>
								<h4 style="color: #333333;">Kích cỡ : <?php echo $row_san_pham['size']?></h4>
									
								</p>
						

							<form action="" method=""> <!--Begin post sp-->
							
							<div class="">
								
									<input type="hidden" name="p" value="giohang">
									<input type="hidden" name="idSanPham" value="<?php echo $row_san_pham['id_san_pham']?>">
									<button type="submit" 
									<?php 
										if ($row_san_pham['so_luong']<=0)
											echo "disabled='disabled'";
									?>
									name="btn_themvaogiohang" class="btn btn-default cart" style="background-color: #fe980f;color: #fff;margin-left: 0px;">
									<i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
							</form> <!--End post san pham-->
							</div>
							

							<div class="" style="margin-top: 5px;">
								<p>	<b>Tình trạng: <?php
									if ($row_san_pham['so_luong']<=0)
										echo "Hết hàng";
									else
										echo "Còn hàng";
								?></b>
								
									
								</p>
								
								<p><b>Thương hiệu:</b> <?php
									$loai_sp = sanphamLoai($id_san_pham);
									while ($row_loai_sp = mysql_fetch_array($loai_sp)) {
										echo $row_loai_sp['ten_loai_san_pham'];
									}
								?></p>
							</div>
					<!--/product-information-->
						</div>
				</div><!--/product-details-->
				
				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#chitietsanpham" data-toggle="tab">Chi tiết sản phẩm</a></li>
							<li ><a href="#phanhoi" data-toggle="tab">Phản hồi</a></li>
							
							<li ><a href="#nhanxet" data-toggle="tab">Nhận xét của khách hàng</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="chitietsanpham" >
							<form>
								<div class="form-group"  style="margin-left: 20px;margin-right: 20px;margin-bottom: 10px;">
									
									<td>
										<?php echo $row_san_pham['thong_tin']?>
									</td>
									</div>
								</form>
							</div>
							
							<div class="tab-pane fade" id="phanhoi" >
								
								<div id="binhluan"></div> 
								<div id="binhluan_xemthem" class="center">
									Xem thêm
								</div>
								
							</div>
							
							
							
							<div class="tab-pane " id="nhanxet" >
								<div class="col-sm-12"  style="padding-left: 24px;padding-right: 24px;">

									<form action="" method="post">
										
										<textarea style="color: black;" name="noidungbl" id="binhluan" placeholder="Nhập bình luận của bạn." required ></textarea>
										
										<button type="submit" name="btn_binhluan" class="btn btn-default pull-right">
											Hoàn tất
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					<?php
					}
					?>
					
				</div>
			</div>
		</div>
	</section>

<?php 
	if (isset($_SESSION['username']))
	{
		if (isset($_POST['btn_binhluan'])){
			$taikhoan=$_SESSION['username'];
		

			$noidung=$_POST['noidungbl'];
			
			
			$idsp=$_GET['idSanPham'];
			
			if (themBinhLuan($taikhoan,$noidung,$idsp))
			{
				echo "<script> alert('Thêm bình luận thành công.');</script>";
	            echo("<meta http-equiv='refresh' content='0'>");
	            exit;
			}
		}
		
	}
?>
	
	