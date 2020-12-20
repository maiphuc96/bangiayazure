<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Mua ngay</li>
			</ol>
		</div><!--/breadcrums-->
		
		<div class="col-sm-3">
			<?php require "blocks/leftsidebar.php"?>
		</div>
		

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-4" style="margin-left: 32px;">
					<div class="shopper-info" id="nguoimua">
						Thông tin của quý khách
						<form class="thongtinkhachhang">
							<label>Họ và tên </label>
							<input type="text" placeholder="Họ và tên của quý khách.">
							<label>Email </label>
							<input type="text" placeholder="Email của quý khách.">
							<label>SĐT </label>
							<input type="text" placeholder="Số điện thoại của quý khách.">
							<label>Địa chỉ </label>						
							<textarea name="txtdiachi" id="txtdiachi" class="form-control" rows="5" placeholder="Địa chỉ của quý khách."></textarea>
							
						</form>
						
					</div>
				</div>
				<div class="col-sm-4" style="margin-left: 44px;">
					<div class="shopper-info" id="nguoinhan">
						Địa chỉ giao & nhận hàng
						
						<form class="thongtinkhachhang">
							<label>Tên người nhận </label>
							<input type="text" placeholder="Họ và tên người nhận hàng.">
							<label>Email </label>
							<input type="text" placeholder="Email người nhận hàng.">
							<label>SĐT </label>
							<input type="text" placeholder="Số điện thoại người nhận hàng.">
							<label>Địa chỉ </label>						
							<textarea name="txtdiachi" id="txtdiachi" class="form-control" rows="5" placeholder="Địa chỉ nhận hàng."></textarea>
							
						</form>
						
					</div>
				</div>
				
			</div>
		</div>
		<div class="review-payment">
			<h2>Thông tin đơn hàng</h2>
		</div>

		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu" >
						<td class="description" id="mn_anhsp_muangay" >Ảnh sản phẩm</td>
						<td class="description" id="mn_tensp_muangay">Tên sản phẩm</td>
						<td class="price" id="mn_dongia_muangay">Đơn giá</td>
						<td class="quantity" id="mn_sl_muangay">Số lượng</td>
						<td class="total" id="mn_thanhtien_muangay">Thành tiền</td>
						<td class="total" id="mn_action_muangay">Action</td>
						<td></td>
					</tr>
				</thead>
				<tbody> <!--Mua ngay chỉ có duy nhất một sản phẩm (khi nhấn mua ngay)-->
					<tr>
						<td class="cart_product" id="dh_anh_muangay">
							<a href="" ><img class="dh_chitiet_anh" src="images/sanpham/air-jordan-1-royal-2017-release-date-555088-007.jpg" alt=""></a>
						</td>
						<td class="cart_description" id="dh_mota_muangay">
							<h4><a href="">Adidas Ultraboost ST Giày cho nam</a></h4>
							
						</td>
						<td class="cart_price" id="dh_gia_muangay">
							<p>560.000 đ</p>
						</td>
						<td class="cart_quantity" >
							<div class="cart_quantity_button" id="dh_sl_muangay">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total" id="dh_thanhtien_muangay">
							<p class="cart_total_price">560.000 đ</p>
						</td>
						<td class="cart_delete_btn">
							<a href="" id="dh_xoa" class="btn btn-info" name="btnxoa" role="button">Xóa</a>
						</td>
					</tr>

					

					
					<tr>
						<td colspan="3">&nbsp;</td>
						<td colspan="3">
							<table class="table table-condensed total-result">
								<tr>
									<td>Tạm tính</td>
									<td>560.000 đ</td>
								</tr>
								<tr>
									<td>Thuế GTGT(10%)</td>
									<td>56.000 đ</td>
								</tr>
								
								<tr>
									<td>Thành tiền</td>
									<td><span>616.000 đ</span></td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="payment-options">
			<a class="btn btn-primary" href="">Tiếp tục mua hàng</a>
			<a class="btn btn-primary pull-right" href="">Xác nhận</a>
		</div>
	</div>
</section> <!--/#cart_items-->


