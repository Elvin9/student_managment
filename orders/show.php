<?php

session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}


$id = $_GET['id'];
$sql = "SELECT o.id, o.from_date, o.to_date, o.note, s.full_name FROM orders o JOIN students s ON o.student_id = s.id WHERE o.id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$order = $data->fetch();

$sql = "SELECT ot.id, b.book_name, ot.order_id, ot.intake_date FROM order_item ot LEFT JOIN books b ON ot.book_id = b.id WHERE ot.order_id=? ";
$data = $conn->prepare($sql);
$data->execute([$id]);
$order_item = $data->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Order</title>

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
            text-align: center;
            margin-bottom: 20px;
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

        .books-list {
            margin-top: 5px;
            padding-left: 20px;
            color: #555;
        }

        .books-list li {
            margin-bottom: 5px;
        }

        .add-book {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 12px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .add-book:hover {
            background: #218838;
        }

        /* Books list */
        .books-list {
            margin-top: 5px;
            padding-left: 0;
            list-style: none;
        }

        /* Each book row */
        .books-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8f9fa;
            padding: 8px 10px;
            border-radius: 6px;
            margin-bottom: 6px;
        }

        /* Book name text */
        .books-list li {
            font-size: 14px;
            color: #333;
        }

        /* Buttons (links) */
        .books-list a {
            margin-left: 6px;
            padding: 4px 8px;
            font-size: 12px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
        }

        /* Edit button */
        .books-list a:first-of-type {
            background: #007bff;
        }

        .books-list a:first-of-type:hover {
            background: #0069d9;
        }

        /* Delete button */
        .books-list a:last-of-type {
            background: #dc3545;
        }

        .books-list a:last-of-type:hover {
            background: #c82333;
        }

        /* Books list */
        .books-list {
            margin-top: 5px;
            padding-left: 0;
            list-style: none;
        }

        /* Each row */
        .books-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f9fa;
            padding: 8px 10px;
            border-radius: 6px;
            margin-bottom: 6px;
        }

        /* Book name */
        .book-name {
            font-size: 14px;
            color: #333;
        }

        /* Actions container */
        .actions {
            display: flex;
            gap: 6px;
        }

        /* Common button */
        .btn {
            padding: 4px 8px;
            font-size: 12px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
        }

        /* Edit */
        .edit-btn {
            background: #007bff;
        }

        .edit-btn:hover {
            background: #0069d9;
        }

        /* Delete */
        .delete-btn {
            background: #dc3545;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        /* Base style for all action buttons to keep them consistent */
        .actions a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
            margin-right: 5px;
            transition: background-color 0.3s ease;
            color: white;
        }

        /* Specific Green style for Confirm button */
        .confirm-btn {
            background-color: #28a745;
            /* Modern green */
            border: 1px solid #218838;
        }

        .confirm-btn:hover {
            background-color: #218838;
            /* Darker green on hover */
        }

        /* Keeping your other buttons consistent (Optional) */
        .edit-btn {
            background-color: #007bff;
            /* Blue */
        }

        .delete-btn {
            background-color: #dc3545;
            /* Red */
        }

        .books-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }

        .books-table th,
        .books-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .books-table th {
            background: #343a40;
            color: white;
        }

        .books-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .actions a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
            color: white;
            margin-right: 5px;
            font-size: 14px;
        }

        .confirm-btn {
            background: #28a745;
        }

        .edit-btn {
            background: #007bff;
        }

        .delete-btn {
            background: #dc3545;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>📦 Order Details</h2>

        <div class="info">
            <div class="label">Order ID:</div>
            <div class="value"><?= $order['id'] ?></div>
        </div>

        <div class="info">
            <div class="label">Student Name:</div>
            <div class="value"><?= $order['full_name'] ?></div>
        </div>

        <div class="info">
            <div class="label">From Time:</div>
            <div class="value"><?= $order['from_date'] ?></div>
        </div>

        <div class="info">
            <div class="label">To Time:</div>
            <div class="value"><?= $order['to_date'] ?></div>
        </div>

        <div class="info">
            <div class="info">
                <div class="label">Books:</div>

                <ul class="books-list">
                    <table class="books-table">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Intake Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($order_item as $item): ?>
                                <tr style="background-color:<?= (empty($item['intake_date']) && ($order['to_date'] < date('Y-m-d'))) ? "red" : ""
                                ?>">
                                    <!-- Book Name -->
                                    <td>
                                        <?= htmlspecialchars($item['book_name']); ?>
                                    </td>

                                    <!-- Intake Date -->
                                    <td>
                                        <?php if (empty($item['intake_date'])): ?>
                                            Not confirmed
                                        <?php else: ?>
                                            <?= $item['intake_date']; ?>
                                        <?php endif; ?>
                                    </td>


                                    <!-- Actions -->
                                    <td class="actions">

                                        <?php if (empty($item['intake_date'])): ?>
                                            <a href="../order_items/confirm_book.php?id=<?= $item['id'] ?>&order_id=<?= $item['order_id'] ?>"
                                                class="confirm-btn" onclick="return confirmIntakeDate(this)">
                                                Confirm
                                            </a>
                                        <?php endif; ?>

                                        <!-- Edit -->
                                        <a href="../order_items/edit_book.php?id=<?= $item['id'] ?>" class="edit-btn">
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <a href="../order_items/delete_book.php?id=<?= $item['id'] ?>" class="delete-btn"
                                            onclick="return confirm('Do you really want to delete this order item?')">
                                            Delete
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </ul>

                <a href="../order_items/add_book.php?order_id=<?= $order['id'] ?>" class="btn add-book">
                    + Add Book
                </a>
                <a href="index.php" class="back">← Back to Orders</a>
            </div>

</body>

</html>