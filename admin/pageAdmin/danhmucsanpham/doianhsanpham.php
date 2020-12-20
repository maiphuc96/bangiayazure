
<form action="" method="post" enctype="multipart/form-data">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"
    id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;margin-top: 5px">CẬP NHẬT ẢNH SẢN PHẨM
  </div>
    
    <div class="input-group image-preview col-xs-12 col-sm-12 col-md-12 col-lg-12">     
      <span class="input-group-btn col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <!-- image-preview-clear button -->
          <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
              <span class="glyphicon glyphicon-remove"></span> Xóa
          </button>
          <!-- image-preview-input -->
          <div class="btn btn-default image-preview-input" style="margin-top: 5px;margin-left: 0px">
              <span class="fas fa-folder-open"></span>
              <span class="image-preview-input-title" id="nomal_lable">Chọn hình</span>
              <br>
              <input required  type="file" accept="image/png, image/jpeg" name="hinhanh"/> <!-- rename it -->
          </div>
      </span>
     
      <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-4 col-lg-offset-2 col-lg-4" style="margin-top: 5px;margin-bottom: 5px">
        <input type="submit" name="btn_ok" class="btn btn-info" value="Cập nhật ảnh sản phẩm" style="width: 100%;">
      </div>
     
      <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-4" style="margin-top: 5px">
        <button  id="btn_huy" onclick="huy" class="btn btn-info pull-right" style="width: 100%; border-radius: 0px;">Hủy bỏ</button>
      </div>
     
    </div>
</form>
   
<script>
    //Xu li theo lua chon: Yes or No
    $("#btn_huy").on('click',function(){

      if(huy()){//Neu chon yes thi huy
       location.replace('index.php?p=danhmucsanpham&idloai=1');
      }
      
    });

    //Dua ra thong bao lua chon cho nguoi dung
    function huy(){
      var status = confirm("Bạn chắc chắn hủy việc cập nhật ảnh sản phẩm này ?");
        if(status)
        {
            return true;
        }
      return false;
    }
</script>


<?php
  // Ấn định  dung lượng file ảnh upload
  define ("MAX_SIZE","10000");
   
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
  if (isset($_POST['btn_ok']))
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
                        $newname="../images/sanpham/".$image_name;

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

      if(isset($_POST['btn_ok']) && $errors==0)
      {
        $idsp=$_GET['idsp'];
        $ct=chitietSPbyID($idsp);
        while ($row_ct=mysql_fetch_array($ct)) {
            $url=$row_ct['anh_san_pham'];
        }
        $patch="../images/sanpham/".$url;
        unlink($patch);
        $tenanh=$image_name;
        if (doitenAnh($idsp,$tenanh))
        {
             echo "<script> alert('Cập nhật ảnh sản phẩm thành công');</script>";
             $idloai=$_GET['idloai'];
             echo "<script> location.replace('index.php?p=danhmucsanpham&idloai=";echo $idloai;echo"'); </script>";
            
            
        }
      }
      else{
          echo "<script> alert('Thao tác thất bại. Vui lòng thử lại');</script>";
      }

    //Doi thong tin ca nhan
    
      
  }
?>
