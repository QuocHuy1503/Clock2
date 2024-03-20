 <!--`clock_id`, `clock_name`, `publication_year`,`quantity`, `price`,`item_status`, `category_id`,`image`,`description` -->
 <?php
$watch_name = $_POST['watch_name'];
$publication_year = $_POST['publication_year'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$item_status = $_POST['item_status'];
$category_id = $_POST['category_id'];
if(isset($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
}
$description = $_POST['description'];
include_once '../../../connect/open.php';
$sql = "INSERT INTO watch
        (watch_name, publication_year, quantity, price, item_status, category_id, description, image) 
        VALUES ('$watch_name', '$publication_year', '$quantity', '$price', '$item_status', '$category_id', '$description', '$image')";
mysqli_query($connect, $sql);
mysqli_close($connect);
//Lưu ảnh từ vị trí hiện tại của ảnh vào thư mục image
//Kiểm tra ảnh đã tồn tại hay chưa
if(!file_exists("../../img-sanpham/" . $image)){
    //Lấy được đường dẫn hiện tại của ảnh
    $path = $_FILES['image']['tmp_name'];
    //Lưu ảnh từ đường dẫn hiện tại vào folder
    move_uploaded_file($path, "../../img-sanpham/" . $image);
}
header('Location:table-data-product.php');
 include_once '../../../connect/close.php';
?>