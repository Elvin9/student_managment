<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}


$id= $_POST['id'];
$book_name = $_POST['book_name'];
$book_author = $_POST['book_author'];
$published_date = $_POST['published_date'];
$book_note = $_POST['book_note'];
$category = $_POST['category'];
$count = $_POST['count'];

$sql = "UPDATE books
    SET book_name =?, book_author = ?, published_date = ?, book_note = ?, category = ?, count = ?
    WHERE id = ? ";
$data = $conn->prepare($sql);
$data->execute([$book_name, $book_author, $published_date, $book_note, $category, $count, $id]);

header("Location: index.php");
exit();

?>