


<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanliadmin/admin.php";
?>        
<div class="row">

	<div>
		<a class="btn icon-btn btn-primary col-xs-12 col-sm-6 col-md-4 col-lg-3" href="#themadminmoi" data-toggle="modal" style="margin-bottom: 5px"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle" ></span> Thêm admin mới</a>
	</div>

	<div class="col-sm-12" style="margin-top: 5px;padding-right: 0px;padding-left: 0px;">
	<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">Quản trị viên</label>
	<form action="" method="post">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr id="tieude_ds_sp">
						<th  id="tieude" class="gridheader" style="text-align:center"><input id="check_all" type="checkbox" /></th>
						<th id="tieude">#ID</th>
						<th id="tieude">Tài khoản</th>
						<th id="tieude">Họ tên</th>
						<th id="tieude">Giới tính</th>
						<th id="tieude">Số ĐT</th>
						<th id="tieude">Level</th>
						<th id="tieude">Địa chỉ</th>
					

					</tr>
				</thead>
				<tbody>
				<?php
				$ds=layDSAdmin();
				while ($row_ds=mysql_fetch_array($ds)) {
				?>

					<tr>
						<td  id="tieude" align="center"><input class="checkitem" type="checkbox" name="id[]" value="<?php echo $row_ds['id_nguoi_dung'];?>" /></td>
						<td id="tieude"><?php echo $row_ds['id_nguoi_dung'];?></td>
						<td id="tieude"><?php echo $row_ds['tai_khoan'];?></td>
						<td id="tieude"><?php echo $row_ds['ho_ten'];?></td>
						<?php
						if ($row_ds['gioi_tinh']==1)
							echo'<td id="tieude" style="text-align: center;">Nam</td>';
						else
							echo'<td id="tieude" style="text-align: center;">Nữ</td>';
						?>
						
						<td id="tieude"><?php echo $row_ds['so_dien_thoai'];?></td>
						<td  id="tieude" style="text-align: center;"><?php echo $row_ds['level'];?></td>
						<td id="tieude"><?php echo $row_ds['dia_chi'];?></td>
						
					</tr>
				<?php
				}
				?>
				

				</tbody>
				<tfoot>
	                <td colspan="5" style="padding-left: 0px;">
	                    <button type="submit" class="btn" name="submmit" value="delete_all" style="display:none;color: white;background-color: #fe980f;"  OnClick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa mục đã chọn</button>
	                </td>
	            </tfoot>
			</table>
		</div>
	</form>
	</div>

	<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">Quản trị viên-VIP</label>
	<div class="table-responsive" style="margin-top: 5px">
		<table class="table">
			<thead>
				<tr id="tieude_ds_sp">
					
					<th id="tieude">ID</th>
					<th id="tieude">Tài khoản</th>
					<th id="tieude">Họ tên</th>
					<th id="tieude">Giới tính</th>
					<th id="tieude">Số ĐT</th>
					<th id="tieude">Level</th>
					<th id="tieude">Địa chỉ</th>

				</tr>
			</thead>
			<tbody>

				<!-- Người quản trị cao cấp, chỉ có một người duy nhất và không thể xóa -->
				<?php
			$ds_VIP=layDSAdminVIP();
			while ($row_dsVIP=mysql_fetch_array($ds_VIP)) {
			?>

				<tr>
					
					<td id="tieude"><?php echo $row_dsVIP['id_nguoi_dung'];?></td>
					<td id="tieude"><?php echo $row_dsVIP['tai_khoan'];?></td>
					<td id="tieude"><?php echo $row_dsVIP['ho_ten'];?></td>
					<?php
					if ($row_dsVIP['gioi_tinh']==1)
						echo'<td  id="tieude" style="text-align: center;">Nam</td>';
					else
						echo'<td  id="tieude" style="text-align: center;">Nữ</td>';
					?>
					
					<td id="tieude"><?php echo $row_dsVIP['so_dien_thoai'];?></td>
					<td  id="tieude" style="text-align: center;"><?php echo $row_dsVIP['level'];?></td>
					<td id="tieude"><?php echo $row_dsVIP['dia_chi'];?></td>
					
				</tr>
			<?php
			}
			?>

			</tbody>

		</table>
	</div>
</div>




	

<script type="text/javascript">
    $(function(){
        /* Check/bỏ chek hết tất cả các records */
        $(document).on('change','#check_all', function(ev){
            $('.checkitem').prop('checked', this.checked).trigger('change');
        });
        /* Check/bỏ chek từng records */
        $(document).on('change','.checkitem', function(ev){
            var _dem = 0;
            var _checked = 1;
            /* Duyệt tất cả các checkitem */
            $('.checkitem').each(function(){
                if($(this).is(':checked')){
                    _dem ++;
                }else{
                    _checked = 0;
                }
            });
            $('#check_all').prop('checked', _checked);
            if(_dem > 0){
                // Hiện nút xóa chọn
                $('button[name=submmit]').show();
            }else{
                // Ẩn nút xóa chọn
                $('button[name=submmit]').hide();
            }
        });
    });
</script>

