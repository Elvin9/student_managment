<?php
session_start();

include '../config/db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$book_name = $_POST['book_name'];
$book_author = $_POST['book_author'];
$published_date = $_POST['published_date'];
$book_note = $_POST['book_note'];
$category = $_POST['category'];
$count = $_POST['category'];



$sql = "INSERT INTO books (book_name, book_author, published_date, book_note, category, count)
    VALUES(?, ?, ?, ?)";


$data = $conn->prepare($sql);

$data->execute([$book_name, $book_author, $published_date, $book_note, $category, $count]);
header("Location: index.php");
exit();