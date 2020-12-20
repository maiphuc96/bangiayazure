 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlidonhang/donhangdaxuli.php";
?>

<?php
if (isset($_SESSION['username'])){
	if (isset($_GET['iddh'])){
		$idDonHang=$_GET['iddh'];
		xoaCTDonHangDXL($idDonHang);
		//xoaDH($idDonHang);

		//Thuong ham se tra ve boolean chu khong tra ve resource nen dung nhu nay de tranh bao loi expect 1 param..
		if (xoaDonHangDXL($idDonHang))
		{
			echo "<script> alert('Đơn hàng đã được xóa thành công');</script>";
			echo "<script> location.replace('index.php?p=donhangdaxulichitiet'); </script>";
        	exit;
		}
	}
	else{
			echo "<script> alert('Thao tác thất bại');</script>";
		  echo "<script> location.replace('index.php?p=donhangdaxulichitiet'); </script>";
        exit;
	}
}
?>
