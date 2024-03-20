<?php

session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/base.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
    <link href="../assets/js/main.js" rel="stylesheet" >
</head>
<body>
<?php
//Lấy $id gắn vào account?
$account = $_GET['id'];
//Xem xem có thiếu session lấy không. Tiện gắn $_Session[id] vào $ account luôn ?
if(isset($_SESSION['id'])){
    $account = $_SESSION['id'];

// Không ngờ nó làm được thế này ảo vl
// Có khi cần hỏi thầy về cái này chí mình vừa mới ấy bừa
include_once '../../Connects/open.php';
$sql = "SELECT * FROM orders where customer_id =  '$account' order by date_buy  desc";
$orders = mysqli_query($connect,$sql);
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
        </div>
        <div style="width: 80%">
    <table cellspacing="0" cellpadding="0" border="1" style="height: auto">
       <!-- <tr align="center">
            <th>STT</th>
            <th>Ngày mua</th>
            <th>Tình trạng</th>
             <th>Đơn giá</th>
             <th>Thành tiền</th>
            <th>Xem chi tiết</th>
            <th>Hành động</th>
        </tr>-->
                    <?php $SoHangMua=0; foreach($orders as $order){ $SoHangMua += 1;?>
            <tr>
                <td><?= $SoHangMua; ?></td>
                <td><?= $order['date_buy']?></td>
                <td>
                    <?php
                    if ($order['status'] == 0){
                    ?>
                        <i class="fa-solid fa-spinner fa-2xl"></i>
                        <span style="color: #0b74e5">Pending</span>
                    <?php
                    }
                    else if ($order['status'] == 2){
                        ?>
                        <i class="fa-solid fa-truck fa-2xl"></i> <span style="color: #0b2e13">
                            Delivering
                        </span>
                    <?php
                    }
                    else if ($order['status'] == 3){
                        ?>
                        <i class="fa-solid fa-check fa-2xl" style="color: darkgreen"></i>
                        <span>Completed</span>
                    <?php
                    }
                    else if ($order['status'] == 4){
                        ?>
                        <i class="fa-solid fa-x fa-2xl" style="color: red"></i>
                        <span style="color: #842029">Canceled</span>
                    <?php
                    }
                    else if ($order['status'] == 1){
                    ?>
                        <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                        <span style="color:#4141f5">Approved</span>
                    <?php
                    }
                    ?>
                </td>
                <td><a href="History_Order_Details.php?id=<?=$order['id']?>" style="text-decoration: none">Orders Details</a></td>
                <td><a href="Cancel-orders.php?id=<?= $order['id']?>" style="text-decoration: none;">Cancel orders</a></td>
            </tr>
                <?php
                    }?>
        </table>
        </div>
    </div>
    <div style="width: 100%;height:136px"><!--Footer-->
        <?php
        include_once '../Layout/Footer.php';
        }
else{
        ?>
    </div>
</div>
<?php
    include_once '../Layout/Footer.php';
}
include_once '../../Connects/close.php';
?>
</body>
</html>