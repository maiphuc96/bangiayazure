 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/sukien/giamgia.php";
 include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";


?>
<div class="modal-content">
		<div class="modal-header" style="border: 1px solid;
		    background-color: #fe980f;">
		   
		    <h4 class="modal-title"  style="text-align: center;font-size: 32px;color: #fff;"> CẬP NHẬT GIÁ KHUYẾN MÃI</h4>
		</div>
		<form action="" method="post">
			<div class="modal-body" >
			    <div class="container-fluid">
			          	<?php 
			          	$idsp=$_GET['idsp'];
			          	$tt=layGiaBD($idsp);
			          	$row_tt = mysql_fetch_assoc($tt);
			          	{
			          	?>
							<div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-2">
								<div class="form-group">			                      
		                        	<label id="nomal_lable">ID sản phẩm </label><br>
		                        	<input style="border: 1px solid;width: 100%" type="text" readonly  id="nomal_lable" value="<?php echo $row_tt['id_san_pham']?>" name="idsp">			                    
			                     </div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-3">
								<div class="form-group">                 
			                        <label id="nomal_lable">Giá ban đầu </label><br>
									<input style="border: 1px solid;width: 100%" type="text" readonly  id="nomal_lable" value="<?php echo $row_tt['gia_ban_dau']?>" name="txtGiaBD">
			                    </div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-3">
								<div class="form-group">			                       
			                    	<label id="nomal_lable">Giá khuyến mãi </label><br>
									<input  style="border: 1px solid;width: 100%" type="text"  value="<?php echo $row_tt['gia_khuyen_mai']?>" placeholder="Nhập giá khuyến mãi"  id="nomal_lable" name="txtGiaKM">			                      
			                     </div>
							</div>
			            <?php
			         	}
			            ?>   
			    </div>
			</div>

		
			<div class="col-xs-12 col-sm-6">
				<button style="width: 100%;margin-top: 5px;" type="submit" name="btn_CapNhat" class="btn btn-lg btn-info"> Cập nhật <span class="fas fa-save"></span></button>
			</div>

			<div class="col-xs-12 col-sm-6">
				<button style="width: 100%;margin-top: 5px;"  type="submit" data-dismiss="modal" class="btn btn-lg btn-default" onclick="return confirm('Bạn có muốn hủy việc cập nhật?')" name="btn_huy"> Hủy <span class="fas fa-trash-alt"></span></button>
			</div>

		</form>	
</div>

<?php
if (isset($_POST['btn_huy'])){
	
	echo "<script> location.replace('index.php?p=giamgia'); </script>";	
	echo '<meta http-equiv="refresh" content="0" />';
}
?>

<?php
	
	if (isset($_POST['btn_CapNhat'])){
		$id=$_POST['idsp'];
		$giaBD=$_POST['txtGiaBD'];
		$giaKM=$_POST['txtGiaKM'];
		settype($giaBD, 'int');
		settype($giaKM, 'int');
		
	
	

		if(($giaKM <= 0 )|| ($giaKM>$giaBD))
		{
			echo "<script> alert('Vui lòng nhập giá hợp lệ(Giá khuyến mãi không được bằng hoặc nhỏ hơn 0 hay lớn hơn giá ban đầu).');</script>";
			exit();
	       
		}
		
		if (capnhatKhuyenMai($id,$giaKM)){
			echo "<script> alert('Cập nhật khuyến mãi thành công');</script>";
			echo "<script> location.replace('index.php?p=giamgia'); </script>";
			
			echo '<meta http-equiv="refresh" content="0" />';
		}
		else{
			echo "<script> alert('Thao tác thất bại.');</script>";
			exit();
		}
		
		
	}
	
?>
