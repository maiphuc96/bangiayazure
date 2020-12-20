<?php

if (isset($_POST['btn_dangki']))
{
    //include $_SERVER["DOCUMENT_ROOT"] . "/function/trangchu.php";
    //Lay du lieu tu form dang ki
    $username   = addslashes($_POST['txtUserName']);
    $email = addslashes($_POST['txtEmail']);

    //Kiem tra email da ton tai hay chua
    if (checkTaiKhoan($email) ==1)
    {    
        echo "<script> alert('Tài khoản này đã tồn tại, vui lòng kiểm tra lại.');</script>";
        echo "<script> location.replace('index.php?p=dangki'); </script>";
        exit;//Thoat chuong trinh 
    }
    else{

        $SDT   = addslashes($_POST['txtSDT']);
        $password1   = addslashes($_POST['txtPassword1']);
        $password2   = addslashes($_POST['txtPassword2']);
    

        $len1=strlen($password1);
        $len2=strlen($password2);
        
        if ($len1<6 || $len2<6){
            echo "<script> alert('Mật khẩu phải có ít nhất 6 kí tự.');</script>";
            echo "<script> location.replace('index.php?p=dangki'); </script>";
            exit;
        }
        //Kiem tra mat khau co khop hay khong
        if ($password1 != $password2)
        {
            echo "<script> alert('Mật khẩu không khớp, vui lòng kiểm tra lại.');</script>";
            echo "<script> location.replace('index.php?p=dangki'); </script>";
            exit;
        }
        else
            {
                $password = md5($password1);
                $diachi   = addslashes($_POST['txtDiaChi']);     
        
                //Lưu thông tin thành viên vào bảng
                addNguoiDung($email,$username,$SDT,$password,$diachi);
               

               //Kiem tra email da duoc dang ki hay chua
               
                    if (checkTaiKhoan($email)==1)
                    { 
                        echo "<script> alert('Đăng kí tài khoản thành công.');</script>";
                        echo "<script> location.replace('index.php?p=dangnhap'); </script>";
                    
                    }
                    else{
                        echo "<script> alert('Lỗi, vui lòng đăng kí lại.');</script>";
                        echo "<script> location.replace('index.php?p=dangki'); </script>";
                        exit;
                    }
                


            }
    }
}
else exit;

?>
