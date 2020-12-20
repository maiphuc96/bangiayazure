 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/sukien/giamgia.php";
 include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";


?>

<?php 
	$idsp=$_GET['idspchuaKM'];
	settype($idsp, 'int');
	if ($idsp!=-1){
		$gia = layGiaBD($idsp);
		while ($row_gia=mysql_fetch_assoc($gia)) {
			$gia_bd=$row_gia['gia_ban_dau'];
		}

		echo '<label id="nomal_lable">Giá ban đầu(vnđ). </label>
		<input style="height: 35px;width: 95%" type="text"  name="txtGiaBD" readonly id="nomal_lable" value="';
		echo $gia_bd;echo'">';
	
	}
	
	
?>
