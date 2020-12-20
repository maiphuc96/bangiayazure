<?php
	//lay noi dung lien he
	function layNoiDungLienHe()
	{
		$qr="SELECT noi_dung_thong_tin_lien_he FROM  thongtinlienhe  WHERE id=1";
		return mysql_query($qr);
	}

	//Cap nhat noi dung lien he
	function cnNoiDungLienHe($noidung)
	{
		$qr="UPDATE thongtinlienhe SET noi_dung_thong_tin_lien_he='$noidung' WHERE id=1";
		return mysql_query($qr);
	}

	//lay thong tin lien he cua khach hang
	function thongtinLienHeKH(){
		$qr="SELECT * FROM lienhe order by id_lien_he desc";
		return mysql_query($qr);
	}

	//Phan hoi lai y kien cua khach hang
	function phanhoiLienHeKH($id){
		$qr="SELECT * FROM lienhe WHERE id_lien_he=$id";
		return mysql_query($qr);
	}

	//Xoa phan hoi cua khach hang
	function xoaphanhoiLienHeKH($id){
		$qr="DELETE FROM lienhe WHERE id_lien_he=$id";
		return mysql_query($qr);
	}
?>