<?php
include 'dbconnect.php'; // Connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM register WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Successful login
            header("Location: ../frontend/index.html");
            exit();
        } else {
            echo "<h2>Incorrect password. Please try again.</h2>";
        }
    } else {
        echo "<h2>Email not found. Please register first.</h2>";
    }
}
?>
