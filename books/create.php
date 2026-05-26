<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>

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
            margin-bottom: 20px;
            text-align: center;
        }

        input, textarea {
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
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover {
            background: #218838;
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
    <h2>📚 Add New Book</h2>

    <form action="store.php" method="POST">
        <input type="text" name="book_name" placeholder="Book Name" required>

        <input type="text" name="book_author" placeholder="Author" required>

        <input type="date" name="published_date" required>

        <textarea name="book_note" placeholder="Book Note"></textarea>

        <input type="text" name="category" placeholder="Category" required>

        <input type="text" name="count" placeholder="Total" required>

        <button type="submit" class="btn">Add Book</button>
    </form>

    <a href="index.php" class="back">← Back to list</a>
</div>

</body>
</html>