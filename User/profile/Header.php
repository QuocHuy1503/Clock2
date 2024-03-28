<?php
session_start();

$search = "";
//Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="../../Asset/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="../../Asset/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../../Asset/js/sb-admin-2.min.js">
    <link rel="stylesheet" href="../../Admin2/css/bootstrap.css">
    <link rel="stylesheet" href="../../Admin2/css/header_style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            color: #444444;
        }

        a,
        a:hover {
            text-decoration: none;
            color: inherit;
        }

        .section-products {
            padding: 80px 0 54px;
        }

        .section-products .header {
            margin-bottom: 50px;
        }

        .section-products .header h3 {
            font-size: 1rem;
            color: #fe302f;
            font-weight: 500;
        }

        .section-products .header h2 {
            font-size: 2.2rem;
            font-weight: 400;
            color: #444444;
        }

        .section-products .single-product {
            margin-bottom: 26px;
        }

        .section-products .single-product .part-1 {
            position: relative;
            height: 290px;
            max-height: 290px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .section-products .single-product .part-1::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transition: all 0.3s;
        }

        .section-products .single-product:hover .part-1::before {
            transform: scale(1.2,1.2) rotate(5deg);
        }

        .section-products #product-1 .part-1::before {
            background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
            background-size: cover;
            transition: all 0.3s;
        }
        .section-products #product-2 .part-1::before {
            background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
            background-size: cover;
        }

        .section-products #product-3 .part-1::before {
            background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
            background-size: cover;
        }

        .section-products #product-4 .part-1::before {
            background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
            background-size: cover;
        }

        .section-products .single-product .part-1 .discount,
        .section-products .single-product .part-1 .new {
            position: absolute;
            top: 15px;
            left: 20px;
            color: #ffffff;
            background-color: #fe302f;
            padding: 2px 8px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .section-products .single-product .part-1 .new {
            left: 0;
            background-color: #444444;
        }

        .section-products .single-product .part-1 ul {
            position: absolute;
            bottom: -41px;
            left: 20px;
            margin: 0;
            padding: 0;
            list-style: none;
            opacity: 0;
            transition: bottom 0.5s, opacity 0.5s;
        }

        .section-products .single-product:hover .part-1 ul {
            bottom: 30px;
            opacity: 1;
        }

        .section-products .single-product .part-1 ul li {
            display: inline-block;
            margin-right: 4px;
        }

        .section-products .single-product .part-1 ul li a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: #ffffff;
            color: #444444;
            text-align: center;
            box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
            transition: color 0.2s;
        }

        .section-products .single-product .part-1 ul li a:hover {
            color: #fe302f;
        }

        .section-products .single-product .part-2 .product-title {
            font-size: 1rem;
        }

        .section-products .single-product .part-2 h4 {
            display: inline-block;
            font-size: 1rem;
        }

        .section-products .single-product .part-2 .product-old-price {
            position: relative;
            padding: 0 7px;
            margin-right: 2px;
            opacity: 0.6;
        }

        .section-products .single-product .part-2 .product-old-price::after {
            position: absolute;
            content: "";
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #444444;
            transform: translateY(-50%);
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 80px;

        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-menu a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .orange-hover:hover {
            color: orange;
        }

    </style>
</head>
<div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 " >

        <a href="Main_menu.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
<!--            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
-->
<!--            <i class="fa-brands fa-bootstrap fa-2xl"></i>-->
            <img src="../../Asset/img/XinXoTrang.jpg" style="width: 100px">
        </a>

        <!--1-->
        <div class="d-flex align-items-center col-md-6">
            <?php
            $search = "";
            //Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
            if(isset($_GET['search'])){
            $search = $_GET['search'];
            }
            ?>
            <form class="w-100 me-3 " action="searchResult.php" method="get">
                <input type="search" name="search" value="<?= $search; ?>" class="form-control" aria-label="Search">
            </form>
            <!--2-->
        </div>

        <div class="col-md-3 text-end">
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['email'])) {
                ?>
                <a type="button" class="btn btn-outline-primary me-2" href="../account/login.php">Login</a>
                <a type="button" class="btn btn-primary" href="../account/register.php">Sign-up</a>
                <?php
            }else{
                ?>
                <div class="dropdown">
                    <a href="../profile/index.php">
                        <div class="fas fa-user d-flex align-items-center justify-content-center"
                             id="login-btn"></div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                        style="width: 136px; padding-right: 0;">
                        <li><a class="dropdown-item orange-hover" href="../profile/index.php">My account</a></li>
                        <li><a class="dropdown-item orange-hover" href="../profile/order_history.php">Order history</a></li>
                    </ul>
                </div>

                <a class="btn btn-primary" href="../account/logout.php">Log out</a>
            <?php }?>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg ">
        <!-- <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>-->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                /*Vong lap de lay brand/categories*/
                include_once '../../connect/open.php';
                $sqlCategories = "SELECT * FROM categories";
                $categories = mysqli_query($connect,$sqlCategories);
                foreach ($categories as $category){
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="searchResult.php?id=<?=$category['id']?>"><?=$category['name']?></a>
                </li>
                <?php
                /*end vong lap*/
                }
                ?>
                <!--3-->
            </ul>
        </div>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-s9Q6V47wHK8D1t1ys5ck6nVFDfUn3JxhdBucAdoH2gAC1d1pOqGpiE8CCl3x1oT" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- 1 <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
      </ul>-->
<!-- 2 <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>-->

<!-- 3 <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>-->