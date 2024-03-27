<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
            width: 100%;
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
        .form-box{
            position: relative;
            width: 400px;
            height: 550px;
            background: #212529;
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        h2{
            font-size: 2em;
            color: #fff;
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
            color: #fff;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }
        input:focus ~ label,
        input:valid ~ label{
            top: -5px;
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
$loi="";
if (isset($_POST['yeucauButton'])==true){
    $email = $_POST['email'];
    $conn =     new PDO("mysql:host=localhost;dbname=watch", "root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= "SELECT * FROM user WHERE email = ?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if($count==0){
        $loi = "Bạn chưa đăng kí mà đòi quên mật khẩu à";
    }else {
        $matkhauNew = 12345678;
        $sql = "UPDATE user SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$matkhauNew, $email]);
        $loi = "Mật khẩu của bạn đã được reset về mật khẩu mặc định. Còn bạn quên mật khẩu mặc định hãy đen trang chủ";
    }
}

?>

<?php
/*function SendNewPassword($email, $matkhauNew)
{
    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 2; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'ohzay131@gmail.com'; // SMTP username
        $mail->Password = 'Maiyeuem123';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL
        $mail->Port = 465;  // port to connect to
        $mail->setFrom('ohzay131@gmail.com', 'Thằng admin này' );
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Dành cho thằng ngáo đá ngu ngơ';
        $noidungthu = "<p>Bạn nhận thư này do thằng nào đó gửi hoặc do bạn ngáo quên mật khẩu nên bạn ấn
        Mật khẩu mới cho thằng ất ơ như bạn là {$matkhauNew}
</p>";
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
        return false;
    }
}
*/?>
    <section class="vh-100 gradient-custom">
        <div class="form-box">
            <div class="form-value">
    <form method="post" >
    <h2>Đăng nhập</h2>
    <?php if ($loi!="") {?>
        <div class="alert alert-danger"><?php echo $loi?> </div>
    <?php } ?>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input value="<?php if (isset($email)==true) echo $_POST['email']?>" type="email" id="email" name="email" >
                <label for="email">Email</label>

            </div>
    <button type="submit" name="yeucauButton" value="nutgui">Gửi yêu cầu </button>
    </form>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    </body>
</html>