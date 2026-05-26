<?php
session_start();

include '../config/db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
$student_id = $_POST['student_id'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$note = $_POST['note'];



$sql = "INSERT INTO orders (student_id,from_date, to_date, note)
    VALUES(?, ?, ?, ?)";


$data = $conn->prepare($sql);

$data->execute([$student_id,$from_date, $to_date, $note]);
header("Location: index.php");
exit();
