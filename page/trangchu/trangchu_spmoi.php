
<?php 
require"../../function/dbCon.php";
require"../../function/trangchu.php";
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !isset($_GET['page']) )
{
	$page = 0 ;
}
else
{
	$page = $_GET['page'];
}

$sodu_lieu = mysql_num_rows(dsSanPham());

$sanpham_mottrang = 12;

$from = ($page-1)*$sanpham_mottrang;

$result=SanPhamMoi($from,$sanpham_mottrang);


while ($row = mysql_fetch_array($result)) 
{	
?>
	<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="images/sanpham/<?php echo $row['anh_san_pham']?>" class="img_product" alt="" style="width: 95%"/>
					<h4><?php echo substr($row['ten_san_pham'],0,18);?>...</h4>
					
					<?php 
						if ($row['san_pham_khuyen_mai']==1)
						{
							echo "<h5><div style='float: left;text-decoration: line-through;'>";
							echo number_format($row['gia_ban_dau']);
						
							echo "đ</div><div style='float:right'>";
							echo number_format($row['gia_khuyen_mai']);
							echo "đ</div></h5>";
						}
						else
						{
							echo "<h5><div style='float: left;'>";
							echo number_format($row['gia_ban_dau']);

							echo "đ</div><div style='text-decoration: line-through;float:right;'>";
							echo number_format($row['gia_khuyen_mai']);
							echo "đ</div></h5>";
						}
					?>
					
					

				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<div style="font-size: 30px;text-transform: uppercase;color: white;">Size</div>
						<div style="font-size: 83px;color: white;"><?php
							echo $row['size'];
						?></div>

						<?php 
						if ($row['san_pham_khuyen_mai']==1)
						{
							echo "<h5 style='height: 20px;'><div style='float: left;text-decoration: line-through;'>";
							echo number_format($row['gia_ban_dau']);
						
							echo "đ</div><div style='float:right'>";
							echo number_format($row['gia_khuyen_mai']);
							echo "đ</div></h5>";
						}
						else
						{
							echo "<h5 style='height: 20px;'><div style='float: left;'>";
							echo number_format($row['gia_ban_dau']);

							echo "đ</div><div style='text-decoration: line-through;float:right;'>";
							echo number_format($row['gia_khuyen_mai']);
							echo "đ</div></h5>";
						}
					?>
						
					
						<form action="" style="height: 45px;">
							<input type="hidden" name="p" value="chitietsanpham">
							<input type="hidden" name="idSanPham" value="<?php echo $row['id_san_pham']?>">
							<a class="btn btn-default add-to-cart"><i class="fa fa-external-link fa-2"></i><button type="submit" class="btn btn-default" style="border: 0px solid;background-color: white;color: #fe980f;text-transform: uppercase;">Chi tiết sản phẩm</button></a>
						</form>
					
					</div>
				</div>
				<?php 
				if ($row['san_pham_khuyen_mai'] ==1)
				{
					echo	"<img src='images/home/sale.png' class='new' alt='' />";
				}	
				?>


			</div>

		</div>
	</div>

<?php
}
?>