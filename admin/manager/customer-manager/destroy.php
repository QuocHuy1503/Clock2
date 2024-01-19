<?php
$id = $_GET['id'];
include_once '../../../Connect/Connect.php';
$sql = "DELETE FROM customer WHERE id = '$id'";
mysqli_query($connect, $sql);
include_once '../../../Connect/Close.php';
header('Location:index.php');
?>