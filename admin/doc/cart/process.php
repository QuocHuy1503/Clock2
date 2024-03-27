<?php
$order_id = $_POST['order_id'];
$order_status = $_POST['order_status'];
include_once '../../../connect/open.php';
$sql = "UPDATE orders SET order_status = '$order_status' where order_id = '$order_id'";
$orders = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
header('Location:./table-data-order.php');
?>