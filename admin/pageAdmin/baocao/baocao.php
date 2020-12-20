<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/baocao/baocao.php";
?>
<div class="row">
	<div class="col-sm-12" style="text-transform: uppercase; width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">
			Báo cáo bán hàng
 	</div>

	<div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<label for="sel1">Tháng</label>
			<select class="form-control" id="thang" name="opThang">
			<option value="-1">Chọn tháng</option>
			<?php 
				$ds=loadThang();
				while ($row_ds=mysql_fetch_array($ds)) {
			?>
				<option value="<?php echo $row_ds['thang']?>"><?php echo $row_ds['thang']?></option>
			<?php
				}
			?>
				
			</select>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<label for="sel1">Năm</label>
			<div id="dsNam"></div>
		
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			
			<div>
				<button id="lammoi" style="margin-top: 23px;width: 100%;font-size: 16px;" name="btn_bao_cao" class="btn btn-sm btn-info pull-left"> Chi tiết</button>

			</div>
			
		</div>
		
		<div id="dsDT"></div>

	</div>   


	

<script>
	
$(document).ready(function(){
		//hien thi cac nam tuong ung voi thang da chon
		$("#thang").change(function(){
	        var th = $(this).val();
	        if (th!=-1){
			 $.get("pageAdmin/baocao/loadNam.php",{thang : th},function(data){
				$("#dsNam").html(data);
			});}
		});
		$("#thang").click(function(){
	        var th = $(this).val();
	        if (th!=-1){
			 $.get("pageAdmin/baocao/loadNam.php",{thang : th},function(data){
				$("#dsNam").html(data);
			});}
		});
		
	});
</script>


<script>
	//ajax xo du lieu theo thang va nam
	$(document).ready(function(){
		//hien thi cac nam tuong ung voi thang da chon
		$("#lammoi").click(function(){
			var th = $("#thang").val();
			var na = $("#nam").val();
	         $.get("pageAdmin/baocao/loadDuLieu.php",{thang : th,nam : na },function(data){
				$("#dsDT").html(data);
			});
		});
	});
</script>




