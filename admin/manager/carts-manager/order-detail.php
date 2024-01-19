<?php
//Cho phép làm việc với session
session_start();
//Kiểm tra đã tồn tại số đth trên session hay chưa, nếu chưa tồn tại thì cho quay về account
if (!isset($_SESSION['email'])) {
    //Quay về trang account
    header("Location: ../login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../admin.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/js/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="../bootstrap.min.css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
        body {
            max-width: 1000px;
            background-color: #F5F4F8;
        }
        .edit_order {
            margin-top: 20px;
            margin-left: 50px;
            width: 900px;
            border: 1px solid #d7d2d2;
            border-radius: 10px;
            background-color: white;
            padding: 20px 40px;
        }

        .status {
            position: center;
            height: 30px;
            width: 200px;
            border-radius: 4px;
            padding-left: 20px;
        }

        .confirm_order {
            position: center;
            width: 100px;
            top: 0;
            margin-left: 80%;
        }



        .add-member {
            align-items: center;
            appearance: none;
            background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
            border-top-width: 0;
            border-right-width: 0;
            border-left-width: 0;
            border-bottom-width: 0;
            border-radius: 6px;
            box-shadow: rgba(45, 35, 66, .4) 0 2px 4px,rgba(45, 35, 66, .3) 0 7px 13px -3px,rgba(58, 65, 111, .5) 0 -3px 0 inset;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono",monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s,transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow,transform;
            font-size: 18px;
        }

        .add-member:focus {
            box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
        }

        .add-member:hover {
            box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .add-member:active {
            box-shadow: #3c4fe0 0 3px 7px inset;
            transform: translateY(2px);
        }
    </style>
    <title> Edit Order </title>
</head>
<body>
<section>

</section>
<?php
//Lấy id của sp
$id = $_GET['id'];
//Mo ket noi
include_once "../../../connect/open.php";
$count_money = 0;
//Query
$sql = "SELECT order_details.laptop_id, order_details.order_id, order_details.price, order_details.quantity,
		        product.image AS laptop_image, product.name AS lap_name, product.description,
		        orders.receiver_name, orders.receiver_phone,orders.receiver_address
                
        FROM order_details
        INNER JOIN product ON product.id = order_details.laptop_id
        INNER JOIN orders ON orders.id = order_details.order_id
        WHERE order_details.order_id = '$id'";
//Chạy query cua $sql chinh
$order_details = mysqli_query($connect, $sql);
// Chay query cua $sqlOrder de tim ai order
$sqlOrder = "SELECT * FROM orders where id = '$id'";
//Query người nhận
$orders = mysqli_query($connect,$sqlOrder);
//Đóng kết nối
include_once '../../../connect/close.php';
?>
<div class="edit_order">
    <div style="display: flex; justify-content: space-between">
        <div>

            <!--Không cần hai thông tin khác hàng và hai cái nút xác nhận -->
            <?php
            foreach ($orders as $order){
                ?>

                <div style="display: flex; justify-content: space-between">
                    <div>
                        <h3 style="margin: 0 0"> Delivery address </h3>
                        Receiver Name: <?= $order['receiver_name']; ?><br>
                        Receiver Phone: <?= $order['receiver_phone']; ?><br>
                        Receiver Address:<?= $order['receiver_address']; ?><br>

                    </div
                </div>
                <div>


                    <form method="post" action="process.php">
                        <input type="hidden" name="id" value="<?= $order['id']; ?>">
                        <select class="status" name="status">
                            <option class="badge bg-warning text-dark" value="0"<?php if($order['status'] == 0 ){echo "SELECTED";}?>> Pending </option>
                            <option class="badge bg-primary" value="1"<?php if($order['status'] == 1 ){echo "SELECTED";}?>> Delivering </option>
                            <option class="badge bg-success" value="2"<?php if($order['status'] == 2 ){echo "SELECTED";}?>> Completed </option>
                            <option class="badge bg-danger" value="3"<?php if($order['status'] == 3 ){echo "SELECTED";}?>> Canceled </option>
                        </select>
                        <button type="submit"  class="add-member" style="margin: 20px; ">
                            OK
                        </button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div
    </div>

    <?php
    foreach ($order_details as $order_detail){
    ?>
    <table border="1" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td width="220px">
                <img width="180px" src="../../../images/<?= $order_detail['laptop_image']?>">
            </td>
            <td>
                <h3><?= $order_detail['lap_name']?></h3>
                <p style="font-size: 13px; width: 100%"><?= $order_detail['description'] ?></p>
            </td>
            <td width="20%" >
                Amount: <?= $order_detail['quantity'] ?><br>
                Price <?= $order_detail['price'] . '0.000đ' ?>
            </td>
            Total price:
            <?php
            //Tính thành tiền của từng sp có trong trong cart
            $money = $order_detail['price'] * $order_detail['quantity'];
            //Tính tổng tiền của các sp có trong trong cart
            $count_money += $money;
            echo $money .'0.000đ';
            ?>
        </tr>
        <?php
        }
        ?>
    </table>
    <h2><a class="btn btn-primary active" href="index.php">Comeback</a>----****************************-+
    </h2>
</div>

</body>
</html>

