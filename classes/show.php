<?php

session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}


$id = $_GET['id'];
$sql = "SELECT c.id, c.class_name, t.first_name, t.last_name FROM classes c JOIN teachers t ON c.teacher_id = t.id WHERE c.id=? " ;
$data = $conn->prepare($sql);
$data->execute([$id]);
$class = $data->fetch();


$sql = "SELECT full_name FROM classes c JOIN students s ON s.class_id = c.id WHERE c.id=? ";
$data = $conn->prepare($sql);
$data->execute([$id]);
$students = $data->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Class</title>

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
            max-width: 600px;
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

        .students {
            margin-top: 20px;
        }

        .students h3 {
            margin-bottom: 10px;
        }

        .student-item {
            padding: 8px;
            border-bottom: 1px solid #eee;
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
    </style>
</head>
<body>

<div class="container">
    <h2>Class Details</h2>

    <!-- Class Name -->
    <div class="info-row">
        <div class="label">Class Name</div>
        <div class="value"><?= $class['class_name'] ?></div>
    </div>

    <!-- Teacher -->
    <div class="info-row">
        <div class="label">Teacher</div>
        <div class="value">
            <?= $class['first_name'] . " " . $class['last_name'] ?>
        </div>
    </div>

    <!-- Students List -->
    <div class="students">
        <h3>Students</h3>

            <?php foreach ($students as $s): ?>
                <div class="student-item">
                    <?= $s['full_name'] ?>
                </div>
            <?php endforeach; ?>
    </div>

    <button class="btn" onclick="history.back()">Back</button>
</div>

</body>
</html>