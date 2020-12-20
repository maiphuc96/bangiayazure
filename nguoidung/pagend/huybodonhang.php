<?php
if (isset($_SESSION['username'])){
	if (isset($_GET['iddh'])){
		$idDonHang=$_GET['iddh'];
		xoachitietDH($idDonHang);
		//xoaDH($idDonHang);

		//Thuong ham se tra ve boolean chu khong tra ve resource nen dung nhu nay de tranh bao loi expect 1 param..
		if (xoaDH($idDonHang))
		{
			echo "<script> alert('Đơn hàng đã được xóa thành công');</script>";
			 echo "<script> location.replace('index.php'); </script>";
        	exit;
		}
		
       
	}
	else{
		  echo "<script> location.replace('index.php'); </script>";
        exit;
	}
}
?>