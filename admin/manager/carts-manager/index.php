<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../admin.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/js/jquery.min.js">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <title>Order Manager</title>

</head>
<body>
<style>
    body {
        max-width: 100%;
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

<?php
include_once '../../../connect/open.php';
$sql = " SELECT orders.*, customer.name as cus_name from orders inner join customer on customer.id = orders.customer_id";
$orders = mysqli_query($connect, $sql);
include_once '../../../connect/close.php';
?>
<table class="table table-striped" border="1px" cellpadding="0" cellspacing="0" width="100%">
    <tr style="width:100% ">
        <th class="table-dark">Orders ID</th>
        <th class="table-dark">Orders Date</th>
        <th class="table-dark"></th>
        <th class="table-dark">Customer name</th>
        <th class="table-dark">Status</th>
        <th class="table-dark">Action</th>
    </tr>

    <?php
    //Sql lấy thông tin sp theo

    foreach ($orders as $order){
        ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= $order['date_buy']?><td>
            <td><?= $order['cus_name']?></td>
            <td>
                <?php
                            if ($order['status'] == 0){
                                echo "Pending";
                            }
                            elseif ($order['status'] == 1 ){
                                echo "Delivering";
                            }
                            elseif ($order['status'] == 2 ){
                                echo "Completed";
                            }
                            elseif ($order['status'] == 3 ){
                                echo "Canceled";
                            }
                            ?>
            </td>
            <td>
                <a href="order-detail.php?id=<?= $order['id'] ?>">VIEW</a>
            </td>
        </tr>
        <?php
    }
    ?>
    <h2>
        <a class="btn btn-primary active" href="../../GiaodienAdmin.php">Trang chủ</a>
    </h2>
</table>
</body>
</html>