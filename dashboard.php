<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
        }

        /* Navbar */
        .navbar {
            background: #343a40;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h2 {
            font-size: 20px;
        }

        .menu-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
            padding: 6px 10px;
            border-radius: 5px;
        }

        .menu-links a:hover {
            background: #495057;
        }

        .logout {
            background: #dc3545;
        }

        .logout:hover {
            background: #c82333;
        }

        /* Content */
        .container {
            padding: 40px;
            text-align: center;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 200px;
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            color: black;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .students {
            border-top: 5px solid #4facfe;
        }

        .teachers {
            border-top: 5px solid #28a745;
        }

        .classes {
            border-top: 5px solid #ffc107;
        }

        .books {
            border-top: 5px solid #6f42c1;
            /* purple color */
        }

        .orders {
            border-top: 5px solid #fd7e14;
            /* orange */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <h2>School Dashboard</h2>

        <div class="menu-links">

            <a href="auth/logout.php" class="logout">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Welcome, <?= $_SESSION['username']; ?>!</h1>

        <div class="cards">
            <a href="students/index.php" class="card students">
                <h3>Students</h3>
                <p>Manage student data</p>
            </a>

            <a href="teachers/index.php" class="card teachers">
                <h3>Teachers</h3>
                <p>Manage teachers</p>
            </a>

            <a href="classes/index.php" class="card classes">
                <h3>Classes</h3>
                <p>Manage classes</p>
            </a>

            <a href="books/index.php" class="card books">
                <h3>Books</h3>
                <p>Manage library books</p>
            </a>
            <a href="orders/index.php" class="card orders">
                <h3>Orders</h3>
                <p>Manage orders</p>
            </a>
        </div>
    </div>

</body>

</html>