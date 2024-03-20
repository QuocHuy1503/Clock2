<?php
session_start();
//Kiểm tra đã login chưa
if(isset($_SESSION['id'])){
    //Lấy ngày hiện tại
    $dateBuy = date('Y-m-d');
    //Lấy status (status mặc định là 0 tương ứng với trạng thái chờ xác nhận của đơn hàng)
    $status = 0;
    //Lấy id của customer
    $customer_id = $_SESSION['id'];
    //Lấy tên và số điện thoại và địa chỉ người nhận
    // $receiver_name = $_POST['receiver_name'];
    // $receiver_phone = $_POST['receiver_phone'];
    // $receiver_address = $_POST['receiver_address'];
    //Mở kết nối
    include_once '../../Connects/open.php';
    //Query thêm dữ liệu lên bảng orders
    // $sqlInsertOrder = "INSERT INTO orders(date_buy, status, customer_id,receiver_name,receiver_phone,receiver_address) VALUES ('$dateBuy', '$status', '$customer_id ', '$receiver_name','$receiver_phone','$receiver_address' )";
    $sqlInsertOrder = "INSERT INTO orders(date_buy, status, customer_id) VALUES ('$dateBuy', '$status', '$customer_id ', '$receiver_name','$receiver_phone','$receiver_address' )";
    //Chạy query insert dữ liệu lên bảng orders
    mysqli_query($connect, $sqlInsertOrder);
    //query lấy order_id lớn nhất của customer đang login hiện tại
    $sqlMaxOrderId = "SELECT MAX(id) AS max_order_id FROM orders WHERE customer_id = '$customer_id'";
    //Chạy query lấy max_order_id
    $maxOrderIds = mysqli_query($connect, $sqlMaxOrderId);
    //foreach để lấy max_order_id
    foreach ($maxOrderIds as $maxOrderId){
        $order_id = $maxOrderId['max_order_id'];
    }
    //Lấy giỏ hàng về
    $cart = $_SESSION['cart'];
    foreach ($cart as $book_id => $quantity){
        //Lấy dữ liệu để insert lên bảng order_details
        //Query để lấy price của product
        $sqlSelectPrice = "SELECT price FROM books WHERE id = '$book_id'";
        //Chạy query lấy price của product
        $productPrices = mysqli_query($connect, $sqlSelectPrice);
        //foreach để lấy price
        foreach ($productPrices as $productPrice){
            $price = $productPrice['price'];
            $sqlInsertOrderDetail = "INSERT INTO order_details(book_id,order_id,price,quantity) VALUES ('$book_id','$order_id','$price','$quantity')";
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
    header("Location:../Account/login.php");
}
?>