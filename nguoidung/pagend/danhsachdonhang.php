<link rel="stylesheet" href="css/danhsachdonhang.css">

<div class="row">
        <!--/+link : nếu dẫn về trang chủ thi gắn link ban đầu vào-->
       <div class="col-xs-12 col-sm-offset-6 col-sm-6 col-md-offset-8 col-md-4 col-lg-offset-9 col-lg-3"><a class="btn icon-btn btn-primary pull-right" href="/" id="tt_muasam" style="width: 100%"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Tiếp tục mua hàng</a></div>


    <?php
      if(isset($_SESSION['username']))
        $taikhoan=$_SESSION['username'];
      $donhang = dsDonHangNguoiDung($taikhoan);
      while ($row_donhang=mysql_fetch_array($donhang)) {
    ?>
         <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <div class="thumbnail">
            <div class="caption">
                <div class='col-lg-12'>
                    
                </div>
                <div class='col-lg-12 well well-add-card' style="color: white;background-color: #FE980F;">
                    <h4><?php echo $row_donhang['ten_khach_hang']?></h4>
                </div>
                <div class='col-lg-12' style="color: #696763;">
                    <p>Mã đơn hàng</br><?php echo $row_donhang['id_don_hang']?></p>
                    <p class"text-muted">Ngày tạo: <?php echo $row_donhang['ngay_dat_hang']?></p>
                </div>
              
               <form action="index.php?p=chitietdonhang&iddh=<?php echo $row_donhang['id_don_hang']?>" method="post">
                   <input type="submit" name="btn_ChiTiet" style="border: 0px solid;color: black;background-color: white;" value="Chi tiết">
               </form>
               
                <p class="pull-right" style="margin-right: 10px;margin-top: -20px;">
                    <?php 
                       if ($row_donhang['trang_thai']=='dang_cho')
                            echo "Đang chờ";
                        else {
                                if ($row_donhang['trang_thai']=='da_xu_li')
                                     echo "Đã xử lí";
                                 else {
                                    if ($row_donhang['trang_thai']=='da_giao_dich')
                                        echo "Đã giao dịch";
                                 }
                        }
                ?> 
                </p> 
            </div>
        </div>
    </div>
    <?php
     }
     ?>
</div>

