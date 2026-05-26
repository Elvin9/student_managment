<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}


$id= $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$experience = $_POST['experience'];

$sql = "UPDATE teachers
    SET first_name =?, last_name = ?, age = ?, phone = ?, subject = ?, experience = ?
    WHERE id = ? ";
$data = $conn->prepare($sql);
$data->execute([$first_name, $last_name, $age,  $phone, $subject, $experience, $id]);

header("Location: index.php");
exit();

?>