
<div class="row" style="border: 1px solid;">
	<label id="nomal_lable" style="text-transform: uppercase;width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">THÊM SẢN PHẨM MỚI</label>
	
  <form action="" method="post" enctype="multipart/form-data">
  		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
  			<div class="shopper-info" id="themsp_lable">
  			
  					<div >Tên sản phẩm</div>
  					<input type="text" required name="txtTenSanPham" placeholder="Nhập tên sản phẩm." id="themsp">
  					<div >Loại sản phẩm</div>
  					<select id="themsp" name="opLoaiSP" class="form-control" name="th">
    					<?php
    					$dsloai = dsLoaiSPct();
    					while ($row_dsloai=mysql_fetch_array($dsloai)) {
    					?>
    						<option value="<?php echo $row_dsloai['id_loai_san_pham']?>"> <?php echo $row_dsloai['ten_loai_san_pham']?> </option>
    					<?php
    					}
    					?>                                
       		  </select>

         		<div >Trạng thái</div>
         		<select id="themsp" name="opKinhDoanh" class="form-control" name="th">
  			          <option value="0"> Chưa kinh doanh</option>
                  <option value="1"> Kinh doanh</option>               
         		</select>

  					<div >giá</div>
  					<input id="themsp" required type="text" name="txtGia" placeholder="Nhập giá sản phẩm" id="nomal_lable">
            <div >Kích cỡ</div>
  					<input id="themsp"  required type="text" name="txtSize" placeholder="Nhập size sản phẩm" id="nomal_lable">
            
            <div >Số lượng</div>
  					<input id="themsp"  required type="text" name="txtSoLuong" placeholder="Nhập số lượng sản phẩm" id="nomal_lable">
            
           
  					<div class="input-group image-preview" style="margin-bottom: 10px;">
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Xóa
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="fas fa-folder-open"></span>
                        <span class="image-preview-input-title" id="nomal_lable">Chọn hình</span>
                        <input required  type="file" accept="image/png, image/jpeg" name="hinhanh"/> <!-- rename it -->
                    </div>
                </span>
            </div>
                		
  			</div>
  		</div>

  	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  		<div class="shopper-info" id="themsp_lable">
  			<div style="font-weight: normal;color: #ffffff;text-align: center;text-transform: initial;background-color: #fe980f;">Thông tin sản phẩm </div>
  			<textarea name="thongtinsanpham" id="thongtinsanpham" ></textarea>
  			<script>CKEDITOR.replace('thongtinsanpham');</script>
  			
  		</div>
  	</div>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <button type="button"  id="btn_huy" OnClick="huy" class="btn btn-info" style="  border-radius: 0px;width: 100%;margin-bottom: 5px;margin-top: 5px">HỦY BỎ</button>
      </div>
  			
  		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <button type="submit" name="btn_hoantat" class="btn btn-warning pull-right"  style=" border-radius: 0px;width: 100%;margin-top: 5px">HOÀN TẤT</button>
      </div>
  </form>
</div>

<script>
	//Xu li theo lua chon: Yes or No
	$("#btn_huy").on('click',function(){

	  if(huy()){//Neu chon yes thi huy
	   location.replace('index.php?p=danhmucsanpham&idloai=1');
	  }
	  
	});

	//Dua ra thong bao lua chon cho nguoi dung
	function huy(){
	  var status = confirm("Bạn chắc chắn hủy việc thêm sản phẩm mới ?");
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
  if (isset($_POST['btn_hoantat']))
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

      if(isset($_POST['btn_hoantat']) && $errors==0)
      {
        //Them thong so cua san pham tai day
      	$tensp=$_POST['txtTenSanPham'];
      	$idloai=$_POST['opLoaiSP'];
      	$kinhdoanh=$_POST['opKinhDoanh'];
      	$gia=$_POST['txtGia'];
      	$thongtinsanpham=$_POST['thongtinsanpham'];
      	$size=$_POST['txtSize'];
      	$soluong=$_POST['txtSoLuong'];

      	$n=checkSP($tensp,$idloai,$size);
      	while ($row_n=mysql_fetch_array($n)) {
      		$count=$row_n['num'];
      	}

      	if ($count>0)
      	{
      		 echo "<script> alert('Sản phẩm này đã có rồi, vui lòng kiểm tra lại.');</script>";
      	}
      	if ($count==0){
          if ($size<20 || $size >50 || $gia<=0){
            echo "<script> alert('Giá hoặc size không hợp lệ! (Giá lớn hơn 0 và Size từ 20  tới 50 ).');</script>";
            exit();
          }
          else{
              if (themSP($tensp,$idloai,$image_name,$thongtinsanpham,$kinhdoanh,$gia,$size,$soluong))
            {
               echo "<script> alert('Thêm sản phẩm thành công.');</script>";
               echo "<script>location.replace('index.php?p=danhmucsanpham&idloai=";echo $idloai;echo"');</script>";
            }
            else{
             echo "<script> alert('Thao tác thất bại.');</script>";
            }
          }

      	}
      }
      else{
      	  echo "<script> alert('Thao tác thất bại. Vui lòng thử lại');</script>";
      }

    //Doi thong tin ca nhan
    
      
  }
?>