<?php
$id = $_POST['id'];
$name = $_POST['name'];
include_once '../../../Connect/Connect.php';
$sql = "INSERT INTO categories(name) VALUES ('$name')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php');
?>