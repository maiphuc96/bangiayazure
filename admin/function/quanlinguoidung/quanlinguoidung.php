<?php
	function layDSNguoiDung(){
		$qr="SELECT nguoidung.id_nguoi_dung,nguoidung.tai_khoan,nguoidung.ho_ten,nguoidung.gioi_tinh,nguoidung.so_dien_thoai,nguoidung.level,nguoidung.dia_chi FROM nguoidung where nguoidung.level=0";
		return mysql_query($qr);
	}
?>