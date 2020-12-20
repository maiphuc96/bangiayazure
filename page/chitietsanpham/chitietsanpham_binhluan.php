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
settype($page, 'int');

if ( isset($_GET['idSanPham']) )
{
	$idsp = $_GET['idSanPham'];
}
settype($idsp, 'int');

$binhluan_mottrang = 1;
$from = ($page-1)*$binhluan_mottrang;

$binh_luan = idSPBinhLuan($idsp,$from,$binhluan_mottrang);

while ($row_binh_luan = mysql_fetch_array($binh_luan)) 
{
?>

<div class="media"  style="float: left;">
	<div class="media-left">
		<a href="#">
			<img class="media-object" src="images/avatar/<?php echo $row_binh_luan['anh_nguoi_dung']?>" alt="...">
		</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading"style="font-size: 18px;" ><?php echo $row_binh_luan['ho_ten']?> <small><em>Bình luận lúc <?php echo $row_binh_luan['thoi_gian_tao']?> <?php echo $row_binh_luan['ngay_tao']?></em></small></h4>
		<?php echo $row_binh_luan['noi_dung_binh_luan']?>
		
	</div>
</div> 
<?php
}
?>