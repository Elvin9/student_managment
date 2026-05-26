<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

$order_id = $_GET['order_id'];
$id = $_GET['id'];
$intake_date  = date("Y-m-d H:i:s");


$sql = "UPDATE order_item 
set intake_date = ?
where id=?";
$data = $conn->prepare($sql);
$data->execute([$intake_date, $id]);

$sql = "SELECT book_id FROM order_item WHERE id=?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$order_item = $data->fetch();
$book_id = $order_item['book_id'];

$sql = "UPDATE books 
SET count = count + 1 WHERE id=?";
$data = $conn->prepare($sql);
$data->execute([$book_id]);





header("Location: ../orders/show.php?id=".$order_id);
exit();
