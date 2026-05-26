<?php
session_start();

include '../config/db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$class_name = $_POST['class_name'];
$teacher_id = $_POST['teacher_id'];



$sql = "INSERT INTO classes (class_name, teacher_id)
    VALUES(?, ?)";


$data = $conn->prepare($sql);

$data->execute([$class_name, $teacher_id]);
header("Location: index.php");
exit();
