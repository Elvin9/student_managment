<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$sql = "SELECT * FROM books";
$data = $conn->prepare($sql);
$data->execute();
$books = $data->fetchAll();

$cnt = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fb;
            min-height: 100vh;
        }

        /* PAGE CONTENT */
        .page-content {
            width: 100%;
            padding: 35px;
            margin-top: 10px;
        }

        /* CONTAINER */
        .container {
            width: 100%;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h2 {
            font-size: 30px;
            color: #2d3436;
            font-weight: 700;
        }

        /* ADD BUTTON */
        .add-btn {
            text-decoration: none;
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            color: white;
            padding: 12px 22px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
            display: inline-block;
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 233, 123, 0.3);
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 15px;
            overflow: hidden;
        }

        /* TABLE HEADER */
        thead {
            background: linear-gradient(135deg, #4facfe, #00c6fb);
            color: white;
        }

        th {
            padding: 18px;
            text-align: left;
            font-size: 15px;
            white-space: nowrap;
        }

        /* TABLE BODY */
        td {
            padding: 16px;
            border-bottom: 1px solid #edf2f7;
            color: #444;
            white-space: nowrap;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f7fbff;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 10px;
            color: white;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
            display: inline-block;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .view-btn {
            background: #3498db;
        }

        .edit-btn {
            background: #2ecc71;
        }

        .delete-btn {
            background: #e74c3c;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {

            .page-content {
                padding: 15px;
            }

            .container {
                padding: 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

        }
    </style>
</head>

<body>

    <?php include "../includes/header.php"; ?>

    <div class="page-content">

        <div class="container">

            <div class="header">

                <h2>📚 Books List</h2>

                <a href="create.php" class="add-btn">
                    + Add New Book
                </a>

            </div>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th>Note</th>
                        <th>Category</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($books as $item): ?>

                        <tr>

                            <td><?= $cnt++ ?></td>

                            <td><?= $item['book_name'] ?></td>

                            <td><?= $item['book_author'] ?></td>

                            <td><?= $item['published_date'] ?></td>

                            <td><?= $item['book_note'] ?></td>

                            <td><?= $item['category'] ?></td>

                            <td><?= $item['count'] ?></td>

                            <td class="actions">

                                <a href="show.php?id=<?= $item['id'] ?>" class="btn view-btn">
                                    View
                                </a>

                                <a href="edit.php?id=<?= $item['id'] ?>" class="btn edit-btn">
                                    Edit
                                </a>

                                <a href="delete.php?id=<?= $item['id'] ?>"
                                    class="btn delete-btn"
                                    onclick="return confirm('Do you really wanna delete this book?')">

                                    Delete

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>