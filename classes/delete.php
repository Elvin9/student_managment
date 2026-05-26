<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM classes WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$class = $data->fetch();


if(!$class){
    echo "Teacher topilmadi";
    exit;
}

$sql = "DELETE FROM classes  WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);

header("Location: index.php");
exit;
?>
