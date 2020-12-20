<?php
	function layDSAdmin(){
		$qr="SELECT nguoidung.id_nguoi_dung,nguoidung.tai_khoan,nguoidung.ho_ten,nguoidung.gioi_tinh,nguoidung.so_dien_thoai,nguoidung.level,nguoidung.dia_chi FROM nguoidung where nguoidung.level=1";
		return mysql_query($qr);
	}

	function layDSAdminVIP(){
		$qr="SELECT nguoidung.id_nguoi_dung,nguoidung.tai_khoan,nguoidung.ho_ten,nguoidung.gioi_tinh,nguoidung.so_dien_thoai,nguoidung.level,nguoidung.dia_chi FROM nguoidung where nguoidung.level=2";
		return mysql_query($qr);
	}

	//Kiem tra tai khoan nguoi dung
	function checkTaiKhoanAdd($email){
		$qr="
			SELECT COUNT(*) AS ok FROM `nguoidung` WHERE tai_khoan='$email'
		";
		return mysql_query($qr);
	}


?>