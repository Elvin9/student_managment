<?php

session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}


$id = $_GET['id'];
$sql = "SELECT * FROM teachers WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$teacher = $data->fetch();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Teacher</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .value {
            color: #555;
        }

        .btn {
            display: block;
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #6c757d;
            color: white;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Teacher Details</h2>

    <div class="info-row">
        <div class="label">First Name</div>
        <div class="value"><?= $teacher['first_name'] ?></div>
    </div>

    <div class="info-row">
        <div class="label">Last Name</div>
        <div class="value"><?= $teacher['last_name'] ?></div>
    </div>

    <div class="info-row">
        <div class="label">Age</div>
        <div class="value"><?= $teacher['age'] ?></div>
    </div>

    <div class="info-row">
        <div class="label">Phone</div>
        <div class="value"><?= $teacher['phone'] ?></div>
    </div>

    <div class="info-row">
        <div class="label">Subject</div>
        <div class="value"><?= $teacher['subject'] ?></div>
    </div>

    <div class="info-row">
        <div class="label">Experience</div>
        <div class="value"><?= $teacher['experience'] ?></div>
    </div>

    <button class="btn" onclick="history.back()">Back</button>
</div>

</body>
</html>