

 <div class="row">
 	<!--/+link : nếu dẫn về trang chủ thi gắn link ban đầu vào-->
	
 	<div class="col-sm-12"><a class="btn icon-btn btn-primary pull-right" href="index.php?p=themsanpham" data-toggle="modal" style="
 		margin-right: -14px;margin-top: 8px;"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Thêm sản phẩm mới</a>

 	</div>

 	<?php
		$idloai=$_GET['idloai'];
	?>
 	<div>Số lượt mua: <a href="index.php?p=danhmucsanpham&idloai=<?php echo $idloai?>&slm-asc">Tăng dần</a> - <a href="index.php?p=danhmucsanpham&idloai=<?php echo $idloai?>&slm-desc">Giảm dần</a>
	. Số lượng sản phẩm: <a href="index.php?p=danhmucsanpham&idloai=<?php echo $idloai?>&slsp-asc">Tăng dần</a> - <a href="index.php?p=danhmucsanpham&idloai=<?php echo $idloai?>&slsp-desc">Giảm dần</a>
 	</div>

 </div>


 <div class="row" >
 	<div class="col-sm-12 table-responsive" style="margin-top: 12px;padding-right: 0px;padding-left: 0px;">
 		<table class="table table-bordered table-hover table-striped">
 			<thead>
 				<tr >
 					<th id="tieude">ID</th>
 					<th id="tieude">Tên SP</th>
 					<th id="tieude">Size</th>
 					<th id="tieude">Ảnh SP</th>
 					<th id="tieude">Thông tin</th>
 					<th id="tieude">SPKM</th>
 					<th id="tieude">Trạng thái</th>
 					<th id="tieude">Giá BĐ</th>
 					<th id="tieude">Giá KM</th>
 					<th id="tieude">Ngày đăng</th>
 					<th id="tieude">Số lượng</th>
 					<th id="tieude">Số lượt mua</th>
 					<th id="tieude">Action</th>

 				</tr>
 			</thead>
 			<tbody>
			<?php 
				if (isset($_GET['idloai']))
					$idloai=$_GET['idloai'];
				else
					$idloai=1;
				settype($idloai, 'int');
				$value=0;//dung bien de check vao truong hop nao
				//neu chon so luot mua tang dan
				if (isset($_GET['slm-asc']))
				{
					$value=1;
					$var="ASC";
					$ds=dsSPSLM($idloai,$var);
				}
				//neu chon so luot mua giam dan
				if (isset($_GET['slm-desc']))
				{
					$value=1;
					$var="DESC";
					$ds=dsSPSLM($idloai,$var);
				}
				//neu chon so luong san pham tang dan
				if (isset($_GET['slsp-asc']))
				{
					$value=1;
					$var="ASC";
					$ds=dsSPSLSP($idloai,$var);
				}
				//neu chon so luong san pham giam dan
				if (isset($_GET['slsp-desc']))
				{
					$value=1;
					$var="DESC";
					$ds=dsSPSLSP($idloai,$var);
				}
				//truong hop khong chon gi ca
				if ($value==0)
					$ds=dsSP($idloai);
				while ($row_ds=mysql_fetch_array($ds)) {
			?>

 				<tr>
 					<td id="tieude"><?php echo $row_ds['id_san_pham']?></td>
 					<td id="tieude"><?php echo $row_ds['ten_san_pham']?></td>

 					
 					<td id="tieude"><?php echo $row_ds['size']?></td>
 					<td id="tieude"><img class="imglist" src="/images/sanpham/<?php echo $row_ds['anh_san_pham']?>" style="
 						width: 149px;
 						height: 150px;
 						">
                                        
                                         </td>
					<td id="tieude">
						<?php echo $row_ds['thong_tin']?>
					</td>
					<td id="tieude"><?php echo $row_ds['san_pham_khuyen_mai']?></td>
					<td id="tieude"><?php echo $row_ds['kinh_doanh']?></td>

					<td id="tieude"><?php echo number_format($row_ds['gia_ban_dau'])?>đ</td>
					<td id="tieude"><?php echo number_format($row_ds['gia_khuyen_mai'])?>đ</td>
					<td id="tieude"><?php echo $row_ds['ngay_dang']?></td>
					<td id="tieude"><?php echo $row_ds['so_luong']?></td>
					<td id="tieude"><?php echo $row_ds['so_luot_mua']?></td>
					<form action="" method="post">
 						<td id="tieude">
 							<button id="btn_chitiet" type="button" class="btn btn-sm btn-warning" style="
 							margin-bottom: 10px;
 							"><a id="a_off_tag_link" href="index.php?p=suasanpham&idsp=<?php echo $row_ds['id_san_pham']?>" style="text-decoration:none; color:white;"> Sửa </a></button>

                                                        

 							<input type="hidden" name="idsp" value="<?php echo $row_ds['id_san_pham']?>">
 							<input type="hidden" name="anhsp" value="<?php echo $row_ds['anh_san_pham']?>">
							<!-- href="index.php?p=suasanphamy&amp;idsp=21" -->
 							<button id="btn_chitiet" name="btn_xoa" type="submit" class="btn btn-sm btn-info"><a id="a_off_tag_link" onclick="return confirm('Bạn có muốn xóa hay không?')" style="text-decoration:none; color:white;"> Xóa </a></button>

                                                        <button id="btn_chitiet" type="button" class="btn btn-sm btn-warning" style="
                                                        margin-top: 10px;
                                                        "><a id="a_off_tag_link" href="index.php?p=doianh&idsp=<?php echo $row_ds['id_san_pham']?>&idloai=<?php echo $idloai;?>" style="text-decoration:none; color:white;">Đổi ảnh</a></button>
 						</td>
 					</form>
 				</tr>

 			<?php
				}
			?>


 			</tbody>
 		</table>
 	</div>
 </div>

 <?php 
	if(isset($_POST['btn_xoa'])){
		$id=$_POST['idsp'];
		$anh=$_POST['anhsp'];
		$patch="../images/sanpham/".$anh;
        
        $x1=checkXoaSPCTDH($id);
        while ($row_x1=mysql_fetch_array($x1)) {
        	$a=$row_x1['num'];
        }

        $x2=checkXoaSPBaoCao($id);
        while ($row_x2=mysql_fetch_array($x2)) {
        	$b=$row_x2['num'];
        }

        if (($a+$b)>0)
        {
        	echo "<script> alert('Sản phẩm này hiện được sử dụng trong báo cáo cũng như đơn hàng. Bạn không thể xóa sản phẩm này');</script>";
        	die();
		        
        }
        else{
        	if (XoaBLSP($id))
        	{	
        		unlink($patch);
        		if (XoaSP($id)){
        			echo "<script> alert('Xóa thành công');</script>";
        			echo '<meta http-equiv="refresh" content="0">';
        		}
        		
        	}
        }

      
	}
 ?>

