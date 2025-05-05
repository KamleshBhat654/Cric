<?php
include 'dbconnect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and escape input
    $name     = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $email    = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    // Check for empty fields
    if (empty($name) || empty($email) || empty($password)) {
        echo "<script>alert('Please fill in all fields.'); window.location.href = '../frontend/register.html';</script>";
        exit();
    }

    // Check if email already exists
    $email_check = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($email_check);

    if (!$result) {
        // Debug: Query error
        echo "<script>alert('Query failed: " . $conn->error . "'); window.location.href = '../frontend/register.html';</script>";
        exit();
    }

    if ($result->num_rows > 0) {
        // Email exists
        echo "<script>alert('This email is already registered. Please use a different email.'); window.location.href = '../frontend/register.html';</script>";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $sql = "INSERT INTO register (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful. Please login.'); window.location.href = '../frontend/login.html';</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = '../frontend/register.html';</script>";
        exit();
    }
}
