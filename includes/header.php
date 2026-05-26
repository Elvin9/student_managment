<!-- includes/navbar.php -->

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

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

    /* NAVBAR */
    .navbar {
        width: 100%;
        background: white;
        padding: 18px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        color: #343a40;
    }

    /* MENU */
    .menu-links {
        display: flex;
        gap: 15px; /* distance between buttons */
        align-items: center;
        flex-wrap: wrap;
    }

    .menu-links a {
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 12px;
        color: white;
        font-size: 14px;
        font-weight: bold;
        transition: 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .menu-links a:hover {
        transform: translateY(-3px);
        opacity: 0.9;
    }

    /* BUTTON COLORS */
    .students-link {
        background: linear-gradient(135deg, #4facfe, #00c6fb);
    }

    .teachers-link {
        background: linear-gradient(135deg, #43e97b, #38f9d7);
    }

    .classes-link {
        background: linear-gradient(135deg, #f6d365, #fda085);
    }

    .books-link {
        background: linear-gradient(135deg, #a18cd1, #fbc2eb);
    }

    .orders-link {
        background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    }

    .logout-link {
        background: linear-gradient(135deg, #ff5858, #f857a6);
    }

    /* PAGE CONTENT */
    .page-content {
        padding: 30px;
    }
</style>

<div class="navbar">

    <div class="logo">
        School Library
    </div>

    <div class="menu-links">

        <a href="/students/index.php" class="students-link">
            Students
        </a>

        <a href="/teachers/index.php" class="teachers-link">
            Teachers
        </a>

        <a href="/classes/index.php" class="classes-link">
            Classes
        </a>

        <a href="/books/index.php" class="books-link">
            Books
        </a>

        <a href="/orders/index.php" class="orders-link">
            Orders
        </a>

        <a href="/auth/logout.php" class="logout-link">
            Logout
        </a>

    </div>

</div>