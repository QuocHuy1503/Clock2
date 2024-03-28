<?php
 include_once '../../connect/open.php';
 $password = $_POST['password'];
 $user_id = $_POST['user_id'];
 $sql = "UPDATE user SET password = '$password' WHERE user_id = '$user_id'";
 $userChangePassword = mysqli_query($connect,$sql);
 include_once '../../connect/close.php';
 header('Location: ../profile/passwordChange.php?user_id=$user_id');
?>