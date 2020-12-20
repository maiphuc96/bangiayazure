<?php 
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session dang nhap
}
echo "<script> location.replace('index.php'); </script>";
//header("location : ...") bi loi nen dung js de dieu hương

?>

