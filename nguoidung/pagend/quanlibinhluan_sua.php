<!--Sua binh luan-->

	         <div class="modal-header">
	           
	            <h4 class="modal-title" style="color: white;text-align: center;font-size: 32px;
	            text-transform: uppercase;background-color: #fe980f;padding: 20px;"> Sửa bình luận </h4>
	         </div>
			<form action="" method="post">
	         <div class="modal-body">
	            <div class="container-fluid">
	               <div class="row">
	                  <div class="col-xs-12 col-sm-12 col-md-12">
	                     <div class="form-group">
	                        <div class="input-group" style="width: 100%;">
	                          <?php 
	                          $idbl=$_GET['idbl'];
	                          $binhluan=hienthiBinhLuanID($idbl);
	                          while ($row_bl=mysql_fetch_array($binhluan)) {
	                          ?>
	                           <textarea name="noidungbinhluan" value="<?php echo $row_bl['noi_dung_binh_luan']?>" cols="30" rows="4" required placeholder="Nhập bình luận của bạn "><?php echo $row_bl['noi_dung_binh_luan']?></textarea>
	                        <?php
							}
	                        ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>

	               
	            </div>
	         </div>

	         <div class="modal-footer">
	            <div class="form-group">
	               <button type="submit" name="btn_xacnhan" class="btn btn-lg btn-info"
	               > Xác nhận <span class="glyphicon glyphicon-saved"></span></button>

	               <button type="submit" name="btn_huy" data-dismiss="modal" class="btn btn-lg btn-default" > Hủy <span class="glyphicon glyphicon-remove"></span></button>
	 

			</form>
	      </div>
</div>

<?php
	if (isset($_POST['btn_huy']))
	{
		echo "<script> location.replace('index.php?p=quanlibinhluan'); </script>";
	    exit;
	}

	if (isset($_POST['btn_xacnhan']))
	{
		 $idbl=$_GET['idbl'];
		 $noidung=$_POST['noidungbinhluan'];

		 if (capnhatBinhLuanID($idbl,$noidung))
		 {
		 	echo "<script> alert('Cập nhật bình luận thành công.');</script>";
            echo "<script> location.replace('index.php?p=quanlibinhluan'); </script>";
            exit;
		 }
		 else {
		 	echo "<script> alert('Cập nhật thất bại.');</script>";
            echo "<script> location.replace('index.php?p=quanlibinhluan'); </script>";
            exit;
		 }
	}
?>

