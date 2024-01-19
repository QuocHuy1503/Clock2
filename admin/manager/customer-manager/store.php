<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
include_once '../../../Connect/Connect.php';
$sql = "INSERT INTO customer(name,email,password,phone,gender,address) VALUES ('$name','$email','$password','$phone','$gender','$address')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php');
?>