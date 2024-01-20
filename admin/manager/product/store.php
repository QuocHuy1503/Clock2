<?php
$clock_name = $_POST['clock_name'];
$publication_year = $_POST['publication_year'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image = $_FILES['image']['name'];
$category_id = $_POST['category_id'];
include_once '../../../connect/open.php';
$sql = "INSERT INTO clock(clock_name,publication_year,description,price,quantity,image,category_id) VALUES ('$clock_name','$publication_year','$description','$price','$quantity','$image','$category_id')";
mysqli_query($connect, $sql);
mysqli_close($connect);
if(!file_exists("../../../Asset/img" . $image)) {
    //Lấy được đường dẫn hiện tại của ảnh
    $path = $_FILES['image']['tmp_name'];
    //Lưu ảnh từ đường dẫn hiện tại vào folder
    move_uploaded_file($path, "../../../Asset/img" . $image);
}
header('Location:index.php');
?>