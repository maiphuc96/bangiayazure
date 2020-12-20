<?php
	include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/baocao/baocao.php";
	include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
?>



<?php
	 if (isset($_GET['thang']))
	 	$thang=$_GET['thang'];
	 if (isset($_GET['nam']))
	 	$nam=$_GET['nam'];
	 settype($thang, 'int');
	 settype($nam, 'int');
	 echo '<a  style="font-size: 16px;" href="index.php?p=xuatbaocao&thang=';echo $thang;echo '&nam=';echo $nam;echo '"> Xem báo cáo trước khi xuất excel</a>';
 ?>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped" >
	<thead>
		<tr id="tieude_ds_sp">
			<th id="baocao">ID</th>
			<th id="baocao">Tên sản phẩm</th>
			<th id="baocao">Ngày</th>
			<th id="baocao">Số lượng</th>
			<th id="baocao">Doanh thu</th>
		</tr>
	</thead>

	<tbody>
		<?php

	 if (isset($_GET['thang']))
	 	$thang=$_GET['thang'];
	 if (isset($_GET['nam']))
	 	$nam=$_GET['nam'];
	 settype($thang, 'int');
	 settype($nam, 'int');
	 echo'<input type="hidden" name="nam" value="';echo $nam;echo'">
	<input type="hidden" name="thang" value="';echo $thang;echo'">';
	 $ds_nam = loadBaoCao($thang,$nam);
	 $tongdoanhthu=0;
	 while ($row_ds=mysql_fetch_array($ds_nam)) {
	echo'	<tr>

				<td id="baocao">';echo $row_ds['id_bao_cao'];echo'</td>
				<td id="baocao">';echo $row_ds['ten_san_pham'];echo'</td>
				<td id="baocao">';echo $row_ds['ngay'];echo'</td>
				<td id="baocao">';echo $row_ds['so_luong'];echo'</td>
				<td id="baocao">';echo number_format($row_ds['doanh_thu']);echo'đ</td>
			</tr>';

		$tongdoanhthu=$tongdoanhthu+$row_ds['doanh_thu'];
	 }
	echo'	<tr>

				<td id="baocao">';echo'</td>
				<td id="baocao">';echo'</td>
				<td id="baocao">';echo'</td>
				<td id="baocao">';echo 'Tổng doanh thu ';echo '</td>
				<td id="baocao">';echo number_format($tongdoanhthu); echo'đ</td>
			</tr>';
			echo'<input type="hidden" name="total" class="btn btn-success" value="';echo $tongdoanhthu;echo'" />';

	?>
	
	</tbody>
</table>
</div>

			



