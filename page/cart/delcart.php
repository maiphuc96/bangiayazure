<?php
session_start();
$cart=$_SESSION['cart'];
$id=$_GET['productid'];
if($id == 0)
{
	unset($_SESSION['cart']);
}
else
{
unset($_SESSION['cart'][$id]);
}

   echo "<script> location.replace('index.php?p=giohangds'); </script>";

?>