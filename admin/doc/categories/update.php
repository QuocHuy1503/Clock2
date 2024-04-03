<?php
$id = $_POST['id'];
$name = $_POST['name'];
include_once '../../../connect/open.php';
$sql = "UPDATE categories SET name = '$name' WHERE id = '$id'";
$updateCategories = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
header('Location:table-data-categories.php');
?>