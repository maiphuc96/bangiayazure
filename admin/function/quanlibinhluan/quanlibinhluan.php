<?php 
	function layDSBinhLuan(){
		$qr="SELECT binhluan.id_binh_luan,sanpham.id_san_pham,sanpham.ten_san_pham,nguoidung.tai_khoan,binhluan.noi_dung_binh_luan,binhluan.thoi_gian_tao,binhluan.ngay_tao FROM nguoidung,binhluan,sanpham WHERE nguoidung.id_nguoi_dung=binhluan.id_nguoi_dung and binhluan.id_san_pham=sanpham.id_san_pham";
		return mysql_query($qr);
	}
?>