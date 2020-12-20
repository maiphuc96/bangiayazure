<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlinguoidung/quanlinguoidung.php";
?>        

<div class="col-sm-12">
	<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">QUẢN LÍ NGƯỜI DÙNG</label>
	<form action="" method="post">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr id="tieude_ds_sp">
						<th id="tieude" class="gridheader" style="text-align:center"><input id="check_all" type="checkbox" /></th>
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
					$ds=layDSNguoiDung();
					while ($row_ds=mysql_fetch_array($ds)) {
					?>

						<tr>
							<td  id="tieude" align="center"><input class="checkitem" type="checkbox" name="id[]" value="<?php echo $row_ds['id_nguoi_dung'];?>" /></td>
							<td id="tieude"><?php echo $row_ds['id_nguoi_dung'];?></td>
							<td id="tieude"><?php echo $row_ds['tai_khoan'];?></td>
							<td id="tieude"><?php echo $row_ds['ho_ten'];?></td>
							<?php
							if ($row_ds['gioi_tinh']==1)
								echo'<td  id="tieude" style="text-align: center;">Nam</td>';
							else
								echo'<td  id="tieude" style="text-align: center;">Nữ</td>';
							?>
							
							<td id="tieude"><?php echo $row_ds['so_dien_thoai'];?></td>
							<td id="tieude" style="text-align: center;"><?php echo $row_ds['level'];?></td>
							<td id="tieude"><?php echo $row_ds['dia_chi'];?></td>
							
						</tr>
					<?php
					}
					?>
				</tbody>

				<tfoot>
	                <td colspan="5" style="padding-left: 0px">
	                    <button type="submit" class="btn" name="submmit" value="delete_all" style="display:none;color: white;background-color: #fe980f;"  OnClick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa mục đã chọn</button>
	                </td>
	            </tfoot>
			</table>
		</div>
	</form>
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
        echo "<script> location.replace('index.php?p=quanliuser'); </script>";
        
    }else{
        echo "<script> alert('Thao tác thất bại.');</script>";
        echo "<script> location.replace('index.php?p=quanliuser'); </script>";
        exit;//Thoat chuong trinh 
    }
}
?>
