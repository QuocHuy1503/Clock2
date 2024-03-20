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
        $matkhauNew = substr(md5(rand(0, 9999999)), 0, 8);
        $sql = "UPDATE user SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$matkhauNew, $email]);
        $kq = SendNewPassWord($email, $matkhauNew);
        if ($kq == true) {
            header("location:thongbao.php");
            echo "<script>document.location='thongbao.php'; </script>";
        }


    }
}

?>

<?php
function SendNewPassword($email, $matkhauNew)
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
        $mail->Username = 'qnhuy213@gmail.com'; // SMTP username
        $mail->Password = '0985800995z';   // SMTP password
        $mail->SMTPSecure = 'tls';  // encryption TLS/SSL
        $mail->Port = 535;  // port to connect to
        $mail->setFrom('ohzay132@gmail.com', 'Thằng admin này' );
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
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<form method="post" style="width: 600px;" class="border border-primary border-2 m-auto p-2">
    <h1 class="mb-3 text-center">
        Quên Mật Khẩu
    </h1>
    <?php if ($loi!="") {?>
        <div class="alert alert-danger"><?php echo $loi?> </div>
    <?php } ?>
    <div class="mb-3">
        <label for="email" class="form-label">Nhập email</label>
        <input value="<?php if (isset($email)==true) echo $_POST['email']?>" type="email" class="form-control" id="email" name="email" >
    </div>
    <button type="submit" name="yeucauButton" value="nutgui">Gửi yêu cầu </button>
</form>