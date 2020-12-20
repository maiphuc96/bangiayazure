<?php
  if(isset($_SESSION['username']))
    $taikhoan=$_SESSION['username'];
  $tt_nguoidung = thongtinNguoiDung($taikhoan);
  while ($row_tt_nguoidung=mysql_fetch_array($tt_nguoidung)) {
?>
<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"  style="text-transform: inherit;color: #fe980f;"><?php echo $row_tt_nguoidung['ho_ten']?></h3>
    </div>
    <div class="panel-body">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-3">
              <div align="center"> <img alt="User Pic" src="../images/avatar/<?php echo $row_tt_nguoidung['anh_nguoi_dung']?>" class="img-circle img-responsive"> 

              <form action="" method="post" enctype="multipart/form-data">
                <label id="nomal_lable">Ảnh đại diện </label>
                <div class="input-group image-preview" style="margin-bottom: 10px;">
                          <!-- <input type="text" class="form-control image-preview-filename" disabled="disabled"> don't give a name === doesn't send on POST/GET -->
                          <span class="input-group-btn">
                              <!-- image-preview-clear button -->
                              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                  <span class="glyphicon glyphicon-remove"></span> Xóa
                              </button>
                              <!-- image-preview-input -->
                              <div class="btn btn-default image-preview-input">
                                  <span class="glyphicon glyphicon-folder-open"></span>
                                  <span class="image-preview-input-title" id="nomal_lable">Chọn hình</span>
                                  <input required  type="file" accept="image/png, image/jpeg" name="hinhanh"/> <!-- rename it -->
                              </div>
                          </span>
                  </div><!-- /input-group image-preview [TO HERE]--> 
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-9">
                <button type="submit" name="btn_xacnhan" class="btn btn-warning pull-left"  style=" border-radius: 0px;width: 100%;">Cập nhật ảnh đại diện</button>
              </div>
            </form>

            <div class="col-xs-12 col-sm-12 col-md-9"> 
                <table class="table table-user-information">
                  <tbody>

                    <tr>
                     <tr>
                      <td>Giới tính</td>
                      <?php if ($row_tt_nguoidung['gioi_tinh']==1)
                          echo "<td value=1>Nam</td>";
                          else
                          echo "<td value=0>Nữ</td>";
                      ?>
                     
                    </tr>
                    <tr>
                      <td>Địa chỉ</td>
                      <td style="width: 85%;"><?php echo $row_tt_nguoidung['dia_chi'];?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><a href=""><?php echo $row_tt_nguoidung['tai_khoan'];?></a></td>
                    </tr>
                    <td>Số ĐT</td>
                    <td><?php echo  $row_tt_nguoidung['so_dien_thoai'];?>
                    </td>

                    <tr>
                     <td>Mật khẩu</td>
                     <td>*************
                     
                     </td>

                   </tr>
                   
                 </tr>
                  </tbody>
                </table>
               <span class="pull-right">
                <a href="#doimatkhau" data-toggle="modal" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i>Đổi mật khẩu</a>
                <a href="index.php?p=hosocanhansua" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i>Chỉnh sửa thông tin cá nhân</a>
               
              </span>

            </div>
        </div>
    </div>
</div>
<?php
}
?>



<!--Form Doi mat khau bang email + ma xac nhan-->
<form action="" method="post">
<div class="modal fade" id="doimatkhau">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
            <h4 class="modal-title" style="font-size: 32px;padding: 12px;text-transform: uppercase;text-align: center;background-color: red;color: white;"> Đổi mật khẩu </h4>
         </div>

         <div class="modal-body">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-addon iga2">
                              <span class="glyphicon glyphicon-envelope"></span>
                           </div>
                          <input type="password" required="required"  class="form-control" placeholder="Nhập mật khẩu cũ" name="txtPassOld">
                          <input type="password" required="required" style="margin-top: 3px" class="form-control" placeholder="Nhập mật khẩu mới" name="txtPassNew">
                          <input type="password" required="required" style="margin-top: 3px" class="form-control" placeholder="Nhập lại mật khẩu mới" name="txtPassAgainNew">
                        </div>
                     </div>
                  </div>
               </div>

        
            </div>
         </div>

         <div class="modal-footer">
            <div class="form-group">
               <button type="submit" name="btn_doimatkhau"class="btn btn-lg btn-info"> Xác nhận <span class="glyphicon glyphicon-saved"></span></button>

               <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Hủy <span class="glyphicon glyphicon-remove"></span></button>
            </div>
         </div>
      </div>
   </div>
</div>
</form>


