<?php
session_start();
//Lấy id của sản phẩm cần xóa
$id = $_GET['id'];
//Xóa sản phẩm trên cart
unset($_SESSION['cart'][$id]);
//Quay lại trang giỏ hàng
header("Location:index.php");
?>