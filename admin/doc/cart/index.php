<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/manager.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>Cart</title>


</head>
<body>
<?php
include_once '../../../connect/open.php';
$sql = "SELECT * FROM orders INNER JOIN user ON orders.user_id = user.user_id
INNER JOIN order_details ON orders.order_id = order_details.order_id
left join watch on order_details.watch_id = watch.watch_id";
$orders = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
?>
<div class="grid">
    <div class="row sm-gutter ">
        <div class="col l-3">
            <div class="menu-right">

                <h1 class="page-header">Danh sách đơn hàng </h1>
                <div class="table-member">
                    <table width="100%" border="1px" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th >
                                <div class="use-member">ID</div>
                                <div class="member-cell"></div>
                            </th>
                            <th width="20%">
                                <div class="use-member">Ngày mua</div>
                                <div class="member-cell"></div>
                            </th>
                            <th style="font-size: 1.5rem">
                                <div class="use-member">Tên Khách Hàng</div>
                                <div class="member-cell"></div>
                            </th>
                            <th style="font-size: 1.5rem">
                                <div class="use-member">Địa chỉ</div>
                                <div class="member-cell"></div>
                            </th>
                            <th style="font-size: 1.5rem">
                                <div class="use-member">Trạng Thái</div>
                                <div class="member-cell"></div>
                            </th>
                            <th style="font-size: 1.5rem">
                                <div class="use-member">Xem chi tiết đơn hàng</div>
                                <div class="member-cell"></div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($orders as $order){
                            ?>
                            <tr>
                                <td style="font-size: 1.5rem"><?= $order['order_id'] ?></td>
                                <td style="font-size: 1.5rem"><?= $order['order_date']?></td>
                                <td style="font-size: 1.5rem"><?= $order['user_name']?></td>
                                <td style="font-size: 1.5rem"><?= $order['address']?></td>
                                <td style="font-size: 1.5rem">
                                    <?php
                                    if ($order['order_status'] == 0){
                                        echo "Pending";
                                    }
                                    elseif ($order['order_status'] == 2 ){
                                        echo "Delivering";
                                    }
                                    elseif ($order['order_status'] == 3 ){
                                        echo "Completed";
                                    }
                                    elseif ($order['order_status'] == 4 ){
                                        echo "Canceled";
                                    }
                                    elseif ($order['order_status'] == 1 ){
                                        echo "Approved";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="order_detail.php?order_id=<?= $order['order_id'] ?>">VIEW</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>