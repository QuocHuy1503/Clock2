<?php
$watch_id = $_POST['watch_id'];
$watch_name = $_POST['watch_name'];
$publication_year = $_POST['publication_year'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$item_status = $_POST['status'];
$category_id = $_POST['category_id'];
if(isset($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
}
include_once '../../../connect/open.php';
$sql = "UPDATE watch SET watch_name = '$watch_name', publication_year = '$publication_year', 
                 description = '$description', price = '$price', quantity = '$quantity',  
                 status = '$item_status', category_id = '$category_id' , image = '$image' WHERE watch_id = '$watch_id'";
//
//Lưu ảnh từ vị trí hiện tại của ảnh vào thư mục image
//Kiểm tra ảnh đã tồn tại hay chưa
if(!file_exists("../../../Asset/img" . $image)){
    //Lấy được đường dẫn hiện tại của ảnh
    $path = $_FILES['image']['name'];
    //Lưu ảnh từ đường dẫn hiện tại vào folder
    move_uploaded_file($path, "../../../Asset/img" . $image);
}
$updateProduct = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
header('Location:table-data-product.php');
?>