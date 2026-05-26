<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$book = $data->fetch();


if(!$book){
    echo "Book topilmadi";
    exit;
}

$sql = "DELETE FROM books WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);

header("Location: index.php");
exit;
?>
