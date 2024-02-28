<?php
session_start();
$email = $_POST['email-ad'];
$password = $_POST['password-ad'];
include_once '../connect/open.php';
$sql = "SELECT *, COUNT(admin_id) AS count_account FROM admins WHERE email = '$email' AND password = '$password'";
$accounts = mysqli_query($connect, $sql);
include_once '../connect/close.php';
foreach ($accounts as $account){
    $id = $account['id'];
    $count_account = $account['count_account'];
}
if($count_account == 0){
    header("Location:index.php");
} else {
    //LÆ°u id, email lÃªn session
    $_SESSION['id-ad'] = $id;
    $_SESSION['email-ad'] = $email;
    header("Location:doc/index.php");
}
?>