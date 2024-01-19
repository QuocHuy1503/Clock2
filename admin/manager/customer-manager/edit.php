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
include_once '../../../connect/Connect.php';
$sql = "SELECT * FROM customer WHERE id = '$id'";
$customer = mysqli_query($connect, $sql);
include_once '../../../connect/close.php';
foreach ($customer as $cus){
    ?>
    <form method="post" action="update.php">
        <input required type="hidden" name="id" value="<?= $cus['id'] ?>">
        Name: <input required type="text" name="name" value="<?= $cus['name'] ?>"><br>
        Email: <input required type="text" name="email" value="<?= $cus['email'] ?>"><br>
        Password: <input required type="text" name="password" value="<?= $cus['password'] ?>"><br>
        Phone: <input required type="number" name="phone" value="<?= $cus['phone'] ?>"><br>
        Gender:   <select name="gender" required>
            <option><?php if ($cus['gender'] == 1){ echo 'Nam';} else{ echo 'Nữ'; }?></option>
            <?php
            if ($cus['gender'] == 1){
                ?>
                <option value="2">Nữ</option>
                <?php
            }else if ($cus['gender'] == 2){
                ?>
                <option value="1">Nam</option>
                <?php
            }
            ?>
        </select><br>
        Address: <input type="text" name="address" value="<?= $cus['address'] ?>"><br><br><br><br>
        <button>Update</button>
    </form>
    <?php
}
?>
</body>
</html>