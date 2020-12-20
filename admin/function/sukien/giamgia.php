<?php
	//hien thi danh sach san pham dang duoc khuyen mai
	function layDSGiamGia(){
		$qr="SELECT DISTINCT(sanpham.id_san_pham),loaisanpham.ten_loai_san_pham ,sanpham.ten_san_pham,sanpham.id_loai_san_pham,sanpham.anh_san_pham,sanpham.thong_tin,sanpham.kinh_doanh,sanpham.gia_ban_dau,sanpham.gia_khuyen_mai FROM sanpham, loaisanpham WHERE sanpham.id_loai_san_pham=loaisanpham.id_loai_san_pham and sanpham.san_pham_khuyen_mai=1 ORDER by thoi_gian_cap_nhat_KM DESC";
		return mysql_query($qr);
	}

	//hien thi danh sach san pham chua khuyen mai
	function layDSSPChuaKM(){
		$qr="SELECT sanpham.id_san_pham FROM sanpham WHERE sanpham.san_pham_khuyen_mai=0";
		return mysql_query($qr);
	}

	//lay gia ban dau cua san pham
	function layGiaBD($idsp){
		 $qr="SELECT * FROM sanpham WHERE sanpham.id_san_pham=$idsp";
		return mysql_query($qr);
	}

	//cap nhap gia khuyen mai
	function capnhatKhuyenMai($idsp,$giaKM){
		 $qr="UPDATE sanpham SET gia_khuyen_mai=$giaKM,san_pham_khuyen_mai=1,thoi_gian_cap_nhat_KM=now() WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}

	//Xoa giam gia san pham
	function xoaKhuyenMai($idsp){
		 $qr="UPDATE sanpham SET san_pham_khuyen_mai=0 WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}


?>