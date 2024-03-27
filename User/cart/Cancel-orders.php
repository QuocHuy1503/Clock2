<?php
$orderId = $_GET['order_id'];
include_once("../../connect/open.php");
$sql = "UPDATE orders SET order_status = '4' WHERE order_id = '$orderId'";
mysqli_query($connect, $sql);
include_once("../../connect/close.php");
session_start();
$_SESSION['cancel_order'] = 1;
header("Location: History.php");