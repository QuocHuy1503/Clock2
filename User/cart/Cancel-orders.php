<?php
include_once '../../Connects/open.php';
$id = $_GET['id'];
$sql = "SELECT status From orders where id = '$id'";
/*$status = mysqli_query($connect,$sql);
if($status == 0 ){
    $sql = "UPDATE orders SET status = 3 where id = '$id'";
    $orders = mysqli_query($connect,$sql);
}
else{
    die;
}*/
$orders =mysqli_query($connect,$sql);
foreach ($orders as $order){
   if($order['status']==0){
       $sql = "UPDATE orders SET status = 3 where id = '$id'";
       $orders = mysqli_query($connect,$sql);
       header("Location:../Layout/Main.php");
   }
   else{
       header("Location:../Layout/Main.php");
   }
}
include_once '../../Connects/close.php';
?>