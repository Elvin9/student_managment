<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$sql = "SELECT * FROM students ORDER BY id DESC";
$data = $conn->prepare($sql);
$data->execute();
$students = $data->fetchAll();
$cnt = 1
    ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Order</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        select, input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #fd7e14;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover {
            background: #e36b0a;
        }

        .back {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>📦 Create Order</h2>

    <form action="store.php" method="POST">

        <!-- Student Dropdown -->
        <select name="student_id" required>
            <option value="">Select students</option>
            <?php foreach ($students as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['full_name'] ?></option>
                 <?php endforeach ?>
        </select>

        <!-- From Date -->
        <input type="date" name="from_date" required>

        <!-- To Date -->
        <input type="date" name="to_date" required>

        <!-- Note -->
        <textarea name="note" placeholder="Note (optional)"></textarea>

        <button type="submit" class="btn">Create Order</button>
    </form>

    <a href="index.php" class="back">← Back to Orders</a>
</div>

</body>
</html>