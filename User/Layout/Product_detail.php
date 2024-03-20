<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../Asset/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../../Asset/vendor/bootstrap/js/bootstrap.bundle.min.js">

    <style>
        .card{border:none}
        .product{background-color: #eee}
        .brand{font-size: 13px}
        .act-price{color:red;font-weight: 700}
        .dis-price{text-decoration: line-through}
        .about{font-size: 14px}
        .color{margin-bottom:10px}
        label.radio{cursor: pointer}
        label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}
        .radio span{padding: 2px 9px;border: 2px solid #ff0000;display: inline-block;color: #ff0000;border-radius: 3px;text-transform: uppercase}
        label.radio input:checked+span{border-color: #ff0000;background-color: #ff0000;color: #fff}
        .btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}
        .btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}
        .btn-danger:focus{box-shadow: none}
        .cart i{margin-right: 10px}
    </style>
    <!-- <script>
        function change_image(image){

            var container = document.getElementById("main-image");

            container.src = image.src;
        }
        document.addEventListener("DOMContentLoaded", function(event) {

        });
    </script> -->
</head>
<body>
<?php
include_once 'Header.php';
include_once '../../connect/open.php';
$watch_id = $_GET['watch_id'];
$sql = "SELECT *, categories.name as cat_name FROM watch INNER JOIN categories ON watch.category_id = categories.id WHERE watch_id = '$watch_id'";
$watch = mysqli_query($connect,$sql);
include_once '../../connect/close.php';
if(mysqli_num_rows($watch) > 0) {
// Use a while loop to iterate over each row
while ($row = mysqli_fetch_assoc($watch)) {
?>
<div class="container-fluid mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="../../Asset/img/<?=$row['image']?>" width="250" /> </div>
<!--                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="../../Asset/img/download.jfif" width="70"> <img onclick="change_image(this)" src="../../Asset/img/images.jfif" width="70"> </div>
-->                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <span class="ml-1">Back</span>
                                </div>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?=$row['cat_name']?></span>
                                <h5 class="text-uppercase"><?=$row['watch_name']?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">$20</span>
                                    <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about"><?= $row['description']?></p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div>
                            <div class="cart mt-4 align-items-center"> 
                                <a class="btn btn-danger text-uppercase mr-2 px-4" href="../cart/add-to-cart.php?watch_id=<?=$row['watch_id']?>">Add to cart</a>
                                 <!-- <i class="fa fa-heart text-muted"></i> 
                                 <i class="fa fa-share-alt text-muted"></i>  -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
}
} else {
    echo "No results found.";
}
include_once 'Footer.php';
?>
</body>
</html>