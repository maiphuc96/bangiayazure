<?php

	//huy bo don hang cua khach: Khong dang nhap
	if (isset($_SESSION['code'])){
	if (isset($_GET['iddh'])){
		$idDonHang=$_GET['iddh'];
		tracuuxoachitietDH($idDonHang);
		//xoaDH($idDonHang);

		//Thuong ham se tra ve boolean chu khong tra ve resource nen dung nhu nay de tranh bao loi expect 1 param..
		if (tracuuxoaDH($idDonHang))
		{
			echo "<script> alert('Đơn hàng đã được xóa thành công');</script>";
			unset($_SESSION['code']);
			echo "<script> location.replace('index.php?p=tracuudonhang'); </script>";
        	exit;
		}
		
       
	}
	else{
		  echo "<script> location.replace('index.php'); </script>";
        exit;
	}
}

?>