<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/thongke/thongke.php";
 include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
?>

<div class="row"><label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">Bình luận</label></div>

<link rel="stylesheet" href="css/danhsachloaisanpham.css">
  

<div class="row" >
 	<div class="col-sm-12 table-responsive" style="margin-top: 12px;padding-right: 0px;padding-left: 0px;">
 		<table class="table table-bordered table-hover table-striped">
 			<thead>
 				<tr >
 					<th id="tieude">#ID</th>
 					<th id="tieude">Tên sản phẩm</th>
 					<th id="tieude">Size</th>
 					<th id="tieude">Số bình luận</th>
 				</tr>
 			</thead>
 			<tbody>
			<?php
			$ds=hienthiSPBL();
			while ($row_ds=mysql_fetch_array($ds)) {
			?>
 				<tr>
 					<td id="tieude"><?php echo $row_ds['id_san_pham']?></td>
 					<td id="tieude"><a href="../index.php?p=chitietsanpham&idSanPham=<?php echo $row_ds['id_san_pham']?>"><?php echo $row_ds['ten_san_pham']?></a></td>
 					<td id="tieude"><?php echo $row_ds['size']?></td>
					<td id="tieude"><?php
					$so_bl=soBLSP($row_ds['id_san_pham']);
					$row_bl= mysql_fetch_assoc($so_bl);
					$sobinhluan=$row_bl['num'];
					echo $sobinhluan;
					?></td>
 				</tr>
			<?php
			}
			?>
 			</tbody>
 		</table>
 	</div>
 </div>
