<?php
	//dem so nguoi dung 
	function soNguoiDung(){
		$qr="SELECT COUNT(*) as sl_nd FROM nguoidung WHERE level=0";
		return mysql_query($qr);
	}

	//dem so binh luan
	function soBinhLuan(){
		$qr="SELECT COUNT(*) as sl_bl FROM binhluan";
		return mysql_query($qr);
	}

	//dem so don hang dang cho
	function soDonHangDC(){
		$qr="SELECT COUNT(*) as dh_dc FROM donhang WHERE donhang.trang_thai='dang_cho'";
		return mysql_query($qr);
	}
	
	//dem so don hang da xu li
	function soDonHangDXL(){
		$qr="SELECT COUNT(*) as dh_dxl FROM donhang WHERE donhang.trang_thai='da_xu_li'";
		return mysql_query($qr);
	}

	//dem so don hang da giao dich
	function soDonHangDGD(){
		$qr="SELECT COUNT(*) as dh_dgd FROM donhang WHERE donhang.trang_thai='da_giao_dich'";
		return mysql_query($qr);
	}
	

	//dem so quan tri vien cua he thong
	function soQuanTriVien(){
		$qr="SELECT COUNT(*) as sl FROM nguoidung WHERE nguoidung.level>=1";
		return mysql_query($qr);
	}

	//loai san pham
	function LoaiSP(){
		$qr="SELECT * FROM loaisanpham";
		return mysql_query($qr);
	}

	//dem so san pham theo loai
	function demSPLoaiSP($idloai){
		$qr="SELECT COUNT(*) as sl FROM sanpham WHERE id_loai_san_pham=$idloai";
		return mysql_query($qr);
	}

	//dem so phan hoi cua khach hang
	function demPhanHoi(){
		$qr="SELECT COUNT(*) as sl FROM lienhe";
		return mysql_query($qr);
	}


	//kiem tra quyen hop le : xem chi tiet muc quan tri vien
	function checkQuyen($taikhoan){
		$qr="SELECT COUNT(*) as num FROM nguoidung where nguoidung.level=2 and tai_khoan='$taikhoan'";
		return mysql_query($qr);
	}

	//hien thi san pham co binh luan
	function hienthiSPBL(){
		$qr="SELECT DISTINCT(sanpham.id_san_pham),sanpham.ten_san_pham,sanpham.size FROM binhluan,sanpham WHERE binhluan.id_san_pham=sanpham.id_san_pham order by id_san_pham asc";
		return mysql_query($qr);
	}

	//Dem so binh luan theo san pham
	function soBLSP($idsp){
		$qr="SELECT COUNT(*) as num FROM binhluan WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}
	
	

?>