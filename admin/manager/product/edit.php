<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../admin.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/js/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update a class</title>
</head>
<body>
<style>
    button, button:focus {
        font-size: 17px;
        padding: 10px 25px;
        border-radius: 0.7rem;
        background-image: linear-gradient(rgb(214, 202, 254), rgb(158, 129, 254));
        border: 2px solid rgb(50, 50, 50);
        border-bottom: 5px solid rgb(50, 50, 50);
        box-shadow: 0px 1px 6px 0px rgb(158, 129, 254);
        transform: translate(0, -3px);
        transition: 0.2s;
        transition-timing-function: linear;
    }

    button:active {
        transform: translate(0, 0);
        border-bottom: 2px solid rgb(50, 50, 50);
    }
</style>
<?php
$id = $_GET['id'];
include_once '../../../connect/open.php';
$sql = "SELECT * FROM clock WHERE clock_id = $id";
$clocks = mysqli_query($connect, $sql);
$sql1 = "SELECT * FROM categories";
$categories = mysqli_query($connect, $sql1);
include_once '../../../connect/close.php';
foreach ($clocks as $cl){
    ?>
    <form method="post" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="clock_id" value="<?= $cl['clock_id'] ?>">
        Name: <input id="type-text" name="clock_name" value="<?= $cl['clock_name'] ?>"><br>
        Publication Year: <input id="date" name="publication_year" value="<?= $cl['publication_year'] ?>"><br>
        Quantity: <input type="text" name="quantity" value="<?= $cl['quantity'] ?>"><br>
        Price: <input type="text" name="price" value="<?= $cl['price'] ?>"><br>
        Description: <input type="text" name="description" value="<?= $cl['description'] ?>"><br>
        Category_id:  <select class="badge bg-primary" name="category_id">
            <option> - Choose - </option>
            <?php
            foreach ($categories as $cat){
                ?>
                <option value="<?= $cat['id'] ?>">
                    <?= $cat['name'] ?>
                </option>
                <?php
            }
            ?>
        </select><br>
        Image: <input type="file" name="image" value="../../../Asset/img/<?= $cl['image'] ?>">
        <img src="../../../Asset/image/<?=$cl['image']?>">
        <br>
        <button>Update</button>
    </form>
    <?php
}
?>
</body>
</html>
