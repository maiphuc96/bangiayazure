
<div class="header">
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +(84) 0123456789</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>giaydep@gmail.com</a></li>
							</ul>
						</div>
					</div>
				
					</div>
				</div>
			</div>
</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="logo pull-left">
							<a href="/"><img src="images/home/logo.jpg" alt="" /></a>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav" >
								
								<?php
									$ok=1;
									if(isset($_SESSION['cart']))
									{
										foreach($_SESSION['cart'] as $k=>$v)
										{
											if(isset($k))
											{
											$ok=2;
											}
										}
									}

									if ($ok != 2)
									 {
										echo '<li><a href="index.php?p=giohangds"><i class="fa fa-shopping-cart"></i> Giỏ hàng(0)</a></li>';
									} else {
										$items = $_SESSION['cart'];
										echo '<li><a href="index.php?p=giohangds"><i class="fa fa-shopping-cart"></i> Giỏ hàng('.count($items).')</a></li>';
										
									}
								?>
								
								
								<?php 
							       if (isset($_SESSION['username']) ){
							       
							        echo "<li><a href='/nguoidung/index.php'><i class='glyphicon glyphicon-user'></i>$_SESSION[hoten] </a></li>";

							        $taikhoan=$_SESSION['username'];
							        $check=checkQuyenHan($taikhoan);
							        while ($row_checkQH=mysql_fetch_array($check)) {
							        	$QH=$row_checkQH['level'];
							        }

							        if ($QH>=1){
							        	echo"<li><a href='/admin/index.php'><i class='glyphicon glyphicon-user'></i> Quản trị viên</a></li>";
							        }

							        echo"	<li><a href='index.php?p=dangxuat'><i class='glyphicon glyphicon-log-out'></i> Thoát</a></li>";
							       }
							       else{
							       
							        	echo "<li><a href='index.php?p=dangnhap'><i class='fa fa-lock'></i> Đăng nhập</a></li>";
										echo "<li><a href='index.php?p=dangki'><i class='fa fa-lock'></i> Đăng kí</a></li>";
							       }
						       ?>


							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
	
		
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8">
			
			<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #080800;">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="index.php?p=gioithieu" style="color: white;font-size: 15px;background-color: #080808">Giới thiệu</a>
		        </div>
		        <div id="navbar" class="collapse navbar-collapse" style="    background-color: #080800;">
		          <ul class="nav navbar-nav">
		            <li class="active"><a href="/" >Trang chủ</a></li>
		            <li class="active"><a  href="#" >Sản phẩm</a>
		          			<ul>
		          				<?php
                            	$menu_trangchu = mnSanPhamTrangChu();
                            	while ($row = mysql_fetch_array($menu_trangchu)) 
                            	{	                                    			
                                ?>
		          				<li><a  href="index.php?p=sanpphamtheoloai&idLoai=<?php echo $row['id_loai_san_pham']?>"><?php echo $row['ten_loai_san_pham'] ?></a></li>					          				
		          				<?php
								}
								?>
		          			</ul>
		      			</li>
		            <li class="active"><a  href="index.php?p=lienhe" >Liên hệ</a></li>
		          </ul>
		        </div><!--/.nav-collapse -->
		      </div>
		    </nav>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-4" style="margin-bottom: 20px">
			<form action="" method="get">
			  <div class="col-xs-12 col-sm-8 col-md-8">
			   
			      <input type="text"  name="ten" class="form-control" placeholder="Tìm kiếm theo tên...">
			
			  </div>
			  <div class="col-xs-12 col-sm-4 col-md-4">
			  	
				<input  type="submit" value="Tìm kiếm" style="height: 33px;width: 100%;"> 
				<input type="hidden" name="p" value="timkiemten">
			  </div>

			</form>
		</div>
	</div>
			

</div>



