<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

var_dump($_POST);

$id= $_POST['id'];
$full_name = $_POST['full_name'];
$age = $_POST['age'];
$address = $_POST['address'];
$class = $_POST['class'];
$phone = $_POST['phone'];

$sql = "UPDATE students
    SET full_name =?, age = ?, adress = ?, class_id = ?, phone = ?
    WHERE id = ? ";
$data = $conn->prepare($sql);
$data->execute([$full_name, $age,  $address, $class, $phone, $id]);

header("Location: index.php");
exit();

?>