<?php
session_start();
$statement  = $_GET['statement'];
$item_id    = $_GET['item_id'];
$bid_id     = $_GET['bid_id'];
echo $bid_id;
$link = mysqli_connect('localhost','root','12345678','sa');
//更新bid_info狀態//
$sql  = "UPDATE bid_info SET statement = '$statement' WHERE item_id = '$item_id' AND bid_id = '$bid_id' ";
mysqli_query($link,$sql);
//更新item_info狀態//
if($statement=="accepted"){
    $sql  = "UPDATE item_info SET statement = 'sold' WHERE item_id = '$item_id' ";
    mysqli_query($link,$sql);
    }

header("Location:invite.php");
?>