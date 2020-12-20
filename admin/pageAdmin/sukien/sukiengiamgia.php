 <?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/sukien/giamgia.php";
?>

<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;margin-top: 10px">GIẢM GIÁ</label>
<div><a class="btn icon-btn btn-primary" href="#sukiengiamgiathem" data-toggle="modal"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle" ></span> Giảm giá cho sản phẩm khác</a>

</div>

<div class="table-responsive" style="margin-top: 10px">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr id="tieude_ds_sp">
				<th id="tieude">ID</th>
				<th id="tieude">Tên SP</th>
				<th id="tieude">Loại SP</th>
				<th id="tieude">Ảnh SP</th>
				<th id="tieude">Thông tin</th>					
				<th id="tieude">Trạng thái</th>
				<th id="tieude">Giá BĐ</th>
				<th id="tieude">Giá KM</th>		
				<th id="tieude">Action</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$ds=layDSGiamGia();
			while ($row_ds=mysql_fetch_array($ds)) {
			?>
					<tr>
						<td id="tieude"><?php echo $row_ds['id_san_pham'];?></td>
						<td id="tieude"><?php echo $row_ds['ten_san_pham'];?></td>
						<td id="tieude"><?php echo $row_ds['ten_loai_san_pham'];?></td>
						<td id="tieude"><img class="imglist" src="/images/sanpham/<?php echo $row_ds['anh_san_pham'];?>" style="
							width: 149px;
							height: 150px;
							"></td>
					<td id="tieude"><?php echo $row_ds['thong_tin'];?></td>
					<?php
						if ($row_ds['kinh_doanh']==1)
							echo'<td id="tieude">Đang kinh doanh</td>';
						else{
							echo'<td id="tieude">Chưa kinh doanh</td>';
						}
					?>
					
					<td id="tieude"><?php echo number_format($row_ds['gia_ban_dau']);?>đ</td>
					<td id="tieude"><?php echo number_format($row_ds['gia_khuyen_mai']);?>đ</td>
				
					<td id="tieude">
						<button id="btn_chitiet" type="button" class="btn btn-sm btn-warning" style="
						margin-bottom: 10px;
						"><a id="a_off_tag_link" href="index.php?p=giamgiasua&idsp=<?php echo $row_ds['id_san_pham'];?>" data-toggle="modal" style="text-decoration:none; color:white;"> Sửa </a></button>

					<!-- href="index.php?p=suasanphamy&amp;idsp=21" -->
						<form action="" method="post">
						<input type="hidden" name="idsp" value="<?php echo $row_ds['id_san_pham'];?>">
						<button id="btn_chitiet" name="btn_xoa" type="submit" class="btn btn-sm btn-info" onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi danh sách giảm giá hay không?')"> Xóa </button>
						</form>
					</td>
					</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>



<div class="modal fade" id="sukiengiamgiathem">
   <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: red;">
            <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
            <h4 class="modal-title"  style="text-align: center;font-size: 32px;padding: 12px;color: #fff;"> GIẢM GIÁ CHO SẢN PHẨM MỚI</h4>
        </div>
	<form action="" method="post">
        <div class="modal-body">
            <div class="container-fluid">
				<div class="col-xs-12 col-sm-12 col-md-3">
					<div class="form-group" >                     
                        	<label id="nomal_lable">ID sản phẩm </label>
                        	<select style="margin-bottom: 10px;width: 80%" class="form-control" name="idSanPham" id="idsp" >
                        	<option value="-1" disabled="disabled" selected="selected">#ID</option>
                        	<?php
                        	$ds_sp_chuaKM=layDSSPChuaKM();
                        	while ($row_ds_sp_chuaKM=mysql_fetch_array($ds_sp_chuaKM)) {
                        	?>
						
                              <option value="<?php echo $row_ds_sp_chuaKM['id_san_pham']?>"> <?php echo $row_ds_sp_chuaKM['id_san_pham']?></option>
                              
                            <?php
                        	}
                        	?>                     
                     		</select>                     
                     </div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">                        
                           <div id="giabandau"></div>
                     </div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">                 
                    		<label id="nomal_lable">Giá khuyến mãi(vnđ) </label>
							<input  style="height: 35px;width: 95%" type="number" placeholder="Nhập giá khuyến mãi."  id="nomal_lable" name="txtGiaKM">            
                     </div>
				</div>
             
                <div class="col-xs-12 col-sm-12 col-md-12" style="font-weight: bold;"> Hãy tham khảo Danh Mục Sản Phẩm để biết rõ hơn về ID của sản phẩm. (Danh Mục Sản Phẩm/Chọn loại sản phẩm).</div>
   
            </div>
        </div>

        <div class="modal-footer">
            <div class="form-group">
            	<div class="col-xs-12 col-sm-6">
            		<button style="width: 100%;margin-bottom: 5px" type="submit" name="btn_xacnhan" class="btn btn-lg btn-info"> Xác nhận <span class="glyphicon glyphicon-saved"></span></button>
            	</div>
               
				<div class="col-xs-12 col-sm-6">
					 <button style="width: 100%" type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Hủy <span class="glyphicon glyphicon-remove"></span></button>
				</div>              
            </div>
        </div>

      </div>

	</form>
   </div>
</div>

<script>
	
$(document).ready(function(){

		$("#idsp").change(function(){
	        var id = $(this).val();
	        if (id!=-1){
			 $.get("pageAdmin/sukien/giabandau.php",{idspchuaKM : id},function(data){
				$("#giabandau").html(data);
			});}
		});
		
	});
</script>

<?php
	//Huy viec giam gia san pham
	if (isset($_POST['btn_xoa'])){
		$id=$_POST['idsp'];
		if (xoaKhuyenMai($id)){
			echo "<script> alert('Thao tác thành công');</script>";
			echo '<meta http-equiv="refresh" content="0" />';
		}
		else{
			echo "<script> alert('Thao tác thất bại.');</script>";
			exit();
		}

	}
?>

<?php
	//Tao giam gia san pham mơi
	if(isset($_POST['btn_xacnhan']))
	{
		$id=$_POST['idSanPham'];
		$giaBD=$_POST['txtGiaBD'];
		$giaKM=$_POST['txtGiaKM'];

		if ($id==-1){
			echo "<script> alert('Vui lòng chọn ID sản phẩm.');</script>";
			exit();
		}

		if($giaKM<=0 || $giaKM>=$giaBD)
		{
			echo "<script> alert('Vui lòng nhập giá hợp lệ(Giá khuyến mãi không được bằng hoặc nhỏ hơn 0 hay lớn hơn giá ban đầu).');</script>";
			exit();
	       
		}

		if (capnhatKhuyenMai($id,$giaKM)){
			echo "<script> alert('Khuyến mãi cho sản phẩm mới thành công');</script>";
			echo '<meta http-equiv="refresh" content="0" />';
		}
		else{
			echo "<script> alert('Thao tác thất bại.');</script>";
			exit();
		}



	}
?>
