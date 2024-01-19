<?php
session_start();
if(isset($_SESSION['email'])){
    header("Location:GiaodienAdmin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home-laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(132deg, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3,#03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3,#03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800);
            background-size: 400% 400%;
            animation: BackgroundGradient 30s ease infinite;

        }

        @keyframes BackgroundGradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
        .baslik
        {
            height: 50px;
            color: #fff;
            text-align: center;
            font-family: 'Fira Sans', sans-serif;
        }
        .arkalogin
        {
            width: 300px;
            text-align: center;
            background: #fff;
            height: 300px;
            padding: 10px;
            margin: 50px auto;
        }
        .loginbaslik
        {
            color: #888888;
            text-align: left;
            font-size: 19px;
            margin-top: 15px;
        }
        .giris
        {
            width: 100%;
            height: 40px;
            margin-top: 10px;
            border: none;
            background: #E5E5E5;
            outline: none;
            padding: 0 10px;
        }
        .butonlogin
        {
            width: 100%;
            margin-top: 10px;
            height: 40px;
            font-weight: bold;
            background: #2196F3;
            border: none;
            color: #fff;
            transition: all 250ms;
        }
        .butonlogin:hover
        {
            background: #1E88E5;
        }
        body
        {
            margin: 0;
        }
    </style>
</head>
<body>
<!--            thong bao login -->
<?php
if (!isset($_SESSION['failed'])) {
    $_SESSION['failed'] = 0;
}
?>
<section>
     <?php
    if ($_SESSION['failed'] === 1) {
        echo '<div id="close-target" class="alert alert-danger position-absolute" role="alert"
                style="top: 5%; right: 4%; box-shadow: 1px 1px red; animation: fadeOut 5s;">
           Email hoặc mật khẩu sai !
              <i id="click-close" class="fa-solid fa-x" style="font-size: 12px; padding: 8px; cursor: pointer" onclick="closeMes()"></i>
              </div>';
        $_SESSION['failed'] = 0;
    }
    ?>
    <div style="background-image: url(); background-attachment: fixed; background-size: cover; width: 100%; height: 100vh; position: relative;"  >
        <div class="baslik" style="align-content: center">
        </div>
        <section>
            <form method="post" action="loginProcess.php">
                <div class="arkalogin">
                    <div class="loginbaslik">Admin Please enter your account</div>
                    <hr style="border: 1px solid #ccc;">
                    <input class="giris" type="text" name="email" placeholder="Email">
                    <input class="giris" type="password" name="password" placeholder="Password">
                    <button class="butonlogin" type="submit">Login</button>
                </div>
            </form>
        </section>

    </div>
</section>

<script>
    let clickClose = document.getElementById('click-close');
    let closeTarget = document.getElementById('close-target')

    function closeMes() {
        closeTarget.classList.add("d-none");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

