<?php
session_start();

include '../config/db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$full_name = $_POST['full_name'];
$age = $_POST['age'];
$class = $_POST['class'];
$phone = $_POST['phone'];
$adress = $_POST['address'];


$sql = "INSERT INTO students (full_name, age, phone, class_name, adress)
    VALUES(?, ?, ?, ?, ?)";


$data = $conn->prepare($sql);

$data->execute([$full_name, $age, $phone, $class, $adress]);
header("Location: index.php");
exit();



?>