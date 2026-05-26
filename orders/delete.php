<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM orders WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$order = $data->fetch();




if(!$order){
    echo "Order topilmadi";
    exit;
}

$sql = "DELETE * FROM order_item WHERE order_id=?";
$data = $conn->prepare($sql);
$data->execute([$id]);



$sql = "DELETE * FROM orders  WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);

header("Location: index.php");
exit;
?>
