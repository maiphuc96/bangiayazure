<?php
	//hien thi tat ca cac loai san pham
	function mnSanPhamTrangChuND() {
		$qr ="SELECT * FROM loaisanpham";
		return mysql_query($qr);
	}

	//thong tin cua nguoi dung
	function thongtinNguoiDung($taikhoan){
		$qr="SELECT * FROM `nguoidung` WHERE tai_khoan='$taikhoan'";
		return mysql_query($qr);
	}

	//hien thi tat ca cac binh luan cua nguoi dung
	function hienthiBinhLuan($taikhoan){
		$qr="SELECT * from binhluan bl, nguoidung nd,sanpham sp 
		WHERE bl.id_nguoi_dung=nd.id_nguoi_dung and sp.id_san_pham = bl.id_san_pham and 
		nd.tai_khoan='$taikhoan'";
		return mysql_query($qr);
	}

	//hien thi binh luan theo id binh luan
	function hienthiBinhLuanID($idbl){
		$qr="SELECT * FROM binhluan WHERE id_binh_luan=$idbl";
		return mysql_query($qr);
	}

	//Cap nhat binh luan theo id
	function capnhatBinhLuanID($idbl,$noidung){
		$qr="UPDATE binhluan SET noi_dung_binh_luan='$noidung',ngay_tao=CURDATE(),thoi_gian_tao=CURTIME() WHERE id_binh_luan=$idbl";
		return mysql_query($qr);
	}


	//thong tin nguoi mua nguoi nhan cua tung don hang
	function ttDonHang($taikhoan,$idDonHang){
		$qr="SELECT * FROM donhang dh
		WHERE dh.tai_khoan='$taikhoan' and
		dh.id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//danh sach cac don hang cua nguoi dung(da dang nhap)
	function dsDonHangNguoiDung($taikhoan){
		$qr="SELECT * from donhang dh, nguoidung nd 
			WHERE nd.tai_khoan=dh.tai_khoan  AND 
			nd.tai_khoan='$taikhoan' order by id_don_hang desc";
		return mysql_query($qr);
	}

	//hien thi cac san pham trong don hang cua nguoi dung
	function chitietDonHangNguoiDung($idDonHang){
		$qr="SELECT * FROM donhang dh,chitietdonhang ct,sanpham sp 
		WHERE dh.id_don_hang = ct.id_don_hang AND 
		dh.id_don_hang=$idDonHang and 
		sp.id_san_pham = ct.id_san_pham";
		return mysql_query($qr);
	}

	//hien thi trang thai cua don hang
	function trangthaiDonHang($taikhoan,$idDonHang){
		$qr="SELECT trang_thai FROM donhang 
		WHERE id_don_hang=$idDonHang and 
		tai_khoan='$taikhoan'";
		return mysql_query($qr);
	}

	//thong tin cua don hang
	function donHang($idDonHang){
		$qr="SELECT * FROM `donhang` WHERE `id_don_hang`=$idDonHang";
		return mysql_query($qr);
	}

	//xoa san pham trong don hang, trang thai : dang_cho
	function xoaSPDH($idDonHang,$idSP){
		$qr="DELETE FROM chitietdonhang WHERE id_don_hang=$idDonHang and id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//Dem so luong san pham cua don hang
	function countSP($idDonHang){
		$qr="SELECT COUNT(*) as so_san_pham FROM chitietdonhang WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//Cap nhat lai so tien cua don hang
	function capnhatDonHang($idDonHang){
		$qr="UPDATE donhang SET thue_GTGT=(SELECT SUM(thanh_tien)*0.1 FROM chitietdonhang WHERE id_don_hang=$idDonHang),tong_tien=(SELECT SUM(thanh_tien)*1.1 FROM chitietdonhang WHERE id_don_hang=$idDonHang) WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//Cap nhat lai so luong san pham
	function capnhatSoLuongSPctdh($idDonHang,$idSP,$sl){
	 $qr="UPDATE chitietdonhang SET ctdh_so_luong=$sl WHERE id_don_hang=$idDonHang AND id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//Cap nhat thanh tien cua san pham
	function capnhatthanhtienctdh($idDonHang,$idSP){
		$qr="UPDATE chitietdonhang SET thanh_tien=ctdh_so_luong*gia_dat_hang WHERE id_don_hang=$idDonHang AND id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//xoa chi tiet don hang
	function xoachitietDH($idDonHang){
		$qr="DELETE FROM chitietdonhang WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//xoa don hang
	function xoaDH($idDonHang){
		$qr="DELETE FROM donhang WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//Cap nhat thong tin nguoi mua, nguoi nhan
	function capnhatThongTin($idDonHang,$hotenKH,$emailKH,$sdtKH,$dchiKH,$hotenNN,$emailNN,$sdtNN,$dchiNN){
		$qr="UPDATE donhang SET ten_khach_hang='$hotenKH',email_khach_hang='$emailKH',so_dien_thoai_khach_hang='$sdtKH',dia_chi_khach_hang='$dchiKH',ten_nguoi_nhan='$hotenNN',email_nguoi_nhan='$emailNN',so_dien_thoai_nguoi_nhan='$sdtNN',dia_chi_nguoi_nhan='$dchiNN' WHERE id_don_hang=$idDonHang";

		return mysql_query($qr);

	}
	

	//Dem so binh luan cua user
	function demBL($taikhoan){
		$qr="SELECT COUNT(*) as sobl FROM binhluan WHERE id_nguoi_dung=(SELECT id_nguoi_dung FROM nguoidung WHERE tai_khoan='$taikhoan')";
		return mysql_query($qr);
	}

	//Dem so don hang cua khach hang
	function demDH($taikhoan){
		$qr="SELECT COUNT(*) as sodh FROM donhang WHERE tai_khoan='$taikhoan'";
		return mysql_query($qr);
	}

	//Doi ten anh nguoi dung
	function doitenAnh($taikhoan,$tenanh){
		$qr="UPDATE nguoidung SET anh_nguoi_dung='$tenanh' WHERE tai_khoan='$taikhoan'";
		return mysql_query($qr);
	}

	//Kiem tra mat khau nguoi dung(truoc khi doi mat khau)
	function checkMatKhauCu($taikhoan,$mkCu)
	{
		$qr="select COUNT(*) as number FROM nguoidung WHERE tai_khoan='$taikhoan' and mat_khau='$mkCu'";
		return mysql_query($qr);

	}

	//Cap nhat mat khau moi
	function updateMatKhauMoi($taikhoan,$mkMoi)
	{
		$qr="UPDATE nguoidung SET mat_khau='$mkMoi' WHERE tai_khoan='$taikhoan'";
		return mysql_query($qr);

	}

	//Cap nhat thong tin ca nhan moi cho nguoi dung
	function updateThongTin($taikhoan,$ten,$gioitinh,$sdt,$diachi){
		$qr="UPDATE nguoidung SET ho_ten='$ten',so_dien_thoai=$sdt,gioi_tinh=$gioitinh,dia_chi='$diachi' WHERE tai_khoan='$taikhoan'";
		return mysql_query($qr);
	}

	//Xoa binh luan theo id binh luan
	
	function deleteBinhLuan($idbl){
		$qr="DELETE FROM binhluan WHERE id_binh_luan=$idbl";
		return mysql_query($qr);
	}


?>
