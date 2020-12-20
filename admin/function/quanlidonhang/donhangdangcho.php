<?php
	//hien thi danh sach cac don hang dang o trang thai dang cho
	function dsDonHangDangCho(){
		$qr="SELECT * FROM donhang WHERE donhang.trang_thai='dang_cho' ORDER BY donhang.ngay_dat_hang DESC";
		return mysql_query($qr);
	}

	//xoa don hang  theo id don hang
	function xoaDonHang($iddh){
		$qr="DELETE FROM donhang WHERE id_don_hang=$iddh";
		return mysql_query($qr);
	}

	//xoa chi tiet don hang theo id don hang
	function xoaCTDonHang($iddh){
		$qr="DELETE FROM chitietdonhang WHERE id_don_hang=$iddh";
		return mysql_query($qr);
	}

	//CHI TIET DON HANG DANG CHO
	//thong tin nguoi mua nguoi nhan cua tung don hang
	function ttDonHang($idDonHang){
		$qr="SELECT * FROM `donhang` WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//hien thi cac san pham trong don hang cua nguoi dung
	function chitietDHND($idDonHang){
		$qr="SELECT * FROM donhang dh,chitietdonhang ct,sanpham sp 
		WHERE dh.id_don_hang = ct.id_don_hang AND 
		dh.id_don_hang=$idDonHang and 
		sp.id_san_pham = ct.id_san_pham";
		return mysql_query($qr);
	}

	//thong tin cua don hang
	function DH($idDonHang){
		$qr="SELECT * FROM `donhang` WHERE `id_don_hang`=$idDonHang";
		return mysql_query($qr);
	}

	//Cap nhat lai so luong san pham cho don hang cua khach hang
	function cnchitietsoluong($idDonHang,$idSP,$sl){
	 $qr="UPDATE chitietdonhang SET ctdh_so_luong=$sl WHERE id_don_hang=$idDonHang AND id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//Cap nhat thanh tien cua san pham
	function cnthanhtien($idDonHang,$idSP){
		$qr="UPDATE chitietdonhang SET thanh_tien=ctdh_so_luong*gia_dat_hang WHERE id_don_hang=$idDonHang AND id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//Cap nhat lai so tien cua don hang
	function cnDonHang($idDonHang){
		$qr="UPDATE donhang SET thue_GTGT=(SELECT SUM(thanh_tien)*0.1 FROM chitietdonhang WHERE id_don_hang=$idDonHang),tong_tien=(SELECT SUM(thanh_tien)*1.1 FROM chitietdonhang WHERE id_don_hang=$idDonHang) WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//xoa san pham trong don hang
	function xoaSPKH($idDonHang,$idSP){
		$qr="DELETE FROM chitietdonhang WHERE id_don_hang=$idDonHang and id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//Dem so luong san pham cua don hang
	function countSPKH($idDonHang){
		$qr="SELECT COUNT(*) as so_san_pham FROM chitietdonhang WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}


	//xoa san pham trong don hang
	function capnhatDonHangKH($idDonHang){
		$qr="UPDATE donhang SET trang_thai='da_xu_li' WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

?>