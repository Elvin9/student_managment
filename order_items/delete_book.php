<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM order_item WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$order_item = $data->fetch();
$order_id = $order_item['order_id'];


if(!$order_item){
    echo "Order_item topilmadi";
    exit;
}

$sql = "DELETE FROM order_item  WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);

header("Location: ../orders/show.php?id=".$order_id);
exit();

?>
