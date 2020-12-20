
<!--Hien thi binh luan-->
<div class="category-tab shop-details-tab" style="margin-right: 0px;"><!--category-tab-->
	<div class="col-sm-12" style="text-align: center;font-size: 20px;text-transform: uppercase;background-color: #fe980f;color: white;padding-top: 10px;padding-bottom: 10px;width: 100%;">
		Bình luận
	</div>
	<?php
  if(isset($_SESSION['username']))
    $taikhoan=$_SESSION['username'];
  $binhluan = hienthiBinhLuan($taikhoan);
  while ($row_binhluan=mysql_fetch_array($binhluan)) {
?>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="phanhoi">
			<div class="media" style="margin-top: 10px;float: left;">
				<div class="media-left" >
					<a href="#">

						<img class="media-object" src="../images/avatar/<?php echo$row_binhluan['anh_nguoi_dung'];?>" alt="...">
					</a>

				</div>
				<div class="media-body">
					

					<h4><a href="../index.php?p=chitietsanpham&idSanPham=<?php echo $row_binhluan['id_san_pham']?>"><?php echo$row_binhluan['ten_san_pham'];?></a></h4>

					

					<h4 class="media-heading" style="font-size: 16px;"><small><em> Bình luận lúc <?php echo$row_binhluan['thoi_gian_tao'];?> <?php echo$row_binhluan['ngay_tao'];?></em></small></h4>
					<?php echo$row_binhluan['noi_dung_binh_luan'];?>
					<div style="margin-top: 13px">
					<form action="" method="post">
						<input type="hidden" name="idbl" value="<?php echo$row_binhluan['id_binh_luan'];?>">
						<button type="submit" class="btn btn-default pull-right" id="btnXoa" style="margin-left: 10px;height: 33px;color: white;border-radius: unset;background-color: #fe980f;" onclick="return confirm('Bạn chắc chắn xóa bình luận này?')" name="btn_xoa">Xóa</button>
					</form>
					<div ><a class="btn icon-btn btn-primary pull-right" href="index.php?p=quanlibinhluansua&idbl=<?php echo $row_binhluan['id_binh_luan'];?>" data-toggle="modal">
						<span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Sửa</a>
 					</div>
			        </div
					
				</div>
			</div> 

		</div>
	</div>
</div>
<?php
}
?>

<?php
	if (isset($_POST['btn_xoa'])){
		$idbl=$_POST['idbl'];
		if (deleteBinhLuan($idbl))
		{
			echo "<script> alert('Xóa bình luận thành công.');</script>";
            echo "<script> location.replace('index.php?p=quanlibinhluan'); </script>";
            exit;
		}
		else{
			echo "<script> alert('Thao tác thất bại.');</script>";
            echo "<script> location.replace('index.php?p=quanlibinhluan'); </script>";
            exit;
		}
	}
?>








