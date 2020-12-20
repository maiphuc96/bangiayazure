<?php

if(isset($_POST['submit']))
{
	//qty : Ten cua o text so luong voi key la id cua san pham
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
	echo "<script> location.replace('index.php?p=giohangds'); </script>";
}
?>



<head>
	<title >Giỏ hàng</title>
	
</head>

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active" >Giỏ hàng</li>
			</ol>
		</div><!--/breadcrums-->
		
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<?php require "blocks/leftsidebar.php"?>
		</div>
		

		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="review-payment" id="td_gh">
				<h2 style="margin-bottom: -12px;">Giỏ hàng</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu" >
							<td class="description" id="mn_gh_anhsp" >Ảnh sản phẩm</td>
							<td class="description" id="mn_gh_tensp">Tên sản phẩm</td>
							<td class="price" id="mn_gh_dongia">Size</td>
							<td class="price" id="mn_gh_dongia">Đơn giá</td>
							<td class="quantity" id="mn_gh_sl">Số lượng</td>
							<td class="total" id="mn_gh_thanhtien">Thành tiền</td>
							<td class="total" id="mn_gh_action">Action</td>
							<td></td>
						</tr>
					</thead>
					<tbody> 

<?php
$ok=1;
if(isset($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $k => $v)
	{
		if(isset($k))
		{
			$ok=2;
		}
	}
}
if($ok == 2)
{


		echo "<form action='index.php?p=giohangds' method='post'>";
		foreach($_SESSION['cart'] as $key=>$value)
		{
			$id[]=$key;
		}
		$str=implode(",",$id);
		
	
		//Lay ra danh sach san pham duoc duoc luu o session cart
		$sql="SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_ban_dau as gia,size
			FROM sanpham WHERE san_pham_khuyen_mai=0 AND id_san_pham in ($str)
			UNION
			SELECT id_san_pham as id,anh_san_pham as anh,ten_san_pham as ten,gia_khuyen_mai as gia,size
			FROM sanpham WHERE san_pham_khuyen_mai=1 AND id_san_pham in ($str)";
		
		$query=mysql_query($sql);
		
		$total=0;
		
		while($row=mysql_fetch_array($query))
		{
		//So luong duoc lay tu session o page addcart
			$soluong=$_SESSION['cart'][$row['id']];
			$tongtien=$_SESSION['cart'][$row['id']]*$row['gia'];		
		echo"<tr>";
		echo"	<td class='cart_product' id='gh_anh'>";
		echo"		<a href='' ><img class='dh_chitiet_anh' src='images/sanpham/$row[anh]' alt=''></a>";
		echo"	</td>";
		echo"	<td class='cart_description' id='gh_mota'>";
		echo"		<h4><a href='index.php?p=chitietsanpham&idSanPham=$row[id]'>$row[ten]</a></h4>";
					
		echo"	</td>";
		echo"	<td class='cart_price' id='gh_gia'>";
			
		echo"			<p>$row[size]</p>";
		echo"	</td>";
		echo"	<td class='cart_price' id='gh_gia'>";
			
		echo"			<p>";
		echo number_format($row['gia']);echo" đ</p>";
		echo"	</td>";
		echo"	<td class='cart_quantity' >";

		echo"		<p align='right'><input type='number' style='width: 45%;
    margin-right: 20px;' name='qty[$row[id]]' size='1' value='$soluong'> ";
					
		echo"	</td>";
			
		echo"	<td class='cart_total' id='gh_thanhtien'>";
		echo"		<p class='cart_total_price' id='thanhtien' style='color: red;font-size: 18px;'>";
		echo number_format($tongtien);echo" đ</p>";
		echo"	</td>";
		echo"	<td class='cart_delete_btn'>";
		echo"			<a href='index.php?p=delcart&productid=$row[id]' role='button' style='background-color: #fe980f;border: 1px solid;padding: 5px;color: white;'>Xóa</a></p>";
		echo"	</td>";
		echo"</tr> ";
		$total+=$tongtien;
						
		}

		echo'		<tr>
					<td colspan="3">&nbsp;</td>
					<td colspan="3">
						<table class="table table-condensed total-result">
							<tbody><tr>
								<td>Tạm tính</td>';
		echo"					<td>";
		echo number_format($total);echo" đ</td>";
		echo'				</tr>
							<tr>
								<td>Thuế GTGT(10%)</td>';
								$thue=$total*0.1;
								$thanhtien=$thue+$total;
		echo"					<td>";
		echo number_format($thue);echo" đ</td>";
		echo'					</tr>
							
							<tr>
								<td>Thành tiền</td>';
		echo"					<td><span style='color: red;font-size: 16px;'>";
		echo number_format($thanhtien);echo" đ</span></td>";
		echo'					</tr>
						</tbody></table>
					</td>
				</tr>';
}
else
	{
		echo "<div class='pro'>";
		echo "<p align='center'>Bạn không có sản phẩm nào trong giỏ hàng<br /><a href='index.php'> --Mua hàng--</a></p>";
		echo "</div>";
	}

?>				
					</tbody> 
				</table>
			</div>
			<div class="payment-options row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<a style="width: 100%" class="btn btn-primary pull-left" href="index.php">Tiếp tục mua hàng</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<input <a style="width: 100%" class="btn btn-primary pull-left" href="" value=" Cập nhật" role="button" name="submit" type="submit"></a>
					</div>
						<?php 
						if ($ok==2)
						{
							echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a  style="width: 100%" class="btn btn-primary pull-right" role="button" href="index.php?p=thanhtoan-giohang" type="submit" name="btn_thanhtoan">Thanh toán</a> </div>';
						}
						else{
						
							echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a  style="width: 100%" class="btn btn-primary pull-right" disabled role="button" href="index.php?p=thanhtoan-giohang" type="submit" name="btn_thanhtoan">Thanh toán</a> </div>';
						}
					?>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<a style="width: 100%" class="btn btn-primary pull-right" href="index.php?p=delcart&id=0">Xóa bỏ giỏ hàng</a>
					</div>

				</div>
				

				

				
			</div>
		</div>
	</div>
</section> <!--/#cart_items-->
