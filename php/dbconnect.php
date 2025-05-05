<?php
$servername = "localhost"; // database server (usually localhost)
$username = "root";         // your database username
$password = "";             // your database password (empty if using XAMPP)
$dbname = "cricket";        // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
    