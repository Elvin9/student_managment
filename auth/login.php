<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            width: 320px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 25px;
        }

        .input-box {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-box label {
            font-size: 14px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        .input-box input:focus {
            border-color: #4facfe;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            border: none;
            background: #4facfe;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #00c6ff;
        }

        .extra {
            margin-top: 15px;
            font-size: 13px;
        }

        .extra a {
            color: #4facfe;
            text-decoration: none;
        }

        .extra a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
        <div class="input-box">
            <label>Username</label>
            <input name="username" type="text" placeholder="Enter username" required>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input name="password" type="password" placeholder="Enter password" required>
        </div>

        <button class="login-btn">Login</button>

        <div class="extra">
            <p><a href="#">Forgot password?</a></p>
        </div>
    </form>

    <?php
    if(isset($_GET['error'])){
        echo '<p style="color:red">Login or password is incorrect</p>';
    }
    ?>
</div>

</body>
</html>