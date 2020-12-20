
<div class="header">
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fas fa-phone"></i> +(84) 966 999 999</a></li>
								<li><a href="#"><i class="fas fa-envelope"></i> 14520168@gm.uit.edu.vn</a></li>
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
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="/"><img src="../images/home/logo.jpg" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
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
										echo '<li><a href="/index.php?p=giohangds"><i class="fas fa-shopping-cart"></i> Giỏ hàng(0)</a></li>';
									} else {
										$items = $_SESSION['cart'];
										echo '<li><a href="/index.php?p=giohangds"><i class="fas fa-shopping-cart"></i> Giỏ hàng('.count($items).')</a></li>';
										
									}
								?>
								
								<?php 
									include $_SERVER["DOCUMENT_ROOT"] . "/function/trangchu.php";
							       if (isset($_SESSION['username']) ){
							          
							        echo "<li><a href='/nguoidung/index.php'><i class='fas fa-user'></i>$_SESSION[hoten] </a></li>";

							        $taikhoan=$_SESSION['username'];
							        $check=checkQuyenHan($taikhoan);
							        while ($row_checkQH=mysql_fetch_array($check)) {
							        	$QH=$row_checkQH['level'];
							        }

							        if ($QH>=1){
							        	echo"<li><a href='/admin/index.php'><i class='fas fa-user'></i> Quản trị viên</a></li>";
							        }

							        echo"<li><a href='../index.php?p=dangxuat'><i class='fas fa-sign-out-alt'></i> Thoát</a></li>";
							        
							       }
							       else{
							       		echo "<script> location.replace('../index.php?p=dangnhap'); </script>";
							        	
							       }
						       ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #080808">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/index.php?p=gioithieu" style="color: white;font-size: 16px;">Giới thiệu</a>
	        </div>
	        <div id="navbar" class="navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a  href="/">Trang chủ</a></li>
	            <li class="active"><a href="#" style="color: white">Sản phẩm</a>
	          			<ul>
	          				<?php
                            	$menu_trangchu = mnSanPhamTrangChuND();
                            	while ($row = mysql_fetch_array($menu_trangchu)) 
                            	{
                            			
                            ?>
	          				<li><a  href="/index.php?p=sanpphamtheoloai&idLoai=<?php echo $row['id_loai_san_pham']?>"><?php echo $row['ten_loai_san_pham'] ?></a></li>
	          				<?php
							}
							?>
	          			
	          			</ul>
	      			</li>
	            <li class="active"><a href="../index.php?p=lienhe">Liên hệ</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

</div>
