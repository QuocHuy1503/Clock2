<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../account/login.php");
}

//lay du lieu
$user_id = $_SESSION['user_id'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

include_once("../../connect/open.php");

$sql = "UPDATE user SET user_name = '$user_name', email = '$email', phone = '$phone', 
                                 gender = '$gender', address = '$address'
                            WHERE user_id = '$user_id'";
mysqli_query($connect, $sql);
include_once '../../connect/close.php';

$_SESSION['update_profile'] = 1;
header("Location: index.php");