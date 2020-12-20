
<?php 
$id=$_GET['idSanPham'];

//echo "sản phẩm : $id";
//Neu la lan thu 2 mua hang thi tiep tuc tang so luong hang len 1 don vi
if(isset($_SESSION['cart'][$id]))
{
	$qty = $_SESSION['cart'][$id] + 1;
}
else
{
	//Lan dau mua hang nen so luong la 1
	$qty=1;
}
//Gan so luong hang sho session cart tuong ung voi id cua san pham
$_SESSION['cart'][$id]=$qty;
echo "<script> location.replace('index.php?p=giohangds'); </script>";
?>
