<?php
	//don hang da giao dich 
	function dsDonHangDaGiaoDich(){
		$qr="SELECT * FROM donhang WHERE donhang.trang_thai='da_giao_dich' ORDER BY donhang.id_don_hang DESC";
		return mysql_query($qr);
	}

	//thong tin don hang
	function ttDonHangDGD($idDonHang){
		$qr="SELECT * FROM `donhang` WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//chi tiet don hang
	function chitietDHNDDGD($idDonHang){
		$qr="SELECT * FROM donhang dh,chitietdonhang ct,sanpham sp 
		WHERE dh.id_don_hang = ct.id_don_hang AND 
		dh.id_don_hang=$idDonHang and 
		sp.id_san_pham = ct.id_san_pham";
		return mysql_query($qr);
	}

	//thong tin cua don hang
	function DHDGD($idDonHang){
		$qr="SELECT * FROM `donhang` WHERE `id_don_hang`=$idDonHang";
	
		return mysql_query($qr);
	}
?>