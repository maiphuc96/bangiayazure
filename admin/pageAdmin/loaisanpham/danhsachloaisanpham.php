<?php
 include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/loaisanpham/loaisanpham.php";
?>
    <link rel="stylesheet" href="css/danhsachloaisanpham.css">
    <div class="row">
      <!--/+link : nếu dẫn về trang chủ thi gắn link ban đầu vào-->
      <div class="col-sm-12"><a class="btn icon-btn btn-primary pull-right" href="#them_ds_loai_sp" data-toggle="modal" style="
        margin-right: -14px;
        "><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Thêm loại sản phẩm mới</a>

      </div>

    </div> 

    <div class="row">
      <?php
      $loaisp=dsLoaiSP();
      while ($row_loaisp=mysql_fetch_array($loaisp)) {
      ?>
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
          <div class="thumbnail" id="member">
            <div class="caption">

              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 well well-add-card' style="text-align: center;color: white;background-color: #FE980F;">
                <h4>id #<?php echo $row_loaisp['id_loai_san_pham']?></h4>
              </div>
              <div class='col-lg-12' style="color: #696763;">
                <p>Loại SP : <?php echo $row_loaisp['ten_loai_san_pham']?></p>
                <p class"text-muted">Ngày tạo: <?php echo $row_loaisp['ngay_tao']?></p>
              </div>
              <form action="" method="post" name="xoaloai">
                <input type="hidden" name="idloai" value="<?php echo $row_loaisp['id_loai_san_pham']?>">
                <input type="submit" name="btn_xoa" class="btn btn-primary btn-xs btn-update btn-add-card" style="float: left;font-size: 14px;margin-bottom: 0px;margin-top: 3px;" value="Xóa" onclick='return confirm("Bạn có chắc chắn muốn xóa không?")'>
              </form>
              <button type="button"  class="btn btn-primary btn-xs btn-update btn-add-card" id="btn_chitiet"><a href="index.php?p=chitietloaisanpham&idloai=<?php echo $row_loaisp['id_loai_san_pham']?>" style="color: #fff;" id="a_off_tag_link">Chi tiết</a>
              </button>

            </div>
          </div>
        </div>
      <?php
      }
      ?>
        
           
    </div>


<div class="modal fade" id="them_ds_loai_sp">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header" style="background-color: red;">
            <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="fas fa-times"></span></button>
            <h4 class="modal-title"  style="text-align: center;font-size: 32px;padding: 12px;color: #fff;"> THÊM LOẠI SẢN PHẨM MỚI </h4>
         </div>
      <form action="" method="post" name="themloai">
         <div class="modal-body">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-addon iga2">
                              <span class="fas fa-tag"></span>
                           </div>
                           <input type="text" required class="form-control" placeholder="Nhập tên loại sản phẩm mới" name="txtTenLoai">

                        </div>
                     </div>
                  </div>
               </div>

               
            </div>
         </div>

         <div class="modal-footer">
            <div class="form-group">
               <button type="submit" name="btn_xacnhan" class="btn btn-lg btn-info"> Xác nhận <span class="fas fa-save"></span></button>

               <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Hủy <span class="fas fa-trash-alt"></span></button>
            </div>
         </div>
     </form>

      </div>
   </div>
</div>

<?php
  if (isset($_POST['btn_xoa']))
  {
    $id=$_POST['idloai'];
    $n=checkLoaiSP($id);
    while ($row_n=mysql_fetch_array($n)) {
      $x=$row_n['num'];
    }
    if ($x>0)
    {
      echo "<script> alert('Loại sản phẩm này hiện đang được sử dụng, bạn không thể xóa.');</script>";
      exit();
    }
    else{
      if (xoaLoai($id)){
        echo "<script> alert('Xóa loại sản phẩm thành công.');</script>";
        echo'<meta http-equiv="refresh" content="0">';
      }
      else{
        echo "<script> alert('Thao tác thất bại.');</script>";
        exit();
      }
    }
    
    
  }
?>


<?php 
  if (isset($_POST['btn_xacnhan']))
  {
    $nguoitao=$_SESSION['username'];
    $hoten=tenNguoiThaoTac($nguoitao);
    while ($row_ten=mysql_fetch_array($hoten)) {
      $tennguoitao=$row_ten['ho_ten'];
    }

    $tenloai=$_POST['txtTenLoai'];

    $test=checkTen($tenloai);
    while ($row_test=mysql_fetch_array($test)) {
      $num=$row_test['num'];
    }

    if ($num>0)
    {
      echo "<script> alert('Đã có loại sản phẩm này rồi, không thể thêm mới.');</script>";
      exit();
    }
    if ($num==0)
    {
      if (themLoaiSP($tenloai,$tennguoitao))
      {
        echo "<script> alert('Thêm loại sản phẩm mới thành công.');</script>";
        echo "<script> location.replace('index.php?p=danhsachloaisanpham'); </script>";
        echo'<meta http-equiv="refresh" content="0">';
      }
      else{
        echo "<script> alert('Thao tác thất bại.');</script>";
        echo "<script> location.replace('index.php?p=danhsachloaisanpham'); </script>";
        echo'<meta http-equiv="refresh" content="0">';
      }
    }
  }
?>

