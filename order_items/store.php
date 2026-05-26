<?php
session_start();

include '../config/db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$book_id = $_POST['book_id'];
$order_id = $_POST['order_id'];




$sql = "INSERT INTO order_item (order_id,book_id)
    VALUES(?, ?)";


$data = $conn->prepare($sql);

$data->execute([$order_id, $book_id]);
$sql = "UPDATE books
SET count = count-1 WHERE id=?";
$data = $conn->prepare($sql);
$data->execute([$book_id]);
header("Location: ../orders/show.php?id=".$order_id);
exit();
