<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/lienhe/lienhe.php";
?>
<div class="row">
	<h3 style="margin-top: 0px;background-color: #FE980F;text-transform: uppercase;text-align: center;color: #ffffff;padding-bottom: 10px;padding-top: 10px;">phản hồi khách hàng</h3>
</div>

<div class="row">
	<form action="" method="post">
		<div class="col-sm-6">
					<div class="shopper-info" id="themsp_lable">
							<?php
							$id=$_GET['id'];
							$lienheKH= phanhoiLienHeKH($id);
							while ($row_lienheKH=mysql_fetch_array($lienheKH)) {
							?>
							<input id="phanhoiKH"  type="text" readonly value="<?php echo $row_lienheKH['ho_ten']?>" name="txtTenKH">

							<input id="phanhoiKH"  type="text" readonly value="<?php echo $row_lienheKH['chu_de']?>" name="txtChuDeKH">

							<input id="phanhoiKH"  type="text" readonly value="<?php echo $row_lienheKH['ngay_tao']?>" name="txtNgayDangKH">

							<input name="txtEmailKH" id="phanhoiKH" readonly type="text"   value="<?php echo $row_lienheKH['email']?>" id="nomal_lable">

							<?php
							}
							?>
			           		<input type="submit"  name="btn_huy" class="btn btn-info pull-left" style="border-radius: 0px;width: 100%;" value="Hủy bỏ">
					</div>
		</div>

		<div class="col-sm-6">
			<div class="shopper-info" id="themsp_lable">
					<?php
					$id=$_GET['id'];
					$lienheKH= phanhoiLienHeKH($id);
					while ($row_lienheKH=mysql_fetch_array($lienheKH)) {
					?>
					<textarea id="phanhoiKH" name="NoiDungKH" readonly  rows="3"  style="height: 63px;" value="<?php echo $row_lienheKH['noi_dung_lien_he']?>"><?php echo $row_lienheKH['noi_dung_lien_he']?></textarea>
					
					<textarea id="phanhoiKH" name="NoiDungAD"  rows="3"  style="height: 105px;" placeholder="Phản hồi lại khách hàng" value="<?php echo $row_lienheKH['phan_hoi_cho_khach_hang']?>"><?php echo $row_lienheKH['phan_hoi_cho_khach_hang']?></textarea>
					<?php
					}
					?>
             		<input type="submit"  name="btn_gui" class="btn btn-warning pull-right"  style=" border-radius: 0px;width: 100%;" value="Gửi">
				
			</div>
		</div>
	</form>
	
</div>


<?php
	if (isset($_POST['btn_huy']))
	{
		echo "<script> location.replace('index.php?p=khachhanglienhe'); </script>";
        exit;
	}

	if (isset($_POST['btn_gui']))
	{
		if ($_POST['NoiDungAD']=="")
		{
			echo "<script> alert('Nội dung phải hồi không được trống, kiểm tra lại.');</script>";
		}
		else{
			

          $mTo = addslashes($_POST['txtEmailKH']); //mTo : dia chi nhan email
          $tenKH=$_POST['txtTenKH'];
          $title = 'SHOES SHOP Phản hồi liên hệ khách hàng';
          $id=$_GET['id'];
          $chudephanhoicuaKH=$_POST['txtChuDeKH'];
          $phanhoilaiKH=$_POST['NoiDungAD'];
          $phanhoicuaKH=$_POST['NoiDungKH'];
          $br="<br>";
          

          $content = "			Xin chào ".$tenKH." .Chúng tôi đã nhận được phản hồi của bạn. Nội dung phản hồi của bạn như sau : 
          		Chủ đề : ".$chudephanhoicuaKH." 	
			Nội dung : ".$phanhoicuaKH." 		
			Chúng tôi xin trả lời bạn như sau : ".$phanhoilaiKH." 
			Cảm ơn bạn đã quan tâm!";
       

          $nTo =$mTo;//nTo : Ten nguoi nhan email
          

           //Email cần gới đển
          $to = $nTo; 

          //Tiêu đề email
          $subject = $title; 

          //Nội dung email
          $comment = $content;

          $header = "From:google@gmail.com \r\n";

          //gui mail
          $send=mail($to, $subject, $comment, $header);

          
         
          if($send)
          {		
          	   mysql_query("UPDATE lienhe SET phan_hoi_cho_khach_hang='$phanhoilaiKH' WHERE id_lien_he=$id");
               echo "<script> alert('Gửi phản hồi lại cho khách hàng thành công');</script>";
               echo "<script> location.replace('index.php?p=khachhanglienhe'); </script>";
              
          }
          else {
            echo "<script> alert('Lỗi, không thực hiện được');</script>";
            echo "<script> location.replace('index.php?p=dangnhap'); </script>";
          }
		
        }
	}
?>
