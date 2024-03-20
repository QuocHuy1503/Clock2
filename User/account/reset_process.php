<?php
 include_once '../../connect/open.php';
 if(isset($_POST['password_reset_form'])){
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $token = md5(rand());
    $check_mail = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_mail_run = mysqli_query($connect, $check_mail);
 }
 if(mysqli_run_row($check_mail_run) > 0){
    
 }else{
    $_SESSION['status'] = "No Email Found";
    header("Location:");
    exit(0);
 }
?>