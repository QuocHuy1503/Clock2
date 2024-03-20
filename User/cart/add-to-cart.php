<?php
session_start();
//Lấy id product được thêm lên cart
$id = $_GET['watch_id'];
//Kiểm tra đã tồn tại cart trên session chưa
if(isset($_SESSION['cart'])){
    //Kiểm tra đã tồn tại sp trên cart hay chưa
    if(isset($_SESSION['cart'][$id])){
        //Tăng quantity lên 1
        $_SESSION['cart'][$id]++;
    } else {
        //Thêm sp có id vừa được lấy lên cart với quantity = 1
        $_SESSION['cart'][$id] = 1;
    }
} else {
    //Tạo cart
    $_SESSION['cart'] = array();
    //Thêm sp có id vừa được lấy lên cart với quantity = 1
    $_SESSION['cart'][$id] = 1;
}
//Nhảy sang trang view cart
header("Location:../cart/index.php");
?>