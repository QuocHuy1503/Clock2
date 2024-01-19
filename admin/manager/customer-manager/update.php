<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
include_once '../../../Connect/Connect.php';
$sql = "UPDATE customer SET name = '$name', email = '$email', password = '$password' , phone ='$phone' , gender = '$gender', address = '$address' WHERE id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php');
?>