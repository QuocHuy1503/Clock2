<!doctype html>
<html lang="en">
<head>
   <link rel="stylesheet" href="../../admin.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/js/jquery.min.js">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List's Laptops</title>
</head>
<body>
<?php
include_once '../../../connect/open.php';
$search = "";
//Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
//Khai báo số bản ghi 1 trang
$recordOnePage = 3;
//Query để lấy số bản ghi
$sqlCountRecord = "SELECT COUNT(*) AS count_record FROM clock WHERE clock_name LIKE '%$search%'";
//Chạy query lấy số bản ghi
$countRecords = mysqli_query($connect, $sqlCountRecord);
//foreach để lấy số bản ghi
foreach ($countRecords as $countRecord){
    $records = $countRecord['count_record'];
}
//Tính số trang
$countPage = ceil($records / $recordOnePage);
//Lấy trang hiện tại (nếu không tồn tại page hiện tại thì page hiện tại = 1)
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
//Tính bản ghi bắt đầu của trang
$start = ($page - 1) * $recordOnePage;
//Query để lấy dữ liệu từ bảng classes trên db vềza
$sql1 = "SELECT clock.* , categories.name AS categories_name FROM clock INNER JOIN categories ON clock.category_id = categories.id WHERE clock_name LIKE '%$search%' ORDER BY clock_id ASC LIMIT $start, $recordOnePage";
//Chạy query
$clocks = mysqli_query($connect, $sql1);
//Đóng kết nối
include_once '../../../connect/close.php';
?>
<form method="get" action="">
    <input type="text" name="search" value="<?= $search; ?>" placeholder="search">
    <div class="btn btn-primary active">Search</div>
</form>
<a class="btn btn-primary active" href="create.php"> CREATE</a>
<table class="table table-striped" border="1px" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Publication Year</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Description</th>
        <th>Brand Name</th>
        <th>Image</th>
        <th>Fix</th>
    </tr>
    <?php
    foreach ($clocks as $cl){
        ?>
        <tr>
            <td>
                <?= $cl['clock_id'] ?>
            </td>
            <td>
                <?= $cl['clock_name'] ?>
            </td>
            <td>
                <?= $cl['publication_year'] ?>
            </td>
            <td>
                <?= $cl['quantity'] ?>
            </td>
            <td>
                <?= $cl['price'] ?>
            </td>
            <td>
                <?= $cl['description'] ?>
            </td>
            <td>
                <?= $cl['categories_name'] ?>
            </td>
            <td>
                <img src="../../../Asset/img/<?php echo $cl['image'] ?>" width="50px" height="50px">
            </td>
            <td>
                <a class="btn btn-primary active" href="edit.php?id=<?= $cl['clock_id'] ?> ">Edit</a>
                <a class="btn btn-danger active" href="destroy.php?id=<?= $cl['clock_id'] ?> " >DESTROY</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<?php
for($i = 1; $i <= $countPage; $i++){
    ?>
    <a class="btn btn-primary active" href="?page=<?= $i ?>&search=<?= $search ?>">
        <?= $i ?>
    </a>
    <?php
}
?>
<h2>
    <a class="btn btn-primary active" href="../../GiaodienAdmin.php">Trang chủ</a>
</h2>
</div>

</body>
</html>