<?php
	//hien thi tat ca cac thang trong bao cao
	function loadThang(){
		$qr="select DISTINCT(Month(ngay)) as thang from baocao ORDER by thang ASC";
		return mysql_query($qr);
	}

	//hien thi tat ca cac nam co thang tuong ung
	function loadNamByThang($thang){
		$qr="select DISTINCT(YEAR(ngay)) as nam from baocao WHERE month(ngay)='$thang' ORDER by nam ASC";
		return mysql_query($qr);
	}

	//hien thi chi tiet theo thang va nam
	
	function loadBaoCao($thang,$nam){
		$qr="SELECT * FROM baocao WHERE month(ngay)='$thang' and year(ngay)='$nam'";
		return mysql_query($qr);
	}
?>
