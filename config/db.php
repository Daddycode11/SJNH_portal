<?php
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = ""; // Default is empty
$dbname = "students_portal"; // Change to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