<?php
//Doi mat khau cho nguoi dung
//
//
if (isset($_POST['btn_doimatkhau']))
{
  $taikhoan=$_SESSION['username'];
  $matkhaucu=$_POST['txtPassOld'];
  $matkhaumoi=$_POST['txtPassNew'];
  $matkhaumoiagain=$_POST['txtPassAgainNew'];

  $matkhaucu=md5($matkhaucu);
  //check mat khau hien tai co trung voi mat khau trong dtb hay khong
  $n=checkMatKhauCu($taikhoan,$matkhaucu);
  while ($row_n=mysql_fetch_array($n)) {
    $test=$row_n['number'];
  }

  if ($matkhaumoi!= $matkhaumoiagain){
     echo "<script> alert('Mật khẩu mới không khớp, vui lòng kiểm tra lại');</script>";
  }
  else{//neu khop thi kiem tra mat khau hien tai co dung hay khong
     if ($test==0){
      echo "<script> alert('Mật khẩu cũ không đúng, vui lòng kiểm tra lại.');</script>";
    }
    else{
      if ($test==1){
          $len1=strlen($matkhaumoi);
          $len2=strlen($matkhaumoiagain);
        if ($len1<6 || $len2<6){
            echo "<script> alert('Mật khẩu phải có ít nhất 6 kí tự. Vui lòng nhập lại mật khẩu');</script>";
    
            exit;
        }
        else{
          $mkMoi=md5($matkhaumoi);
          if (updateMatKhauMoi($taikhoan,$mkMoi))
          {
            echo "<script> alert('Đổi mật khẩu thành công.');</script>";
            echo "<script> location.replace('index.php?p=hosocanhan'); </script>";
            exit;//Thoat chuong trinh 
          }
        }
       
      }

    }
  }

}
?>


<?php
  // Ấn định  dung lượng file ảnh upload
  define ("MAX_SIZE","1000");
   
  // hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
  // file này có phải là file hình hay không .
  function getExtension($str) {
  $i = strrpos($str,".");
  if (!$i) { return ""; }
  $l = strlen($str) - $i;
  $ext = substr($str,$i+1,$l);
  return $ext;
  }
  
  $errors=0;
  if (isset($_POST['btn_xacnhan']))
  {
    
    //UPLOAD HINH ANH NGUOI DUNG
    // lấy tên file upload
    $image=$_FILES['hinhanh']['name'];
    // Nếu nó không rỗng
    if ($image)
    {
      // Lấy tên gốc của file
      $filename = stripslashes($_FILES['hinhanh']['name']);
      //Lấy phần mở rộng của file
      $extension = getExtension($filename);
      $extension = strtolower($extension);
      // Nếu nó không phải là file hình thì sẽ thông báo lỗi
      if (($extension != "jpg") && ($extension != "jpeg") && ($extension !=
      "png") && ($extension != "gif"))
      {
      // xuất lỗi ra màn hình
       echo "<script> alert('Đây không phải là file hình, vui lòng kiểm tra lại.');</script>";
      $errors=1;
      }
      else
      {
        //Lấy dung lượng của file upload
        $size=filesize($_FILES['hinhanh']['tmp_name']);
        if ($size > MAX_SIZE*1024)
        {
           echo "<script> alert('Dung lượng file vượt quá quy định, xin hãy chọn file có kích thước nhỏ hơn.');</script>";
          $errors=1;
        }
     
        // đặt tên mới cho file hình up lên
        $image_name=md5(mt_rand()).'.'.$extension;
        // gán thêm cho file này đường dẫn
        $newname="../images/avatar/".$image_name;

        // kiểm tra xem file hình này đã upload lên trước đó chưa
        $copied = copy($_FILES['hinhanh']['tmp_name'], $newname);
        if (!$copied)
        {
          echo "<script> alert('File này đã tồn tại rồi, kiểm tra lại.');</script>";
          $errors=1;
        }
      }
        
      }
       
       // neu khong co loi thi tien hanh xoa file cu va doi lai ten anh thanh ten anh moi
      if(isset($_POST['btn_xacnhan']) && $errors==0)
      {
        $taikhoan=$_SESSION['username'];
        $info_nd=thongtinNguoiDung($taikhoan);
        while ($row_info_nd=mysql_fetch_array($info_nd)) {
          $anh_cu=$row_info_nd['anh_nguoi_dung'];
        }

        $patch="../images/avatar/".$anh_cu;
        unlink($patch);
        
        $tenanh=$image_name;
        doitenAnh($taikhoan,$tenanh);

        echo "<script> location.replace('index.php?p=hosocanhan'); </script>";
      }


    //Doi thong tin ca nhan
    
      
  }
?>
