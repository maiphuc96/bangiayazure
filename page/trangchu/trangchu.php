<script>
	var count=1;
	$(document).ready(function(){

		 $.get("page/trangchu/trangchu_spmoi.php",{page : count},function(data){
				$("#trangchu_spmoi").html(data);
				count++;
			});
		$("#trangsau").click(function(){
			
	        $.get("page/trangchu/trangchu_spmoi.php",{page : count},function(data){
				$("#trangchu_spmoi").append(data);
			});   
			count++;

		});
		
	});
</script>

<div class="row">
	<div class="col-xs-12 col-sm-3">
		<?php require "blocks/leftsidebar.php"?>
	</div>
	
	<div class="col-xs-12 col-sm-9">
		<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Sản phẩm mới</h2>
			
				<div id="trangchu_spmoi"></div>
		
		</div><!--features_items-->
		
		<div class="">
			<div id="trangsau">
					Xem thêm
			</div>
		
		</div>	
	</div>
</div>

