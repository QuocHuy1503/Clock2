 <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//Nhúng header vào
//Nhúng file open.php để mở kết nối
include_once '../../connect/open.php';
//Khai báo biến search
$search = "";
//Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
//Khai báo số bản ghi 1 trang
$recordOnePage = 10;
//Query để lấy số bản ghi
$sqlCountRecord = "SELECT COUNT(*) AS count_record FROM watch WHERE watch_name LIKE '%$search%'";
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
include_once 'Header.php';
$start = ($page - 1) * $recordOnePage;
$sql= "SELECT * FROM watch WHERE ( watch_name LIKE '%$search%') LIMIT $start,$recordOnePage";
$watch = mysqli_query($connect,$sql);
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM watch WHERE category_id = $id";
    $watch = mysqli_query($connect,$sql);
}
include_once '../../connect/close.php';
?>
<section class="section-products">
    <div class="container">
        <div class="row">
            <!-- Single Product -->

            <?php
            /*Vòng lặp để hiển thị tất cả sản phẩm - Loop for displaying all product*/
            if(mysqli_num_rows($watch) > 0) {
            // Use a while loop to iterate over each row
            while ($row = mysqli_fetch_assoc($watch)) {
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <a href="Product_detail.php?watch_id=<?= $row['watch_id']?>">
                        <div class="single-product">
                            <div class="part-1">
                                <img src="../../Asset/img/<?= $row['image']?>" style="max-width: 100%;height:auto">
                            </div>
                            <div class="part-2">
                                <h3 class="product-title"><?= $row['watch_name']?></h3>
                                <h4 class="product-old-price">$<?= $row['price'] + 40?></h4>
                                <h4 class="product-price">$<?= $row['price']?></h4>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                }
            } else {?>
                <div class="col-12 text-center mt-4" style="height: 200px">
                    <h2>No results found for "<?php echo htmlspecialchars($search); ?>"</h2>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <!--<li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>-->
        <?php
        for($i = 1; $i <= $countPage; ++$i){
            ?>
            <li class="page-item"> <a href="?page=<?= $i ?>&search=<?= $search ?>" class="page-link"><?= $i ?></a></li>
            <?php
        }
        ?>
        <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
         <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <!--<li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>-->
    </ul>
</nav>
</body>
<?php
include_once 'Footer.php';
?>
</body>
</html>