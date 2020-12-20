 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlidonhang/donhangdagiaodich.php";
?>


<div style="text-transform: uppercase; width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">
	Danh sách đơn hàng đã giao dịch
</div>

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr id="tieude_ds_sp">
				<th id="tieude">ID</th>
				<th id="tieude">Ngày đặt hàng</th>
				<th id="tieude">Khách hàng</th>
				<th id="tieude">Số điện thoại</th>
				<th id="tieude">Email</th>
				<th id="tieude">Tổng tiền</th>
				<th id="tieude">Action</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$dsDonHang=dsDonHangDaGiaoDich();
			while ($row_dsDonHang=mysql_fetch_array($dsDonHang)) {
				
			?>
					<tr>
						<td id="tieude"><?php echo $row_dsDonHang['id_don_hang'];?></td>
						<td id="tieude"><?php echo $row_dsDonHang['ngay_dat_hang'];?></td>
						<td id="tieude"><?php echo $row_dsDonHang['ten_khach_hang'];?></td>
						<td id="tieude"><?php echo $row_dsDonHang['so_dien_thoai_khach_hang'];?></td>
						<td id="tieude"><?php echo $row_dsDonHang['email_khach_hang'];?></td>
						<td id="tieude"><?php echo number_format($row_dsDonHang['tong_tien']);?>đ</td>
					

					<td id="tieude">
						<button id="btn_chitiet" type="button" class="btn btn-sm btn-warning" style="
						margin-bottom: 10px;margin-left: 10px;
						"><a id="a_off_tag_link" href="index.php?p=donhandagiaodichchitiet&iddh=<?php echo $row_dsDonHang['id_don_hang'];?>" style="text-decoration:none; color:white;"> Chi tiết </a></button>
					<!-- href="index.php?p=suasanphamy&amp;idsp=21" -->
						
					</td>
					</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
