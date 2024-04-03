

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../Asset/css/bootstrap.css">
    <link rel="stylesheet" href="../../Asset/css/header_style.css">
    <link rel="stylesheet" href="../../Asset/css/main_style.css">
    <link rel="stylesheet" href="../../Asset/css/profile.css">

    <title>XinXo - Order History</title>
</head>
<body>

<?php

include("../Layout/Header.php");

include_once("../../connect/open.php");
$userId = $_SESSION['user_id'];
$order_status = "";
if (isset($_GET['order_status'])) {
    $order_status = $_GET['order_status'];
}

//pagination
$recordOnePage = 5;
$sqlCountRecord = "SELECT COUNT(*) as count_record FROM orders 
                   INNER JOIN user ON orders.user_id = user.user_id
                   WHERE orders.user_id = '$userId' AND orders.order_status LIKE '%$order_status%'";

$countRecords = mysqli_query($connect, $sqlCountRecord);
foreach ($countRecords as $countRecord) {
    $records = $countRecord['count_record'];
}

$countPage = ceil($records / $recordOnePage);

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$start = ($page - 1) * $recordOnePage;

//main
// $sql = "SELECT orders.*, (SELECT SUM(sold_quantity * subtotal) FROM order_details 
//             WHERE order_id = orders.order_id) AS total_cost
//             FROM orders 
//             WHERE user_id = '$userId' AND orders.order_status LIKE '%$order_status%'
//             ORDER BY (orders.order_status) ASC, (orders.order_id) DESC
//             LIMIT $start, $recordOnePage";
        
$sql = "SELECT orders.order_id, orders.order_date, orders.order_status , sum(price * quantity) as total FROM
        orders INNER JOIN order_details on orders.order_id = order_details.order_id 
        inner join watch on watch.watch_id = order_details.watch_id
        WHERE user_id = '$userId' AND orders.order_status LIKE '%$order_status%'
        ORDER BY (orders.order_status) ASC, (orders.order_id) DESC
        LIMIT $start, $recordOnePage";
// "select orders.order_id, orders.order_date, orders.order_status ,
// sum(price * quantity) as total from orders 
// inner join order_details on orders.order_id = order_details.order_id 
// inner join watch on watch.watch_id = order_details.watch_id WHERE user_id = '$userId' AND orders.order_status LIKE '%$order_status%'
// ORDER BY (orders.order_status) ASC, (orders.order_id) DESC
// LIMIT $start, $recordOnePage; 
// "
$orderLists = mysqli_query($connect, $sql);

//format usd
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = '$')
    {
        if (!empty($number)) {
            return "{$suffix}" . number_format($number, 2, ".");
        }
    }
}
?>

<!-- Header -->

<!-- Padding from header -->
<!-- Content -->

