<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}
$order_id = $_POST['order_id'];
$id = $_POST['order-item_id'];
$book_id = $_POST['book_id'];

$sql = "UPDATE order_item
SET book_id = ?
WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$book_id, $id]);

header("Location: ../orders/show.php?id=".$order_id);
exit();