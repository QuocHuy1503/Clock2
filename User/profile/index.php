
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../Admin2/css/bootstrap.css">
    <link rel="stylesheet" href="../../Admin2/css/header_style.css">
    <link rel="stylesheet" href="../../Admin2/css/main_style.css">
    <link rel="stylesheet" href="../../Admin2/css/profile.css">

    <title>XinXo Watch - My Account</title>
</head>
<body>
<?php
include_once '../Layout/Header.php';
$userId = $_SESSION['email'];
include_once("../../connect/open.php");
$sql = "SELECT * FROM user WHERE email = '$userId'";
$user = mysqli_query($connect, $sql);
?>

<div id="about"></div>
<!--Content -->
<div id="main-container" class="mt-5">
    <div id="left-container">
        <?php
        include_once("../Layout/UserProfile.php");
        ?>

    </div>

    <div id="right-container">
        <form action="info-update.php" method="post">
            <div style="height: auto; margin: 40px">
                <div>
                    <h2>
                        Customer Profile
                    </h2>

                    <hr>
                </div>

                <?php
                foreach ($user as $cus) {
                    ?>
                    <div class="d-flex justify-content-between" style="margin-top: 28px">
                        <div style="width: 40%;">
                            <div class="padding-nice d-flex justify-content-between align-items-center">
                                Name: <input type="text" name="user_name" value="<?= $cus['user_name'] ?>">
                            </div>

                            <div class="padding-nice d-flex justify-content-between align-items-center">
                                Email: <input type="email" name="email" value="<?= $cus['email'] ?>">
                            </div>

                            <div class="padding-nice d-flex justify-content-between align-items-center">
                                Phone number: <input type="text" name="phone" value="<?= $cus['phone'] ?>">
                            </div>

                            <div class="padding-nice d-flex justify-content-between align-items-center">
                                Address: <input type="text" name="address" value="<?= $cus['address'] ?>">
                            </div>
                            <div class="padding-nice d-flex justify-content-between align-items-center">
                                <input type="hidden" name="user_id" value="<?= $cus['user_id'] ?>">
                            </div>
                        </div>
                        <div style="width: 30%">
                            <?php
                            if (!isset($_SESSION['update_profile'])) {
                                $_SESSION['update_profile'] = 0;
                            }
                            if ($_SESSION['update_profile'] === 1) {
                                echo '<div id="close-target" class="alert alert-success" role="alert">
                                Your information update successful 
                                <i id="click-close" class="fa-solid fa-x" style="font-size: 12px; padding: 8px; margin-left: 24px" 
                                onclick="closeMes()"></i>
                                </div>';
                                $_SESSION['update_profile'] = 0;
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                }
                include_once("../../connect/close.php");
                ?>

                <div style="margin-top: 9.4%" class="d-flex justify-content-center">
                    <button id="save-btn">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--footer-->
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