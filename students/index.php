<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
        /* General Page Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .table-container {
            width: 100%;
            max-width: 1100px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        /* Header Section */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            margin: 0;
            font-weight: 600;
        }

        /* Add Student Button Styling */
        .btn-add {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-add:hover {
            background-color: #219150;
            box-shadow: 0 4px 8px rgba(39, 174, 96, 0.2);
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
        }

        thead {
            background-color: #4a90e2;
            color: white;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        tbody tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        tbody tr:hover {
            background-color: #f1f7ff;
            transition: 0.3s;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .table-container {
                padding: 10px;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="table-container">
        <div class="header-section">
            <h2>Student Enrollment List</h2>
            <a href="create.php" class="btn-add">+ Add Student</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Pupils</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $item): ?>
                <tr>
                    <td><?= $cnt++ ?></td>
                    <td><?= $item['full_name'] ?></td>
                    <td><?= $item['age'] ?></td>
                    <td><?= $item['class_name'] ?></td>
                    <td><?= $item['phone'] ?></td>
                    <td><?= $item['adress'] ?></td>
                    <td><?= date("d.M.Y", strtotime($item['created_at'])) ?></td>
                    <td>   <a style="color: green; text-box-edge: #4a90e2;" href="View">View</a>
                    <a href="edit.php?id=<?= $item['id'] ?> ">Edit</a>
                    <a href="delete.php?id=<?= $item['id'] ?>" class="delete" onclick="return confirm('Do you really wanna delete this student')" >Delete</a> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>