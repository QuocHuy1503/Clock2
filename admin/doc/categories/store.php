 <!--`clock_id`, `clock_name`, `publication_year`,`quantity`, `price`,`item_status`, `category_id`,`image`,`description` -->
 <?php
$name = $_POST['name'];
include_once '../../../connect/open.php';
$sql = "INSERT INTO categories
        (name) 
        VALUES ('$name')";
mysqli_query($connect, $sql);
mysqli_close($connect);
//Lưu ảnh từ vị trí hiện tại của ảnh vào thư mục image
//Kiểm tra ảnh đã tồn tại hay chưa
header('Location:table-data-categories.php');
 include_once '../../../connect/close.php';
?>