<div id="main-container" class="m-5">
    <div id="left-container">
        <?php
        include_once("../Layout/UserProfile.php");
        ?>

    </div>

    <div id="right-container" class="position-relative">
        <?php
        if (!isset($_SESSION['cancel_order'])) {
            $_SESSION['cancel_order'] = 0;
        }
        if ($_SESSION['cancel_order'] === 1) {
            echo '<div id="close-target" class="alert alert-success position-absolute" role="alert"
        style="right: 0; width: 260px">
        Cancel order successfully! 
        <i id="click-close" class="fa-solid fa-x" style="font-size: 12px; padding: 8px; margin-left: 20px" 
        onclick="closeMes()"></i>
        </div>';
            $_SESSION['cancel_order'] = 0;
        }
        ?>
        <div style="height: auto; margin: 40px">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>
                        My orders
                    </h2>

                </div>
                <div style="width: 20%">
                    <form action="" method="get" class="d-flex justify-content-between">
                        <div>
                            <select name="status" id="status" class="form-select" style="font-size: 16px">
                                <option value="">
                                    All
                                </option>
                                <option value="0"
                                    <?php
                                    if ($order_status == 0) {
                                        echo 'selected';
                                    }
                                    ?>>Pending
                                </option>

                                <option value="1"
                                    <?php
                                    if ($order_status == 1) {
                                        echo 'selected';
                                    }
                                    ?>>Confirmed
                                </option>

                                <option value="2"
                                    <?php
                                    if ($order_status == 2) {
                                        echo 'selected';
                                    }
                                    ?>>Delivering
                                </option>

                                <option value="3"
                                    <?php
                                    if ($order_status == 3) {
                                        echo 'selected';
                                    }
                                    ?>>Completed
                                </option>

                                <option value="4"
                                    <?php
                                    if ($order_status == 4) {
                                        echo 'selected';
                                    }
                                    ?>>Cancelled
                                </option>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary" style="font-size: 16px">Sort</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr style="margin: 0 !important;">
            <div style="margin-top: 28px; width: 100%">
                <table class="table table-striped table-bordered align-middle w-100">
                    <thead class="fw-bold table-dark align-middle" style="height: 60px">
                    <tr>
                        <th>Order ID</th>
                        <th>Purchase date</th>
                        <th>Status</th>
                        <th>Total cost</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody style="height: 280px">
                    <?php
                    foreach ($orderLists as $list) {
                        ?>
                        <tr class="p-5">
                            <td><?= $list['order_id'] ?></td>
                            <td><?= $list['order_date'] ?></td>
                            <td>
                                <?php
                                if ($list['order_status'] == 0) {
                                    ?>
                                    <a href="#"
                                       class="btn btn-danger">
                                        <span>Pending</span>
                                    </a>
                                    <?php
                                } else if ($list['order_status'] == 1) {
                                    ?>
                                    <a href="#"
                                       class="btn btn-success">
                                        <span>Confirmed</span>
                                    </a>
                                    <?php
                                } else if ($list['order_status'] == 2) {
                                    ?>
                                    <a href="#"
                                       class="btn btn-primary">
                                        <span>Delivering</span>
                                    </a>
                                    <?php
                                } else if ($list['order_status'] == 3) {
                                    ?>
                                    <a href="#"
                                       class="btn btn-success">
                                        <span>Completed</span>
                                    </a>
                                    <?php
                                } else if ($list['order_status'] == 4) {
                                    ?>
                                    <a href="#"
                                       class="btn btn-danger">
                                        <span>Cancelled</span>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $totalCost = $list['total'];
                                echo currency_format($totalCost) ?>
                            </td>
                            <td>
                                <a href="order_details.php?order_id=<?= $list['order_id'] ?>"
                                   class="fa-solid fa-pen-to-square"
                                   style="font-size: 24px; color: darkslategrey">
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>

                </table>
            </div>

            <!-- for de hien thi so trang -->
            <div class="text-center position-absolute d-flex justify-content-center"
                 style="left: 0; right: 0; bottom: 13px;">
                <ul class="pagination justify-content-center">
                    <li class="page-item" style="width: 40px">
                        <a class="page-link"
                            <?php
                            if ($page == 1) {
                                echo 'href="#"';
                            } else {
                                echo 'href="?page=' . ($page - 1) . '& order_status=' . ($order_status) . '"';
                            }
                            ?>>
                            <span class="fa-solid fa-caret-left"></span>
                        </a>
                    </li>
                    <li class="page-item" style="width: 120px">
                        <?php
                        for ($i = 1; $i <= $countPage; $i++) {
                        }
                        ?>
                        <span class="page-link">
                            Page <?= $page ?> / <?= ($i - 1) ?>
                        </span>
                    </li>
                    <li class="page-item" style="width: 40px">
                        <a class="page-link"
                            <?php
                            if ($page == ($i - 1)) {
                                echo 'href="#"';
                            } else {
                                echo 'href="?page=' . ($page + 1) . '& order_status=' . ($order_status) . '"';
                            }
                            ?>>
                            <span class="fa-solid fa-caret-right"></span>
                        </a>
                    </li>
                </ul>
                <div style="margin-left: 1rem; width: 20%">
                    <form method="get">
                        <input type="number" name="page" placeholder="Page..." class="page-link" min="1"
                               max="<?= $i - 1 ?>" required
                               style="width: 40%; border-radius: 0.25rem; border: 1px solid #dee2e6; color: #0a58ca;">
                        <input type="hidden" class="d-none" name="status" value="<?= $order_status ?>">
                    </form>
                </div>
            </div>

            <?php
            include_once("../../connect/close.php");
            ?>
        </div>
    </div>
</div>

<?php
include_once("../Layout/Footer.php");
?>

<script>
    let clickClose = document.getElementById('click-close');
    let closeTarget = document.getElementById('close-target')

    function closeMes() {
        closeTarget.classList.add("d-none");
    }
</script>
</body>
</html>