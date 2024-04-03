
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap">
    <link href="../assets/js/main.js" rel="stylesheet" >
    <link rel="stylesheet" href="../../Asset/css/bootstrap.css">
    <link rel="stylesheet" href="../../Asset/css/header_style.css">
    <link rel="stylesheet" href="../../Asset/css/main_style.css">
    <link rel="stylesheet" href="../../Asset/css/profile.css">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$account = $_GET['id'];
//Xem xem có thiếu session lấy không. Tiện gắn $_Session[id] vào $ account luôn ?
/*if(isset($_SESSION['id'])){
    $account = $_SESSION['id'];
}*/
include_once '../../Connects/open.php';

//Query
$sql = "SELECT order_details.*, watch.name , watch.image
        FROM order_details 
        INNER JOIN watch ON order_details.watch_id = books.id
        WHERE order_id = '$account'";
//Chạy query cua $sql chinh
$order_details = mysqli_query($connect, $sql);
// Chay query cua $sqlOrder de tim ai order
$sqlOrder = "SELECT * FROM orders where id = '$account'";
//Query người nhận
$orders = mysqli_query($connect,$sqlOrder);
//Đóng kết nối
$sqlDetails = "SELECT books.* , categories.name as cat_name , categories.id as cat_id , publishers.id as pub_id , publishers.name as pub_name ,authors.id as au_id , authors.name as au_name FROM books inner join categories on books.category_id = categories.id inner join publishers on books.publisher_id = publishers.id inner join authors on books.author_id = authors.id WHERE books.id = '$account' ";
$books = mysqli_query($connect,$sqlDetails);
?>

<div style="width: 100%;height: 100%"><!--App-->
    <div style="width: 100%;height: 140px"><!--Header width=max, height 140-->
        <?php
        include_once '../Layout/Header.php';
        ?>
    </div>
       <!--content--> <div style="height: 500px;width: 100%;display: flex;background:#a6a2a2">
        <div style="height: 500px;width: 20%;background: #9a9898 ;display: flex;flex-direction: column ;justify-content: space-around;align-items: center">
            <div style="height: 35px">
                <a href="../Layout/Main.php" style="text-decoration: none">
                    <i class="fa-solid fa-house fa-lg"></i>
                    <span style="color: #FFFFFF">Quay về trang chủ</span>
                </a>
            </div>
            <div>
                <a href="index.php" style="text-decoration: none">
                    <i class="fa-solid fa-cart-shopping fa-lg"></i>
                    <span style="color: #FFFFFF">Quay về giỏ hàng</span>
                </a>
            </div>
            <div>
                <a href="index.php" style="text-decoration: none">
                    <i class="fa-solid fa-clock-rotate-left fa-lg"></i>
                    <span style="color: #FFFFFF">Quay về lịch sử đặt hàng</span>
                </a>
            </div>
        </div>
        <div style="width: 80%">
<table cellpadding="0" cellspacing="0" align="center" style="margin-bottom:125px;height: auto " >
    <tr>
        <th>Thông tin sản phẩm</th>
        <th>Số lượng </th>
        <th>Giá</th>
    </tr>
       <?php  $money = 0;
       foreach ($order_details as $order_detail) {?>
        <tr>
        <td style="width: 600px">
            <div style="display:flex;flex-direction: row;justify-content: space-between;width: auto">
                <div><span><?= $order_detail['name']?> </span></div>
                <div><img src="../../image/<?= $order_detail['image']?>" style="height: 100px;width: 100px"></div>
            </div>
        </td>
        <td><?=$order_detail['quantity']?></td>
        <td><?=number_format($order_detail['price'],0,'.','.') . 'đ'?></td>
        </tr>
        <?php
        $money =+ $money;
        $money = $order_detail['price'] * $order_detail['quantity'];
       }
        ?>
    <tr>
        <td colspan="8">
            <?php
            Echo 'Tổng Tiền Đơn Hàng  : '. number_format($money,0,'.','.'). 'đ';
            //Hiển thị tổng tiền của các sp có trong cart
            ?>
        </td>
    </tr>
</table>
        </div>
    </div>
    <div style="width: 100%;height:136px"><!--Footer-->
        <?php
        include_once '../Layout/Footer.php';
        ?>
    </div>
</body>
</html>