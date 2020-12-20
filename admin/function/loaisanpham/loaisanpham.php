<?php
	
	//lay danh sach cac loai san pham
	function dsLoaiSP()
	{
		$qr="SELECT * FROM loaisanpham";
		return mysql_query($qr);
	}


	//chi tiet loai san pham
	function chitietLoaiSP($idloai)
	{
		$qr="SELECT * FROM loaisanpham where id_loai_san_pham=$idloai";
		return mysql_query($qr);
	}

	//cap nhat ten loai san pham
	function capnhatLoaiSP($idloai,$tenloai,$nguoicapnhat)
	{
		$qr="UPDATE loaisanpham SET ten_loai_san_pham='$tenloai',ngay_cap_nhat=CURRENT_DATE(),nguoi_cap_nhat='$nguoicapnhat' WHERE id_loai_san_pham=$idloai";
		return mysql_query($qr);
	}

	//lay ten nguoi cap nhat loai san pham
	function tenNguoiThaoTac($nguoithaotac)
	{
		$qr="SELECT ho_ten FROM nguoidung WHERE tai_khoan='$nguoithaotac'";
		return mysql_query($qr);
	}

	//them loai san pham moi
	function themLoaiSP($tenloai,$ten)
	{
		$qr="INSERT INTO `loaisanpham` (`id_loai_san_pham`, `ten_loai_san_pham`, `ngay_tao`, `nguoi_tao`, `ngay_cap_nhat`, `nguoi_cap_nhat`) VALUES (NULL, '$tenloai', CURRENT_DATE(), '$ten', CURRENT_DATE(), 'Chưa cập nhật')";
		return mysql_query($qr);
	}

	//Kiem tra ten loai san pham da co hay chua
	function checkTen($ten)
	{
		$qr="SELECT COUNT(*) as num FROM loaisanpham WHERE ten_loai_san_pham='$ten'";
		return mysql_query($qr);
	}

	//xoa loai san pham
	function xoaLoai($idloai)
	{
		$qr="DELETE FROM loaisanpham WHERE id_loai_san_pham=$idloai";
		return mysql_query($qr);
	}

	//Kiem tra loai san pham do da duoc dung hay chua, neu co thi khong duoc xoa
	function checkLoaiSP($idloai)
	{
		$qr="SELECT COUNT(*) as num FROM `sanpham` WHERE `id_loai_san_pham`=$idloai";
		return mysql_query($qr);
	}


?>