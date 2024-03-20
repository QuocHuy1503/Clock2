<?php
session_start();
//Xóa cart
unset($_SESSION['cart']);
//Quay lại trang giỏ hàng
header("Location:index.php");
?>