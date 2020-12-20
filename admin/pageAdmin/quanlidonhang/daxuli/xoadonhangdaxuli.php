 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlidonhang/donhangdaxuli.php";
?>
<?php
if (isset($_GET['iddh'])){
	$iddh=$_GET['iddh'];
	settype($iddh, 'int');
}

if (xoaDonHangDXL($iddh)){
	xoaCTDonHangDXL($iddh);
	echo "<script> alert('Xóa đơn hàng thành công.');</script>";
    echo "<script>location.replace('index.php?p=donhangdaxuli');</script>";
    
    echo '<meta http-equiv="refresh" content="0">';
}
else{
	echo "<script> alert('Thao tác thất bại.');</script>";
	echo "<script>location.replace('index.php?p=donhangdaxuli');</script>";
    
    echo '<meta http-equiv="refresh" content="0">';
}

?>
