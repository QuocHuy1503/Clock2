<?php
session_start();
//Lấy email, password
$email = $_POST['email'];
$password = $_POST['password'];
//Mở kết nối
include_once '../../connect/open.php';
//query
$sql = "SELECT *, COUNT(id) AS count_account_customer FROM customer WHERE email = '$email' AND password = '$password'";
//chạy query
$accounts = mysqli_query($connect, $sql);
foreach ($accounts as $account){
    //Kiểm tra có tồn tại account hay không
    if($account['count_account_customer'] == 0){
        header("Location:login.php?wrong=1");
    } else {
        //Tồn tại account, đưa id lên session
        $_SESSION['id'] = $account['id'];
        $_SESSION['email'] = $email;
        //Sang trang danh sách sản phẩm
        header("Location:../product/index.php");
    }
}
//Đóng kết nối
include_once '../../connect/close.php';
?>
