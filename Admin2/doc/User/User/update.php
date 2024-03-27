<?php
$id = $_POST['user_id'];
$name = $_POST['user_name'];
$phone =$_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$email = $_POST['email'];
$status = $_POST['status'];
include_once '../../../connect/open.php';
$sql = "UPDATE user SET user_name = '$name', phone = '$phone', 
                        address = '$address', password = '$password', email = '$email' , status = '$status' WHERE user_id = '$id'";
$updateUser = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
header('Location:index.php');
?>