<?php
//Cho phép làm việc với session
session_start();
//Kiểm tra đã tồn tại số đth trên session hay chưa, nếu chưa tồn tại thì cho quay về account
if(!isset($_SESSION['email'])){
    //Quay vá» trang login
    header("Location:../Account/login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap.min.css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Edit Order </title>
</head>
<body>
<?php
//Lấy id của sp
$id = $_GET['id'];
//Mo ket noi
include_once "../../../connect/open.php";
//Query
$sql = "SELECT order_details.watch_id, order_details.order_id, order_details.subtotal, order_details.sold_quantity,
		        watch.image AS image, watch_name , watch.description,
		       user_name, user.phone ,user.address,
		        SUM(order_details.subtotal*order_details.quantity) AS TongDonHang
        FROM orders
        INNER JOIN books ON books.id = order_details.book_id
        INNER JOIN order_detail ON orders.order_id = order_details.order_id
        INNER JOIN user ON orders.user_id = user.user_id
        WHERE order_details.order_id = '$id'";
//Chạy query cua $sql chinh
$orders = mysqli_query($connect, $sql);
// Chay query cua $sqlOrder de tim ai order

//Đóng kết nối
include_once '../../../connect/close.php';
?>
                <h1 class="page-header">
                    <?php
                    foreach ($orders as $order){
                        ?>
                        <h1>Tên khách hàng: <?= $order['user_name'] ?></h1>
                        <h1>Số điện thoại: <?= $order['user_phone'] ?></h1>
                        <h1>Địa chỉ: <?= $order['user_address'] ?></h1>
                        <?php
                    }
                    ?>
                </h1>

                <div class="list-member">
                    <div class="table-member">
                        <table>
                            <thead>
                            <tr>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Tên Sản Phẩm</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Ảnh Sản Phẩm</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Số lượng order</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Thông tin mô tả sản phẩm</div>
                                    <div class="member-cell"></div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php  foreach ($orders as $order) {?>
                                    <td style="font-size: 1.5rem"> <?= $order['watch_name']?></td>
                                    <td style="font-size: 1.5rem"><img width="180px" src="../../images/<?= $order['image']?>"></td>
                                    <td style="font-size: 1.5rem"><?= $order['watch.quantity']?></td>
                                    <td style="font-size: 1.5rem"><?= $order['watch.description']?></td>
                                <? }foreach ($orders as $order){?>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td style="font-size: 1.5rem" colspan="10">Tổng giá đơn hàng: <?= $order['TongDonHang']?>đ</td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <form method="post" action="process.php">
                                        <input type="hidden" name="id" value="<?= $order['order_id']; ?>">
                                        <select class="status" name="status" style="width: 150px;margin-left: 22px;padding:5px">
                                            <option value="0"<?php if($order['order_status'] == 0 ){echo "SELECTED";}?>> Pending </option>
                                            <option value="1"<?php if($order['order_status'] == 1 ){echo "SELECTED";}?>> Approved </option>
                                            <option value="2"<?php if($order['order_status'] == 2 ){echo "SELECTED";}?>> Delivery </option>
                                            <option value="3"<?php if($order['order_status'] == 3 ){echo "SELECTED";}?>> Completed </option>
                                            <option value="4"<?php if($order['order_status'] == 4 ){echo "SELECTED";}?>> Canceled </option>
                                        </select>
                                        <button type="submit"  class="add-member" style="margin: 20px 42%; ">
                                            OK
                                        </button>
                                    </form>
                                </td>
                            </tr>
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

