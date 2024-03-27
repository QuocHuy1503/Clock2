<?php
session_start();
//Kiểm tra đã login chưa
if(isset($_SESSION['user_id'])){
    //Lấy ngày hiện tại
    $order_date = date('Y-m-d');
    //Lấy status (status mặc định là 0 tương ứng với trạng thái chờ xác nhận của đơn hàng)
    $order_status = 0;
    //Lấy id của customer
    $user_id = $_SESSION['user_id'];
    //Lấy tên và số điện thoại và địa chỉ người nhận
    $receiver_name = $_POST['receiver_name'];
    $receiver_phone = $_POST['receiver_phone'];
    $receiver_address = $_POST['receiver_address'];
    //Mở kết nối
    include_once '../../connect/open.php';
    //Query thêm dữ liệu lên bảng orders
    $sqlInsertOrder = "INSERT INTO orders(order_date, order_status, user_id,receiver_name,receiver_phone,receiver_address) 
VALUES ('$order_date', '$order_status', '$user_id', '$receiver_name','$receiver_phone','$receiver_address' )";
    //Chạy query insert dữ liệu lên bảng orders
    mysqli_query($connect, $sqlInsertOrder);
    //query lấy order_id lớn nhất của customer đang login hiện tại
    $sqlMaxOrderId = "SELECT MAX(order_id) AS max_order_id FROM orders WHERE user_id = '$user_id'";
    //Chạy query lấy max_order_id
    $maxOrderIds = mysqli_query($connect, $sqlMaxOrderId);
    //foreach để lấy max_order_id
    foreach ($maxOrderIds as $maxOrderId){
        $order_id = $maxOrderId['max_order_id'];
    }
    //Lấy giỏ hàng về
    $cart = $_SESSION['cart'];
    foreach ($cart as $watch_id => $sold_quantity){
        //Lấy dữ liệu để insert lên bảng order_details
        //Query để lấy price của product
        $sqlSelectPrice = "SELECT price FROM watch WHERE watch_id = '$watch_id'";
        //Chạy query lấy price của product
        $productPrices = mysqli_query($connect, $sqlSelectPrice);
        //foreach để lấy price
        foreach ($productPrices as $productPrice){
            $subtotal = $productPrice['subtotal'];
            $sqlInsertOrderDetail = "INSERT INTO order_details(watch_id,order_id,subtotal,sold_quantity) 
VALUES ('$watch_id','$order_id','$subtotal','$sold_quantity')";
            //Chạy query insert order_detail
            mysqli_query($connect, $sqlInsertOrderDetail);
        }
        //Query insert dữ liệu lên bảng order_detailsx
    }
    //Xóa cart
    unset($_SESSION['cart']);
    //Quay về trang giỏ hàng
    header("Location:Order_Completion.php");
} else {
    //Quay về trang login
    header("Location:../account/login.php");
}
?>