<?php
$name = $_POST['user_name'];
$phone =$_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$email = $_POST['email'];
$status = $_POST['status'];
include_once '../../../connect/open.php';
$sql = "UPDATE user SET name = '$name', phone = '$phone', 
                        address = '$address', password = '$password',  
                        email = '$email' , status = '$status'";
$updateUser = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
header('index.php');
?>