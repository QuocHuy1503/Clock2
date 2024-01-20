<!doctype html>
<html lang="en">
<body>
<?php
include_once '../../connect/open.php';
$sql = "SELECT * FROM clock";
$clock = mysqli_query($connect,$sql);
include_once '../../connect/close.php';
include_once 'Header.php'
?>
<style>
    .carousel-container {
        max-width: 1092px; /* Adjust the max-width as needed */
        margin: auto; /* Center the container on the page */
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
            foreach ($clock as $cl){
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <a href="Product_detail.php?clock_id=<?= $cl['clock_id']?>">
                    <div class="single-product">
                        <div class="part-1">
                         <img src="../../Asset/img/<?= $cl['image']?>">
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
</html>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
-->
<script src="../../Asset/js/all.min.js"></script>