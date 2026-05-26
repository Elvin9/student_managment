<?php

session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}


$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$book = $data->fetch();


$sql = "SELECT * FROM students";
$data = $conn->prepare($sql);
$data->execute()
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Book</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            width: 450px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .info {
            margin-bottom: 12px;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .value {
            margin-top: 3px;
            color: #555;
        }

        .back {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background: #6c757d;
            color: white;
            padding: 8px;
            border-radius: 5px;
        }

        .back:hover {
            background: #5a6268;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>📖 Book Details</h2>

        <div class="info">
            <div class="label">ID:</div>
            <div class="value"><?= $book['id'] ?></div>
        </div>

        <div class="info">
            <div class="label">Book Name:</div>
            <div class="value"><?= $book['book_name'] ?></div>
        </div>

        <div class="info">
            <div class="label">Author:</div>
            <div class="value"><?= $book['book_author'] ?></div>
        </div>

        <div class="info">
            <div class="label">Published Date:</div>
            <div class="value"><?= $book['published_date'] ?></div>
        </div>

        <div class="info">
            <div class="label">Note:</div>
            <div class="value"><?= $book['book_note'] ?></div>
        </div>
        <div class="info">
            <div class="label">Category</div>
            <div class="value"><?= $book['category'] ?></div>
        </div>
        <div class="info">
            <div class="label">Total</div>
            <div class="value"><?= $book['count'] ?></div>
        </div>


        <a href="index.php" class="back">← Back to list</a>
    </div>


    <table class="students-table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Class</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Ali Valiyev</td>
                <td>10-A</td>
            </tr>
        </tbody>
    </table>
</body>

</html>