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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
    <link href="../assets/fonts/fontawesome-free-6.4.0-web/js/all.js" rel="stylesheet" >
    <link href="../assets/css/style.css">
    <title>Checkout</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'poppins',sans-serif;
        }
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 80%;
            margin-left: 10%;
/*            background-color: #d1f9ff;*/
            background-position: center;
            background-size: cover;
            /*
            background-image: url("../../image/lovepik-books-in-the-sky-background-image_400062995.jpg");
            */
        }
        .form-box{
            position: relative;
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px solid rgb(80, 104, 255);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;

        }
        h2{
            font-size: 2em;
            color: #01090a;
            text-align: center;
        }
        .inputbox{
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }
        .inputbox label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #01090a;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }
        input:valid ~ label{
            top: -3px;
        }
        .inputbox input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding:0 35px 0 5px;
            color: #fff;
        }
        .inputbox ion-icon{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }
        .forget{
            margin: -15px 0 15px ;
            font-size: .9em;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }

        .forget label input{
            margin-right: 3px;

        }
        .forget label a{
            color: #fff;
            text-decoration: none;
        }
        .forget label a:hover{
            text-decoration: underline;
        }
        button{
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
        }
        .register{
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }
        .register p a{
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }
        .register p a:hover{
            text-decoration: underline;
        }

    </style>
</head>
<body>
<?php
include_once '../../Connects/open.php';
include_once '../Layout/Header.php';
$sql = "SELECT * FROM orders";
$orders = mysqli_query($connect,$sql);
include_once '../../Connects/close.php';
?>
<form action="order.php" method="post"  class="form"><!--
    <div class="nice-form-group">
        <label>Nguoi Nhan</label>
        <input type="text" placeholder="Your Name" name="receiver_name" class="icon-left" />
    </div>
    <div class="nice-form-group">
        <label>So Dien Thoai</label>
        <input type="number" placeholder="Your phonenumber" name="receiver_phone" class="icon-left" />
    </div>
    <div class="nice-form-group">
        <label>Dia Chi</label>
        <input type="tel" placeholder="Your Address" name="receiver_address" class="icon-left" />
    </div>
    <button>Submit</button>-->
    <section>
        <div class="form-box">
            <div class="form-value">

                    <h5>Điền thông tin địa chỉ người nhận</h5>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" placeholder="" name="receiver_name">
                        <label for="email">Tên người nhận</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="tel" placeholder="" name="receiver_phone">
                        <label for="password">Số điện thoại</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" placeholder="" name="receiver_address">
                        <label for="password">Địa chỉ</label>
                    </div>
                    <button>Thanh toán</button>
            </div>
        </div>
    </section>
</form>
</body>
</html>