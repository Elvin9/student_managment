<?php
session_start();

include '../config/db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_POST['id'];
$student_id = $_POST['student_id'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$note = $_POST['note'];



$sql = "UPDATE orders
    SET student_id = ?, from_date = ?, to_date = ?, note = ?
    WHERE id = ? ";
$data = $conn->prepare($sql);
$data->execute([$student_id, $from_date, $to_date, $note, $id]);

header("Location: index.php");
exit();

