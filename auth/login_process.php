<?php
session_start();
include '../config/db.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$data = $conn->prepare($sql);
$data->execute([$username, $password]);
$user = $data->fetch();

if($user){
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
header("Location: ../dashboard.php");

} else {
    header("Location: login.php?error=1 ");
    exit();
}
?>