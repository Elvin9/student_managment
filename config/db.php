<?php
$host= "localhost";
$dbname = "members_db";
$username = "root";
$passwords = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $passwords);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Xatolik: ". $e->getMessage());
}