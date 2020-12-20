<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="companyinfo">
							<h2><span>Shoes</span>-shop</h2>
							<?php
								$gioithieu = mnGioiThieu();
								while ($row = mysql_fetch_array($gioithieu)) {
									echo $row['logo_trang_chu'];
								}
							?>
						</div>
					</div>
				
					<div class="col-xs-12 col-sm-offset-6 col-sm-3 col-md-offset-6 col-md-3 col-lg-offset-6 col-lg-3">
						<div class="">
							<img src="/images/home/map.png" alt="">
						</div>
					</div>
				</div>
			</div>
</div>
		

		
<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<p class="pull-left">Copyright © 2020 SHOES-SHOP Inc. All rights reserved.</p>
			
		</div>
	</div>
</div>
