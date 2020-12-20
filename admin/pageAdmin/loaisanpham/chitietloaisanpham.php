<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/loaisanpham/loaisanpham.php";
?>
<form action="" method="post">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: -20px;">
    <!-- small box -->
    <div class="small-box bg-aqua" id="ct_loai_sp" >
      <div style="text-align: center;">
        <h1 id="tieude_loaisp">CHI TIẾT LOẠI SẢN PHẨM</h1>
      </div>
    

      <div class="row" >
        <?php
        $idloai=$_GET['idloai'];
        settype($idloai, 'int');
        $chitiet=chitietLoaiSP($idloai);
        while ($row_chitiet=mysql_fetch_array($chitiet)) {
        ?>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 5%;padding-right: 5%">      
            <h5>MÃ LOẠI SẢN PHẨM</h5>
            <hr>
            <h5>TÊN LOẠI SẢN PHẨM</h5>
            <hr>

            <h5>NGÀY TẠO</h5>
            <hr>
            <h5>NGƯỜI TẠO</h5>
            <hr>
            <h5>NGÀY CẬP NHẬP</h5>
            <hr>
            <h5>NGƯỜI CẬP NHẬP</h5>
              <hr>
          </div>
      
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 5%;padding-right: 5%">
            <h5>#<?php echo $row_chitiet['id_loai_san_pham']?></h5>
            <hr>
            <h5 style="height: 15px;"><input type="text" name="txtTenLoai" required id="txtTenLoai" value="<?php echo $row_chitiet['ten_loai_san_pham']?>" style="background-color: #8e19dc;color: #fff;width: 100%;"></h5>
            <hr>
            <h5><?php echo $row_chitiet['ngay_tao']?></h5>
            <hr>
            <h5><?php echo $row_chitiet['nguoi_tao']?></h5>
            <hr>
            <h5><?php echo $row_chitiet['ngay_cap_nhat']?></h5>
            <hr>
            <h5><?php echo $row_chitiet['nguoi_cap_nhat']?></h5>
              <hr>
          </div>
        <?php
        }
        ?>

          
      </div>
      
    </div>
  </div>
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <button type="submit" name="btn_capnhat" class="btn btn-primary" style="width: 100%">CẬP NHẬT</button>
    </div>
</form>

<?php
  if (isset($_POST['btn_capnhat']))
  {
    $idloai=$_GET['idloai'];
    settype($idloai, 'int');
    $tenloai=$_POST['txtTenLoai'];
    $nguoicapnhat=$_SESSION['username'];
    $hoten=tenNguoiThaoTac($nguoicapnhat);
    while ($row_ten=mysql_fetch_array($hoten)) {
      $tennguoicapnhat=$row_ten['ho_ten'];
    }

    $test=checkTen($tenloai);
    while ($row_test=mysql_fetch_array($test)) {
      $num=$row_test['num'];
    }

    if ($num>0)
    {
      echo "<script> alert('Đã có loại sản phẩm này rồi, không thể cập nhật.');</script>";
      exit();
    }
    if ($num==0)
    {
      if (capnhatLoaiSP($idloai,$tenloai,$tennguoicapnhat)){
        echo "<script> alert('Cập nhật thành công.');</script>";
        echo "<script> location.replace('index.php?p=danhsachloaisanpham'); </script>";
        echo'<meta http-equiv="refresh" content="0">';
      }
      else{
         echo "<script> alert('Cập nhật thất bại.');</script>";
         echo '<meta http-equiv="refresh" content="0">';
      
      }
    }

    
  }
?>
