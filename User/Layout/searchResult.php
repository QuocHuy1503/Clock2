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
$search = "";
//Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
include_once 'Header.php';
include_once '../../connect/open.php';
$sql= "SELECT * FROM clock WHERE clock_name LIKE '%$search%'";
$clock = mysqli_query($connect,$sql);
include_once '../../connect/close.php';
?>
<section class="section-products">
    <div class="container">
        <div class="row">
            <!-- Single Product -->

            <?php
            /*Vòng lặp để hiển thị tất cả sản phẩm - Loop for displaying all product*/
            foreach ($clock as $cl){
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <a href="Product_detail.php">
                        <div class="single-product">
                            <div class="part-1">
                                <img src="../../Asset/img/<?= $cl['image']?>" style="">
                            </div>
                            <div class="part-2">
                                <h3 class="product-title"><?= $cl['clock_name']?></h3>
                                <h4 class="product-old-price">$<?= $cl['price'] + 40?></h4>
                                <h4 class="product-price">$<?= $cl['price']?></h4>
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

</body>
<?php
include_once 'Footer.php';
?>
</body>
</html>