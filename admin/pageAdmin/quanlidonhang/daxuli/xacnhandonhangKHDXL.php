 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlidonhang/donhangdaxuli.php";
?>
<?php
if (isset($_GET['iddh'])){
	$iddh=$_GET['iddh'];
	settype($iddh, 'int');
}

$ds_sp_dh = chitietDHNDDXL($iddh);
while ($row_ds_sp_dh=mysql_fetch_array($ds_sp_dh)) {
	$idsp=$row_ds_sp_dh['id_san_pham'];
	$ten=$row_ds_sp_dh['ten_san_pham'];
	$ngay=$row_ds_sp_dh['ngay_dat_hang'];
	$soluong=$row_ds_sp_dh['ctdh_so_luong'];
	$doanhthu=$row_ds_sp_dh['thanh_tien'];
	capnhatSoLuongSP($idsp,$soluong);
	capnhatSoLuotMuaSP($idsp);
	taoBaoCao($idsp,$ten,$ngay,$soluong,$doanhthu);
}


if (giaodichthanhtoan($iddh)){

	echo "<script> alert('Giao dịch thành công.');</script>";
    echo "<script>location.replace('index.php?p=donhangdaxuli');</script>";    
    echo '<meta http-equiv="refresh" content="0">';
}
else{

	echo "<script> alert('Thao tác thất bại.');</script>";
	echo "<script>location.replace('index.php?p=donhangdaxuli');</script>";
    
    echo '<meta http-equiv="refresh" content="0">';
}

?>
