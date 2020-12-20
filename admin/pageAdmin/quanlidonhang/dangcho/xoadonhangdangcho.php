 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlidonhang/donhangdangcho.php";
?>
<?php
if (isset($_GET['iddh'])){
	$iddh=$_GET['iddh'];
	settype($iddh, 'int');
}

if (xoaDonHang($iddh)){
	xoaCTDonHang($iddh);
	echo "<script> alert('Xóa đơn hàng thành công.');</script>";
    echo "<script>location.replace('index.php?p=donhangdangcho');</script>";
    
    echo '<meta http-equiv="refresh" content="0">';
}
else{
	echo "<script> alert('Thao tác thất bại.');</script>";
	echo "<script>location.replace('index.php?p=donhangdangcho');</script>";
    
    echo '<meta http-equiv="refresh" content="0">';
}

?>
