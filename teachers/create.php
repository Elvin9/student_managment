<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Teacher</title>

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

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }

        input:focus {
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
    <h2>Add New Teacher</h2>

    <form action="store.php" method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" placeholder="Enter first name" required name="first_name">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" placeholder="Enter last name" required name="last_name">
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="number" placeholder="Enter age" required name="age" >
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" placeholder="Enter phone number" required name="phone">
        </div>

        <div class="form-group">
            <label>Subject</label>
            <input type="text" placeholder="Enter subject" required name="subject">
        </div>

        <div class="form-group">
            <label>Experience</label>
            <input type="text" placeholder="e.g. 5 years" required name="experience">
        </div>

        <button type="submit" class="btn submit-btn">Add Teacher</button>
        <button type="button" class="btn back-btn" onclick="history.back()">Back</button>
    </form>
</div>

</body>
</html>