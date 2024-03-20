<?php
include_once '../Layout/Header.php';
if (!isset($_SESSION['email'])){
    header('Location: ../Account/Login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/base.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <lin+k rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap">
    <link href="../assets/js/main.js" rel="stylesheet" >
    <link href="../assets/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Cart</title>
    <style>
    </style>
</head>
<?php
//Mở kết nối
include_once '../../connect/open.php';
$count_money = 0;
//Trong trường hợp chưa có cart ở trên session
$carts = array();
//Lấy cart từ session về trong trường hợp đã có cart
if(isset($_SESSION['cart'])){
$carts = $_SESSION['cart'];
?>
<body>
<div style="height: auto;width: 100%;display: flex;margin-bottom: 3%">
    <div style="height: 100%;width: 100%">
<!-- Do cái action update ở đây nên cái button sẽ thực thi cái hành động này -->
<form method="post" action="update-cart.php">
    <table width="100%">
        <tr>
            <th style="background: none">STT</th>
            <th style="background: none;text-align: center">Thông tin về mặt hàng</th>
            <!-- <th style="background: none">Đơn giá</th> -->
            <!-- <th style="background: none">Số lượng</th> -->
            <th style="background: none">Tổng tiền của sản phẩm này</th>
            <th style="background: none">Hành động</th>
        </tr>
        <?php
        foreach ($carts as $id => $quantity){
        //Sql lấy thông tin sp theo id
        $sql = "SELECT * FROM watch WHERE watch_id = '$id'";
        //Chạy query
        $email = $_SESSION['email'];
        $watches = mysqli_query($connect, $sql);
        $sqlUser = "SELECT * FROM user WHERE email = '$email' ";
        $user = mysqli_query($connect,$sqlUser);
        foreach ($watches as $watches){
        ?>
        <tbody >
        <tr>
            <td><?= $watches['watch_id']?></td>
            <td >
                <div style="width: 100%" class="d-flex justify-content-around">
                    <img src="../../Asset/img/<?= $watches['image'] ?>" width="100px" height="100px" class="hinhdaidien">
                        <div class="d-flex flex-column justify-content-around">
                        <span style="font-size: 1rem" ><?= $watches['watch_name']; ?> </span>
                            <div class="d-flex ">
                                <?php echo number_format($watches['price'], 0, ',', '.'); ?>₫ x
                                <!-- <input type="number" value="<?= $quantity; ?>" name="quantity[<?= $id; ?>]" min="1"> -->
                                <div class="col-auto">
                                <input type="number" value="<?= $quantity; ?>" name="quantity[<?= $id; ?>]" min="1" 
                                id="inputPassword6" style="width: 50%;height: calc(1em + 0.4rem + 2px);" class="form-control" aria-describedby="passwordHelpInline">
                                </div>
                            </div>
                        </div>
                </div>
            </td>
            <!-- <td>
                <input type="number" value="<?= $quantity; ?>" name="quantity[<?= $id; ?>]" min="1">
            </td> -->
            <td>
                <?php
                //Tính thành tiền của từng sp có trong trong cart
                $money = $watches['price'] * $quantity;
                //Tính tổng tiền của các sp có trong trong cart
                $count_money += $money;
                echo number_format($money, 0, ',', '.'); ?>₫
            </td>
            <td>
                <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                <a href="delete-one-product-in-cart.php?id=<?= $id ?>" class="btn btn-danger btn-delete-sanpham">
                    <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                </a>
            </td>
        </tr>
        <?php
        }
        }
        ?>
        <tr>
            <td colspan="7">
                <?php
                if(!$count_money==0){
                echo 'Tổng tiền: ' . number_format($count_money,0,',',',').'đ';
                //Hiển thị tổng tiền của các sp có trong cart
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <button class="btn btn-primary btn-md" style="background: #842029">UPDATE</button>
            </td>
            <td>
                <a href="delete-all-product-in-cart.php" class="btn btn-primary btn-md" style="background: palegreen">
                    <i class="fa-solid fa-cart-shopping"></i>Delete cart
                </a>
            </td>
            <?php
            }
            ?>
        </tr>
    </table>
</form>
    <div style="width: 100%;display: flex">
        <div style="width: 50px;margin-right: 86%">
            <a href="../Layout/Main.php" class="btn btn-primary btn-md" style="text-decoration: none;width: 200px">
                <i class="fa fa-arrow-left" aria-hidden="true"> </i>&nbsp;Quay về trang chủ
            </a>
        </div>
<?php if(!$count_money==0){
    ?>
<!--<a href="checkout.php" class="btn btn-primary btn-md">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán</a>-->
    </div>
<?php
}
if (!$count_money == 0){
?>
    </div>
    <!-- <form action="order.php" method="post">
    <div style="background: #fafafa;justify-content: space-around;align-content: space-around;flex-direction: column;width: 400px;height: 485px">
        <div style="height: 45px;display: flex;justify-content: center;padding-top: 8px">
            <span style="font-weight: bold">Điền thông tin người nhận</span>
        </div>-->
        <div style="width: 40%;">
        <form action="order.php" method="post">
            <!--<div class="form-group">
                <label for="exampleInputEmail1">Người nhận hàng</label>
                <input type="text" style="height: 50px;font-size: 1.6rem" class="form-control" id="exampleInputEmail1" name="receiver_name" required aria-describedby="emailHelp" placeholder="Nhập Tên">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Số điện thoại</label>
                <input type="number" style="height: 50px;font-size: 1.6rem" class="form-control" name="receiver_phone" id="exampleInputPassword1" required placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Địa chỉ</label>
                <input type="tel" style="height: 50px;font-size: 1.6rem" class="form-control" name="receiver_address" required id="exampleInputPassword1" placeholder="Nhập địa chỉ">
            </div>
            <button class="btn btn-primary" style="margin: 125px 145px">Đặt hàng</button>  -->
            <?php
            foreach($user as $u){
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="hidden" name="user_id">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$u['email']?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?=$u['phone']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?=$u['address']?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php
            }
            ?>
        </form>
        </div>
    <!-- </div> -->
</div>
<?php
include_once '../Layout/Footer.php';
    }
}else
    {
?>
<div style="display: flex;justify-content: center;flex-direction: row; height: 100%;">
        <div>
            <p>There is nothing</p>
        </div>
</div>
<?php
    include_once '../Layout/Footer.php';
    }
?>
<!-- End block content -->
<!--Link xóa toàn bộ sản phẩm trên giỏ hàng-->
<!--Link để quay về trang danh sách sản phẩm-->
</body>
</html>