<?php
//Cho phép làm việc với session
session_start();
//Xóa email trên session
session_destroy();
//Quay về trang login
header("Location:login.php");
?>
