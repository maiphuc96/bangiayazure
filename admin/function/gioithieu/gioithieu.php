<?php
	//Cap nhat noi dung phan logo trang chu
	function cnlogoTrangChu($noidung)
	{
		$qr="UPDATE gioithieu SET logo_trang_chu='$noidung' WHERE id_gioi_thieu=1";
		return mysql_query($qr);
	}

	//Lay noi dung logo trang chu
	function layNoiDunglogoTrangChu()
	{
		$qr="SELECT logo_trang_chu FROM  gioithieu  WHERE id_gioi_thieu=1";
		return mysql_query($qr);
	}

	//Lay noi dung gioi thieu trang chu
	function layNoiDungGioiThieuTrangChu()
	{
		$qr="SELECT trang_chu FROM  gioithieu  WHERE id_gioi_thieu=1";
		return mysql_query($qr);
	}

	//Cap nhat gioi thieu trang chu
	function cnGioiThieuTrangChu($noidung)
	{
		$qr="UPDATE gioithieu SET trang_chu='$noidung' WHERE id_gioi_thieu=1";
		return mysql_query($qr);
	}


	//lay noi dung gioi thieu trang con
	function layNoiDungGioiThieuTrangCon()
	{
		$qr="SELECT trang_con FROM  gioithieu  WHERE id_gioi_thieu=1";
		return mysql_query($qr);
	}

	//Cap nhat gioi thieu trang con
	function cnGioiThieuTrangCon($noidung)
	{
		$qr="UPDATE gioithieu SET trang_con='$noidung' WHERE id_gioi_thieu=1";
		return mysql_query($qr);
	}


?>