
<div class=row style="border: 1px solid;">
	<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">SỬA THÔNG SỐ SẢN PHẨM</label>
	<div class="col-lg-12" style="height: 31px;">
		<div class="shopper-info" id="nguoimua" style="padding-top: 20px;text-align: center;padding-bottom: 0px;">
		</div>
	</div>
<form action="" method="post" >
	<div class="col-lg-12">
		<div class="col-sm-4">
			<div class="shopper-info" id="themsp_lable">
			
					<?php 
						$idsp=$_GET['idsp'];
						$ct = chitietSPbyID($idsp);
						while ($row_ct=mysql_fetch_array($ct)) {
					?>
					<div >Tên sản phẩm</div>
					<input type="text" required name="txtTenSanPham" placeholder="Nhập tên sản phẩm." id="themsp" value="<?php echo $row_ct['ten_san_pham']?>">
					<?php
					}
					?>
					<div >Loại sản phẩm</div>
					<select id="themsp" name="opLoaiSP" style="margin-bottom: 10px;" class="form-control" name="th">
					<?php
					//hien thi loai san pham theo id san pham
					$idsp=$_GET['idsp'];
					$idloai=LoaiSPbyID($idsp);
					while ($row_idloai=mysql_fetch_array($idloai)) {
						$id_loaisp=$row_idloai['id_loai_san_pham'];
					}

					$dsloai = dsLoaiSPct();
					while ($row_dsloai=mysql_fetch_array($dsloai)) {
					?>
						<?php
							if ($row_dsloai['id_loai_san_pham']==$id_loaisp){
							echo'	<option value="';echo $row_dsloai['id_loai_san_pham'];echo'" selected="selected">';echo $row_dsloai['ten_loai_san_pham'];echo' </option>';
							}
							else{
								echo'	<option value="';echo $row_dsloai['id_loai_san_pham'];echo'" >';echo $row_dsloai['ten_loai_san_pham'];echo' </option>';
							}
						?>
						
					<?php
					}
					?>
             		</select>
             		
			<?php 
				$idsp=$_GET['idsp'];
				$ct = chitietSPbyID($idsp);
				while ($row_ct=mysql_fetch_array($ct)) {
			?>
					<div >Trạng thái</div>
             		<select id="themsp" name="opKinhDoanh" style="margin-bottom: 10px;" class="form-control" name="th">
             		<?php
             			$kinhdoanh=$row_ct['kinh_doanh'];
             			if ($kinhdoanh==1){
             				echo '<option value="0"> Chưa kinh doanh</option>
                        		<option value="1" selected="selected"> Kinh doanh</option>  ';
             			}
             			else{
             				echo '<option value="0" selected="selected"> Chưa kinh doanh</option>
                        		<option value="1" > Kinh doanh</option>  ';
             			}
             		?>
						             
             		</select>
					
					<div >Giá sản phẩm</div>
					<input id="themsp" required type="text" name="txtGia" placeholder="Nhập giá của phẩm" id="nomal_lable" value="<?php echo $row_ct['gia_ban_dau']?>">
					
					<div >Kích cỡ</div>
					<input id="themsp"  required type="text" name="txtSize" placeholder="Nhập size sản phẩm" id="nomal_lable" value="<?php echo $row_ct['size']?>">

					<div >Số lượng</div>
					<input id="themsp"  required type="text" name="txtSoLuong" placeholder="Nhập số lượng sản phẩm" id="nomal_lable" value="<?php echo $row_ct['so_luong']?>">

					

				
			</div>
		</div>

	<div class="col-sm-8">
		<div class="shopper-info" id="themsp_lable">
			<div style="font-weight: normal;color: #ffffff;text-align: center;text-transform: initial;background-color: #fe980f;">Thông tin sản phẩm </div>
			<textarea name="thongtinsanpham" id="thongtinsanpham" value="<?php echo $row_ct['thong_tin']?>"><?php echo $row_ct['thong_tin']?></textarea>
			<script>CKEDITOR.replace('thongtinsanpham');</script>
			
		</div>
	</div>
	<?php
		}

	?>

    </div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<button type="button"  id="btn_huy" OnClick="huy" class="btn btn-info" style="  border-radius: 0px;width: 100%;margin-top: 5px;margin-bottom: 5px">HỦY BỎ</button>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<button type="submit" name="btn_hoantat" class="btn btn-warning pull-right"  style=" border-radius: 0px;width: 100%;margin-top: 5px;margin-bottom: 5px">HOÀN TẤT</button>
	 </div>
</form>

</div>

<script>
	//Xu li theo lua chon: Yes or No
	$("#btn_huy").on('click',function(){

	  if(huy()){//Neu chon yes thi huy
	   location.replace('index.php?p=danhmucsanpham&idloai=1');
	  }
	  
	});

	//Dua ra thong bao lua chon cho nguoi dung
	function huy(){
	  var status = confirm("Bạn chắc chắn hủy việc sửa sản phẩm này ?");
	    if(status)
	    {
	        return true;
	    }
	  return false;
	}
</script>

<?php
	if (isset($_POST['btn_hoantat'])){
		$idsp=$_GET['idsp'];
		$tensp=$_POST['txtTenSanPham'];
		$loai=$_POST['opLoaiSP'];
		$kinhdoanh=$_POST['opKinhDoanh'];
		$gia=$_POST['txtGia'];
		$size=$_POST['txtSize'];
		$soluong=$_POST['txtSoLuong'];
		$thongtin=$_POST['thongtinsanpham'];


	

		$n=checkSP($tensp,$loai,$size);
      	$row_n=mysql_fetch_assoc($n);
      	$count=$row_n['num'];
      	

      	if ($count>0)
      	{
      		 echo "<script> alert('Sản phẩm này đã có rồi, vui lòng kiểm tra lại.');</script>";
      	}

      	if ($count==0){
          if ($size<20 || $size >50 || $gia<=0){
            echo "<script> alert('Giá hoặc size không hợp lệ! (Giá lớn hơn 0 và Size từ 20  tới 50 ).');</script>";
            exit();
          }
          else{
           		if (capnhatSP($tensp,$loai,$kinhdoanh,$gia,$size,$soluong,$thongtin,$idsp))
				{
					 echo "<script> alert('Cập nhật thành công');</script>";
					 echo "<script>location.replace('index.php?p=danhmucsanpham&idloai=";echo $loai;echo"');</script>";
					 echo '<meta http-equiv="refresh" content="0">';
				}
				else{
					 echo "<script> alert('Cập nhật thất bại');</script>";
				}
          }
      	}
	    else{
	      	echo "<script> alert('Thao tác thất bại. Vui lòng thử lại');</script>";
	    }
	}
?>