<?php
	if(isset($_POST['submmit']) && $_POST['submmit']=='delete_all'){
    $sql = "DELETE FROM nguoidung WHERE id_nguoi_dung IN (".implode(',',$_POST['id']).")";
    if(mysql_query($sql)){
        echo "<script> alert('Xóa người dùng thành công.');</script>";
        echo "<script> location.replace('index.php?p=quanliadmin'); </script>";
        
    }else{
        echo "<script> alert('Thao tác thất bại.');</script>";
        echo "<script> location.replace('index.php?p=quanliadmin'); </script>";
        exit;//Thoat chuong trinh 
    }
}
?>
 

	




<!-- Thêm quản trị viên mới -->
<div class="modal fade" id="themadminmoi">
   <div class="modal-dialog">
    <form action="" method="post">
      <div class="modal-content">
         <div class="modal-header" style="background-color: red;">
            <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="fas fa-times"></span></button>
            <h4 class="modal-title" style="font-size: 32px;padding: 12px;color: white;text-align: center;"> Thêm quản trị viên hệ thống </h4>
         </div>

         <div class="modal-body">
            <div class="container-fluid">
             
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-addon iga2">
                              <span class="fas fa-envelope"></span>
                           </div>
                           <input type="email" required class="form-control" placeholder="Nhập email của quản trị viên cần thêm" name="txtEmail">
                        </div>
                    </div>
                </div>                     
            </div>
         </div>

         <div class="modal-footer">
         
            	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="margin-bottom: 5px;">
            		<button type="submit" name="btn_xacnhan" class="btn btn-lg btn-info" style="width: 100%"> Xác nhận <span class="fas fa-save"></span></button>

            	</div>
               <div class="col-xs-12 col-sm-6 col-md-offset-6 col-md-3 col-lf-offset-6 col-lg-3">
               		<button type="button" data-dismiss="modal" class="btn btn-lg btn-default" style="width: 100%"> Hủy <span class="fas fa-trash-alt"></span></button>
               </div>
               
         
         </div>
      </div>
	</form>
   </div>
</div>

<?php
//Khoi phuc mat khau
if (isset($_POST['btn_xacnhan']))
{
    if (isset($_POST['txtEmail']))
    {
    	

          $To = addslashes($_POST['txtEmail']); //mTo : dia chi nhan email
        
          $title = 'Cấp quyền quản trị viên';
          $code=md5(mt_rand());
          $header = "From:google@gmail.com \r\n";
         

          $test=checkTaiKhoanAdd($_POST['txtEmail']);
          $ok_test=mysql_fetch_assoc($test);
          $ok=$ok_test['ok'];
        
        

	      if ($ok == 0)//neu nguoi dung chua co tai khoan thi tao moi
	      {
	          mysql_query("INSERT INTO `nguoidung` (`id_nguoi_dung`, `tai_khoan`, `ho_ten`, `anh_nguoi_dung`, `gioi_tinh`, `so_dien_thoai`, `mat_khau`, `level`, `dia_chi`, `code`) VALUES (NULL, '$To', '', '', '1', '0000000000', '123456', 1, '', '$code')");

	          $content = "Xin chào ".$To." .Bạn vừa được cấp quyền quản trị viên tại SHOES-SHOP. Để tiến hàng đăng nhập bạn vui lòng sử dụng chức năng Quên mật khẩu của hệ thống để tạo mật khẩu mới(Lưu ý : tài khoản của bạn là tài khoản gmail mà bạn dùng để xin cấp quyền Quản trị viên) ";


	           

	          //test gui mail
	     
	          //$send=mail($To, $title, $content, $header);
                  $send=1;
	          if($send)
	          {
	               echo "<script> alert('Đã thêm quản trị viên mới thành công');</script>";
	               echo'<meta http-equiv="refresh" content="0">';
	              
	          }
	          else {
	             echo "<script> alert('Lỗi, không thành công');</script>";
	             echo'<meta http-equiv="refresh" content="0">';
	          }
	      }
	      else{//neu da co tai khoan thi cap nhat quyen
	      	  mysql_query("UPDATE nguoidung SET level=1 WHERE tai_khoan='$mTo'");

	      	  $content = "Xin chào ".$To." .Tài khoản của bạn vừa được cấp quyền quản trị viên tại SHOES-SHOP. Bạn có thể vào trang quản trị bằng Menu Quản trị viên được hiển thị ngay trên tên tài khoản của bạn";

	          //test gui mail
	          // $send=mail($To, $title, $content, $header);
                  $send=1;
	          if($send)
	          {
	               echo "<script> alert('Đã thêm quản trị viên mới thành công');</script>";
	               echo'<meta http-equiv="refresh" content="0">';
	              
	          }
	          else {
	             echo "<script> alert('Lỗi, không thể thực hiện được');</script>";
	             echo'<meta http-equiv="refresh" content="0">';
	          }
	      }

      }
      else {
        echo "<script> alert('Thao tác thất bại.');</script>";
    	echo'<meta http-equiv="refresh" content="0">';
        exit;
      }

    
}
?>
