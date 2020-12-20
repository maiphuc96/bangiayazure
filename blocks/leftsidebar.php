
	<div class="left-sidebar">
					<div class="col-xs-12 col-sm-12">
						<h2 style="margin-bottom: 7px;">Danh mục</h2>
						 <div class="panel-group category-products" id="accordian">

							<?php
								$menu_trangchu = mnSanPhamTrangChu();
                            	while ($row = mysql_fetch_array($menu_trangchu)) 
                            	{
							?>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="index.php?p=sanpphamtheoloai&idLoai=<?php echo $row['id_loai_san_pham']?>"><?php echo $row['ten_loai_san_pham'] ?></a></h4>
								</div>
							</div>
							
							<?php
							}
							?>
						</div><!--/category-products-->
					</div>
						
					<div class="col-xs-12 col-sm-12">
						<div class="price-range"><!--price-range-->
							<h2 style="margin-bottom: 7px;">Tìm theo giá</h2>
							  
							 <form action="" method="get"> 

							    <div class="input-group">
							      <span class="input-group-addon">VNĐ</span>
							      <input  type="number" class="form-control" name="gia1" placeholder="Nhập giá tiền">
							    </div>
							    <div id="idlabl">Đến</div>
							    <div class="input-group">
							      <span class="input-group-addon">VNĐ</span>
							      <input type="number" class="form-control" name="gia2" placeholder="Nhập giá tiền">
							    </div>
								
								<div style="margin-top: 10px;
							    text-align: center;
							    width: 100%;
							    text-decoration: none;
							    text-transform: uppercase;

							    font-size: 20px;">
								</div>
								<input type="submit" value="Tìm kiếm" style="width: 100%;height: 34px"> 
								<input type="hidden" name="p" value="timkiemgia">
							</form>  
						</div><!--/price-range-->
					</div>

					<div class="col-xs-12 col-sm-12">
						<div class="price-range"><!--price-range-->
							<h2 style="margin-bottom: 7px;">Size</h2>
							  
							  <?php 
									$size=hienthiSize();
									
									while ($row_size=mysql_fetch_array($size)) {
								?>
									
									<div class="col-sm-2">
										<a href='index.php?p=size&sizesp=<?php echo $row_size['size']?>'><?php echo $row_size['size']?></a>
									</div>
								<?php
									}
								?>
						
						</div><!--/price-range-->
					</div>
	</div>



								

