<?php
//Khai báo sử dụng session
//session_start();
 


//Kiem tra viec dang nhap ngay tren trang dang nhap
//Xử lý đăng nhập
if (isset($_POST['btn_dangnhap'])) 
{
    //Kết nối tới database  
  //Su dung duong dan tuong doi tranh tinh trang sai path
   include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
       echo "<script> alert('Vui lòng nhập đầy đủ Tên đăng nhập và Mật khẩu.');</script>";
       echo "<script> location.replace('index.php?p=dangnhap'); </script>";
        exit;
    }
     
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysql_query("SELECT tai_khoan,mat_khau,ho_ten FROM nguoidung WHERE tai_khoan='$username'");
    if (mysql_num_rows($query) == 0) {
       echo "<script> alert('Tên đăng nhập này không tồn tại, vui lòng kiểm tra lại.');</script>";
       echo "<script> location.replace('index.php?p=dangnhap'); </script>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysql_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['mat_khau']) {
       echo "<script> alert('Mật khẩu không trùng khớp, vui lòng kiểm tra lại.');</script>";
       echo "<script> location.replace('index.php?p=dangnhap'); </script>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    $_SESSION['hoten'] = $row['ho_ten'];
    echo "<script> alert('Bạn đã đăng nhập thành công');</script>";
    echo "<script> location.replace('index.php'); </script>";
    die();
}


//Khoi phuc mat khau
if (isset($_POST['btn_khoiphuc']))
{
    if (isset($_POST['txtEmail']))
    {
      if (checkTaiKhoan($_POST['txtEmail']) ==1)
      {
          //Email cần gới đển
          $to = addslashes($_POST['txtEmail']);; 

          //Tiêu đề email
          $subject = "Khôi phục mật khẩu"; 

          $code=md5(mt_rand());
          //Nội dung email
          $comment = "Xin chào ".$to." .Bạn vừa yêu cầu một mật khẩu mới tại SHOES SHOP, mã xác nhận của bạn là  ".$code;

          $header = "From:google@gmail.com \r\n";

          $send=mail($to, $subject, $comment, $header);
          
          if($send){
              mysql_query("UPDATE nguoidung SET code='$code' WHERE tai_khoan='$to'");
              echo "<script> alert('Một mã xác nhận vừa được gửi đến email của bạn. Bạn vui lòng kiểm tra email');</script>";
               echo "
                    <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-group'>
                               <a href='#xacnhan' data-toggle='modal' style='left: center;'>Để sử dụng mã xác nhận, nhấn vào đây</a>
                            </div>
                    </div>
               ";
          }else{
              echo "<script> alert('Lỗi, không thực hiện được');</script>";
              echo "<script> location.replace('index.php?p=dangnhap'); </script>";
          }
          
      }
      else {
          echo "<script> alert('Tài khoản này không tồn tại, vui lòng kiểm tra lại.');</script>";
          echo "<script> location.replace('index.php?p=dangnhap'); </script>";
        exit;
      }

    }  
}

//Dung ma xac nhan + email de doi mat khau
if (isset($_POST['btn_maxacnhan']))
{
  $code=$_POST['txtMaXacNhan'];
  $email=$_POST['txtEmail'];
  $pass=$_POST['txtPass'];
  $passagain=$_POST['txtPassAgain'];
  if ($pass!=$passagain)
  {
        echo "<script> alert('Mật khẩu không khớp, Bạn sẽ phải gửi mã xác nhận mới để tiếp tục.');</script>";
        echo "<script> location.replace('index.php?p=dangnhap'); </script>";
        exit;//Thoat chuong trinh 
  }
  $len1=strlen($pass);
  $len2=strlen($passagain);
  if ($len1<6 || $len2<6){
      echo "<script> alert('Mật khẩu phải có ít nhất 6 kí tự.Bạn sẽ phải gửi mã xác nhận mới để tiếp tục.');</script>";
      echo "<script> location.replace('index.php?p=dangnhap'); </script>";
    
      
      exit;
  }
  //Kiem tra email da ton tai hay chua
  if (checkTaiKhoan($email) ==1)
  {    
      if (checkCode($email,$code) ==1)
      {
          $pass=md5($pass);
          $qr = mysql_query("UPDATE nguoidung SET mat_khau='$pass' WHERE tai_khoan='$email' and code='$code'");
          if ($qr == 0)
          {
            echo "<script> alert('Lỗi vui lòng thử lại sau.');</script>";
            echo "<script> location.replace('index.php?p=dangnhap'); </script>";
            exit;//Thoat chuong trinh
          }
          else
          {
            echo "<script> alert('Đổi mật khẩu thành công.');</script>";
            echo "<script> location.replace('index.php?p=dangnhap'); </script>";
            exit;//Thoat chuong trinh
          }
      }
      else
       {
        echo "<script> alert('Mã xác nhận không đúng, vui lòng yêu cầu gửi mã xác nhận mới.');</script>";
        echo "<script> location.replace('index.php?p=dangnhap'); </script>";
        exit;//Thoat chuong trinh
      }
  }
  else
  {
        echo "<script> alert('Email không đúng, kiểm tra lại.');</script>";
        echo "<script> location.replace('index.php?p=dangnhap'); </script>";
        exit;//Thoat chuong trinh
  }
}
            
