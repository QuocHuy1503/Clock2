<!doctype html>
<html lang="en">
<body>
<?php    //Nhúng header vào
//Nhúng file open.php để mở kết nối
include_once '../../connect/open.php';
//Khai báo biến search
$search = "";
//Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
//Khai báo số bản ghi 1 trang
$recordOnePage = 8;
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
$sql = "SELECT * FROM watch WHERE watch_name LIKE '%$search%' LIMIT $start,$recordOnePage";
$watch = mysqli_query($connect,$sql);
$sqlUser = "SELECT * FROM user";

include_once '../../connect/close.php';
include_once 'Header.php'
?>
<style>
    .carousel-container {
        max-width: 1092px; /* Adjust the max-width as needed */
        margin: auto; /* Center the container on the page */
    }
    .carousel-item img {
    height: 100%;
    }
    .carousel-item img {
    object-fit: cover; /* Or object-fit: contain; */
    height: 100%;
    width: 100%; /* Optional to ensure full width */
    }      
    
</style>
<!--Slideshow ad-->
<div class="carousel-container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../Asset/img/Advert-TAG.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="../../Asset/img/Advert-TAG.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="../../Asset/img/Advert-TAG.jpg" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!--Product display-->
<section class="section-products">
    <div class="container">
        <div class="row">
            <!-- Single Product -->

            <?php
            /*Vòng lặp để hiển thị tất cả sản phẩm - Loop for displaying all product*/
            foreach ($watch as $wa){
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <a href="Product_detail.php?watch_id=<?= $wa['watch_id']?>">
                    <div class="single-product">
                        <div class="part-1">
                         <img src="../../Asset/img/<?= $wa['image']?>" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="part-2">
                            <h3 class="product-title"><?= $wa['watch_name']?></h3>
                            <h4 class="product-old-price">$<?= $wa['price'] + 40?></h4>
                            <h4 class="product-price">$<?= $wa['price']?></h4>
                        </div>
                    </div>
                    </a>
                </div>
            <?php
            /*Vòng lặp để hiển thị tất cả sản phẩm - Loop for displaying all product*/
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
</html>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
-->
<script src="../../Asset/js/all.min.js"></script>