 <?php
	 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/baocao/baocao.php";
	 include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
	 if (isset($_GET['thang']))
	 	$thang=$_GET['thang'];
	 settype($thang, 'int');

	 $ds_nam = loadNamByThang($thang);
	 while ($row_ds=mysql_fetch_array($ds_nam)) {
		echo '<select class="form-control" id="nam" name="opNam">
				<option value="';
				echo $row_ds['nam'];echo'">';echo $row_ds['nam'];echo '</option>
			</select';
	 }

?>
