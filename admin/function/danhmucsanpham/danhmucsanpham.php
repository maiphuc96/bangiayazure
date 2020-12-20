<?php
	//xoa loai san pham
	function dsLoaiSPct()
	{
		$qr="SELECT * FROM loaisanpham";
		return mysql_query($qr);
	}

	//danh sach san pham theo loai
	function dsSP($idloai)
	{
		$qr="SELECT * FROM sanpham WHERE id_loai_san_pham=$idloai ORDER BY id_san_pham DESC";
		return mysql_query($qr);
	}

	//danh sach san pham theo loai : So luong mua
	function dsSPSLM($idloai,$var)
	{
		$qr="SELECT * FROM sanpham WHERE id_loai_san_pham=$idloai ORDER BY so_luot_mua $var";
		return mysql_query($qr);
	}

	//danh sach san pham theo loai : So luong san pham
	function dsSPSLSP($idloai,$var)
	{
		$qr="SELECT * FROM sanpham WHERE id_loai_san_pham=$idloai ORDER BY so_luong $var";
		return mysql_query($qr);
	}

	//Kiem tra ton tai san pham theo loai
	function checkSP($tensp,$idloaisp,$size)
	{
		 $qr="SELECT COUNT(*) as num FROM sanpham WHERE ten_san_pham='$tensp' AND id_loai_san_pham=$idloaisp and size=$size";
		return mysql_query($qr);
	}

	//them san pham moi
	function themSP($tensp,$idloai,$hinhanh,$thongtin,$kinhdoanh,$giaBD,$size,$soluong)
	{
		 $qr="INSERT INTO `sanpham` (`id_san_pham`, `ten_san_pham`, `id_loai_san_pham`, `anh_san_pham`, `thong_tin`, `san_pham_khuyen_mai`, `kinh_doanh`, `gia_ban_dau`, `gia_khuyen_mai`, `ngay_dang`, `size`, `so_luong`, `so_luot_mua`) VALUES (NULL, '$tensp', '$idloai', '$hinhanh', '$thongtin', '0', '$kinhdoanh', '$giaBD', '', CURDATE(), '$size', '$soluong', '0');";
		
		return mysql_query($qr);
	}
	
	//kiem tra xem san pham do co trong chi tiet don hang hay khong
	function checkXoaSPCTDH($idsp)
	{
		$qr="SELECT COUNT(*) as num FROM chitietdonhang WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}
	
	//kiem tra xem san pham do co trong bao cao hay khong
	function checkXoaSPBaoCao($idsp)
	{
		$qr="SELECT COUNT(*) as num FROM baocao WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}
	
	//Xoa cac binh luan cua san pham bi xoa(neu san pham khong co trong chi tiet don hang)
	function XoaBLSP($idsp)
	{
		$qr="DELETE FROM binhluan WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}

	//Xoa san pham theo id
	function XoaSP($idsp)
	{
		$qr="DELETE FROM sanpham WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}


	//chi tiet cua san pham theo idsp
	function chitietSPbyID($idsp)
	{
		$qr="SELECT * FROM sanpham WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}

	//chi tiet cua san pham theo idsp
	function LoaiSPbyID($idsp)
	{
		$qr="SELECT id_loai_san_pham FROM sanpham WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}
	
	//doi ten anh sau khi upload
	function doitenAnh($idsp,$tenanh)
	{
		$qr="UPDATE sanpham SET anh_san_pham='$tenanh' WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}


	//Cap nhat thong tin cho san pham
	function capnhatSP($ten,$loai,$kinhdoanh,$gia,$size,$soluong,$thongtin,$idsp)
	{
		$qr="UPDATE sanpham SET ten_san_pham='$ten',id_loai_san_pham=$loai,kinh_doanh=$kinhdoanh,gia_ban_dau=$gia,size=$size,so_luong=$soluong,thong_tin='$thongtin' WHERE id_san_pham=$idsp";
		return mysql_query($qr);
	}


?>