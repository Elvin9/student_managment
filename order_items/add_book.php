<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}
$id = $_GET['order_id'];
$sql = "SELECT *  FROM books WHERE count > 0";
$data = $conn->prepare($sql);
$data->execute();
$books = $data->fetchAll();
$cnt = 1

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Books</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            padding: 30px;
        }

        .info {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .label {
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        /* Books list */
        .books-list {
            padding-left: 20px;
            margin-bottom: 10px;
            color: #555;
        }

        .books-list li {
            margin-bottom: 4px;
        }

        /* Form styling */
        .book-form {
            display: flex;
            gap: 8px;
            margin-top: 5px;
        }

        .book-form select {
            flex: 1;
            padding: 7px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        /* Button */
        .btn.add-book {
            padding: 7px 12px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn.add-book:hover {
            background: #218838;
        }
    </style>
</head>

<body>

    <div class="info">
        <div class="label">Books:</div>


        <ul class="books-list">
            <?php foreach ($books as $item): ?>
                <li><?= $item['book_name']; ?></li>
            <?php endforeach; ?>
        </ul>


        <form action="store.php" method="POST" class="book-form">
            <input type="hidden" name="order_id" value="<?= $id ?>">
            <select name="book_id" required>
                <option value="">Select Book</option>

                <?php foreach ($books as $book): ?>
                    <option value="<?= $book['id']; ?>">
                        <?= $book['book_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn add-book">Add</button>
        </form>
    </div>

</body>

</html>