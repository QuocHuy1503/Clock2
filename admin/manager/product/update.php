<?php
$clock_id = $_POST['clock_id'];
$clock_name = $_POST['clock_name'];
$publication_year = $_POST['publication_year'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$description = $_POST['description'];
$category_id = $_POST['category_id'];
$image = $_FILES['image']['name'];
include_once '../../../connect/open.php';
$sql = "UPDATE clock SET clock_name = '$clock_name', publication_year = '$publication_year' ,quantity = '$quantity' , price = '$price' , description ='$description', category_id = '$category_id' , image = '$image' WHERE clock_id = '$clock_id'";

mysqli_query($connect, $sql);
mysqli_close($connect);
if(!file_exists('../../../Asset/img' . $image)){
    //Lấy path của ảnh
    $path = $_FILES['image']['tmp_name'];
    //Lưu ảnh
    move_uploaded_file($path, '../../Asset/img' . $image);
}
header('Location:index.php');
?>