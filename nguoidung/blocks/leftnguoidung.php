

<link href="css/chitietnguoidung.css" rel="stylesheet">
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3" style="text-transform: inherit;margin-bottom: 20px;">
      
      <ul class="nav nav-pills nav-stacked nav-email shadow mb-20" id="mn_trai_nguoidung">
        
        <li>
          <a href="index.php?p=hosocanhan"><i class="glyphicon glyphicon-user"></i> Hồ sơ cá nhân </a>
        </li>
        <li>
          
          <a href="index.php?p=quanlibinhluan">
            <i class="glyphicon glyphicon-comment"></i> Quản lí bình luận <span class="label label-info pull-right inbox-notification"><?php
            if (isset($_SESSION['username'])){
              $taikhoan = $_SESSION['username'];
              $so_binh_luan = demBL($taikhoan);
              while ($row_bl=mysql_fetch_array($so_binh_luan)) {
                echo $row_bl['sobl'];
              }
            }
            
            ?></span>
          </a>
        </li>
        <li>
          <a href="index.php?p=danhsachdonhang">
            <!--Đơn hàng của user chưa đăng nhập sẽ không tính vào danh sách đơn hàng của user đã đăng nhập-->
            <i class="glyphicon glyphicon-shopping-cart"></i> Danh sách đơn hàng <span class="label label-info pull-right inbox-notification">
                <?php
                  if (isset($_SESSION['username'])){
                    $taikhoan = $_SESSION['username'];
                    $so_dh = demDH($taikhoan);
                    while ($row_dh=mysql_fetch_array($so_dh)) {
                      echo $row_dh['sodh'];
                    }
                  }
                ?>


            </span>
          </a>
        </li>
       
     
      
      </ul><!-- /.nav -->

      
    
    </div>
    
  </div>
</div>
