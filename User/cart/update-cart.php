<?php
session_start();
//Lấy mảng quantity gồm id sản phẩm và số lượng
$quantities = $_POST["quantity"];
//foreach để lấy id và quantity
foreach ($quantities as $id => $quantity){
    //Update quantity của các sản phẩm có id tương ứng trên cart
    $_SESSION['cart'][$id] = $quantity;
}
/* Đặt một câu lệnh để còn không cho nó xuống âm*/
//Quay về trang giỏ hàng
header("Location:index.php");
?>