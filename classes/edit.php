<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM classes WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$class = $data->fetch();

if(!$class){
    echo "class is not found!";
    exit();
}
$sql = "SELECT * FROM teachers ORDER BY id DESC";
$data = $conn->prepare($sql);
$data->execute();
$teachers = $data->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Class</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #4facfe;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            margin-top: 10px;
        }

        .submit-btn {
            background: #28a745;
            color: white;
        }

        .submit-btn:hover {
            background: #218838;
        }

        .back-btn {
            background: #6c757d;
            color: white;
        }

        .back-btn:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Class</h2>

    <form action="update.php" method="POST">
        <input type="hiddem" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label>Class Name</label>
            <input type="text" placeholder="Enter class name (e.g. 10-A)" value="<?= $class['class_name'] ?>" name="class_name" required>
        </div>

        <div class="form-group">
            
            <label>Select Teacher</label>
            <select required name="teacher_id">

                <?php foreach ($teachers as $item): ?>
                    <option value="<?= $item['id'] ?>" <?= ($class['teacher_id'] == $item['id']) ? "selected" : "" ?> ><?= $item['first_name']." ". $item["last_name"] ?></option>
                 <?php endforeach ?>
            </select>
           
        </div>
                    
        <button type="submit" class="btn submit-btn">Complete editing</button>
        <button type="button" class="btn back-btn" onclick="history.back()">Back</button>
    </form>
</div>

</body>
</html>
