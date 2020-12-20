
<div id="contact-page" class="container">
	<div class="bg">  	
		<div class="row">  	
			
			<div class="col-sm-12">
				<div class="contact-info">
					<h2 class="title text-center">Thông tin liên hệ</h2>
					<address>
						<?php 
							echo "";
							$rs=mysql_query("select * from thongtinlienhe");
							$row=mysql_fetch_array($rs);
							echo $row['noi_dung_thong_tin_lien_he'];
						?>
					</address>
					<div class="social-networks">
						<h2 class="title text-center">Mạng xã hội</h2>
						<ul>
							<li>
								<a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
							</li>
						
							<li>
								<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>    			
		</div>  
	</div>	
</div><!--/#contact-page-->


