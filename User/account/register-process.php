<?php
session_start();
//Lấy email, password
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password=$_POST['confirm_password'];
//Mở kết nối
include_once '../../connect/open.php';
$sql = "select email,count(email) AS countemail from customer where email='$email'; ";
$customer = mysqli_query($connect, $sql);
foreach ($customer as $customer) {
    if ($customer['countemail'] > 0) {
        header("Location:register.php?erro=0");
    } else {
        if ($password == $confirm_password) {
            $sql = "INSERT INTO customer(email,password) values ('$email','$password')";
//chạy query
            mysqli_query($connect, $sql);
            mysqli_close($connect);
            header("Location:register2.php?email=$email");
        } else {
            header("Location:register.php?erro=1");
        }
    }
}
?>