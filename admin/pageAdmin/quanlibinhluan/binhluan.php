<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/quanlibinhluan/quanlibinhluan.php";
?>

<div class="col-sm-12" style="margin-top: 57px;padding-right: 0px;padding-left: 0px;">
	<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">QUẢN LÍ BÌNH LUẬN</label>
	<form action="" method="post">
    <div class="table-responsive">
 		<table class="table table-bordered table-hover table-striped">
 			<thead>
 				<tr id="tieude_ds_sp">
 					<th  id="tieude" class="gridheader" style="text-align:center"><input id="check_all" type="checkbox" /></th>
 					<th id="tieude">id BL</th>
 					<th id="tieude">id SP</th>
 					<th id="tieude">Tên SP</th>
 					<th id="tieude">User</th>
 					<th id="tieude">Nội dung</th>
 					<th id="tieude">Thời gian tạo</th>
 					<th id="tieude">Ngày tạo</th>
 				</tr>
 			</thead>

 			<tbody>
    			<?php
    			$ds=layDSBinhLuan();
    			while ($row_ds=mysql_fetch_array($ds)) {
    			?>

     				<tr>
     					<td  id="tieude" align="center"><input class="checkitem" type="checkbox" name="id[]" value="<?php echo $row_ds['id_binh_luan'];?>" /></td>
     					<td id="tieude"><?php echo $row_ds['id_binh_luan'];?></td>
     					<td id="tieude"><?php echo $row_ds['id_san_pham'];?></td>
     					<td id="tieude"><?php echo $row_ds['ten_san_pham'];?></td>
     					<td id="tieude"><?php echo $row_ds['tai_khoan'];?></td>
     					<td id="tieude"><?php echo $row_ds['noi_dung_binh_luan'];?></td>
     					<td id="tieude"><?php echo $row_ds['thoi_gian_tao'];?></td>
    					<td id="tieude"><?php echo $row_ds['ngay_tao'];?></td>
     				</tr>
    			<?php
    			}
    			?>
 			</tbody>

			<tfoot>
                <td colspan="5">
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
    $sql = "DELETE FROM binhluan WHERE id_binh_luan IN (".implode(',',$_POST['id']).")";
    if(mysql_query($sql)){
        echo "<script> alert('Xóa bình luận thành công.');</script>";
        echo "<script> location.replace('index.php?p=binhluan'); </script>";
        
    }else{
        echo "<script> alert('Thao tác thất bại.');</script>";
        echo "<script> location.replace('index.php?p=binhluan'); </script>";
        exit;//Thoat chuong trinh 
    }
}
?>
