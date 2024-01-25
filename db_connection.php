<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave it blank if no password is set
$dbname = "bqzer_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
