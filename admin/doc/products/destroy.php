<?php
//Lấy id của bản ghi cần xóa
$id = $_GET['watch_id'];
//Mở kết nối
include_once '../../../connect/open.php';
//Viết query để xóa bản ghi
$sql = "DELETE FROM watch WHERE watch_id = '$id'";
//Chạy query
mysqli_query($connect, $sql);
//Đóng kết nối
include_once '../../../connect/close.php';
//Quay về danh sách
header('Location: table-data-product.php');
?>