<?php
$id = $_POST['id'];
$status = $_POST['status'];
include_once '../../../connect/open.php';
$sql = "UPDATE orders SET status = '$status' where id = '$id'";
$orders = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
header('Location:./index.php');
?>