?>


<link rel="stylesheet" href="css/dangnhap.css">
<section id="form_dangnhap"><!--form-->
   <form action="index.php?p=dangnhap" method="post">
     <div class="container">
      <div class="row">
         <div class="col-md-6 col-md-offset-3">
            <div class="panel with-nav-tabs panel-info">
               <div class="panel-heading">
                  <h1 id="td_dangnhap">Thông Tin Đăng Nhập</h1>
               </div>

               <div class="panel-body">
                  <div class="tab-content">
                     <div id="login" >
                        <div class="container-fluid">
                           <div class="row">
                             <hr />

                             <div class="row">
                               <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Tài khoản</label></div>
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                 <div class="form-group">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-envelope"></span>
                                       </div>

                                       <input required="required" type="text" placeholder="Tài khoản." name="txtUsername" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="row">
                             <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Mật khẩu</label></div>
                             <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">

                                 <div class="input-group">
                                    <div class="input-group-addon">
                                       <span class="glyphicon glyphicon-lock"></span>
                                    </div>

                                    <input required="required" type="password" placeholder="Mật khẩu đăng nhập." name="txtPassword" class="form-control">
                                 </div>

                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <a href="#">Quên mật khẩu</a>
                              </div>
                           </div>
                        </div>


                        <hr />
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12">
                              <button type="submit" name ="btn_dangnhap" class="btn btn-success btn-block btn-lg"> Đăng nhập </button>
                           </div>
                        </div>


                     </div>
                  </div> 
               </div> 
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</form>

<!--Form Khoi phuc mat khau-->
<form action="index.php?p=dangnhap" method="post">
<div class="modal fade" id="forgot">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
            <h4 class="modal-title" style="font-size: 32px; padding: 12px;"> Khôi phục mật khẩu </h4>
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
                           <input type="email" required="required" class="form-control" placeholder="Nhập email của bạn " name="txtEmail">

                        </div>
                     </div>
                  </div>
               </div>

               
            </div>
         </div>

         <div class="modal-footer">
            <div class="form-group">
               <button type="submit" name="btn_khoiphuc"class="btn btn-lg btn-info"> Xác nhận <span class="glyphicon glyphicon-saved"></span></button>

               <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Hủy <span class="glyphicon glyphicon-remove"></span></button>
            </div>
         </div>
      </div>
   </div>
</div>
</form>
</section><!--/form-->


<!--Form Doi mat khau bang email + ma xac nhan-->
<form action="index.php?p=dangnhap" method="post">
<div class="modal fade" id="xacnhan">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
            <h4 class="modal-title" style="font-size: 32px; padding: 12px;"> Nhập mã xác nhận </h4>
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
                           <input type="email" required="required" class="form-control" placeholder="Nhập email " name="txtEmail">
                           <input type="text" required="required" style="margin-top: 3px" class="form-control" placeholder="Nhập mã xác nhận " name="txtMaXacNhan">
                          <input type="password" required="required" style="margin-top: 3px" class="form-control" placeholder="Nhập mật khẩu mới" name="txtPass">
                          <input type="password" required="required" style="margin-top: 3px" class="form-control" placeholder="Nhập lại mật khẩu mới" name="txtPassAgain">
                        </div>
                     </div>
                  </div>
               </div>

        
            </div>
         </div>

         <div class="modal-footer">
            <div class="form-group">
               <button type="submit" name="btn_maxacnhan"class="btn btn-lg btn-info"> Xác nhận <span class="glyphicon glyphicon-saved"></span></button>

               <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Hủy <span class="glyphicon glyphicon-remove"></span></button>
            </div>
         </div>
      </div>
   </div>
</div>
</form>
</section><!--/form-->


