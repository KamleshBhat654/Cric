<?php
include '../php/dbconnect.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert into database
    $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "
        <html>
        <head>
            <title>Thank You</title>
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background-color: #f7f9fc;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    text-align: center;
                    color: #333;
                }
                .box {
                    background: white;
                    padding: 40px;
                    border-radius: 12px;
                    box-shadow: 0 0 15px rgba(0,0,0,0.1);
                }
                a {
                    text-decoration: none;
                    color: #4dba8b;
                    font-weight: bold;
                    display: block;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='box'>
                <h1>Thank you for your feedback!</h1>
                <p>We appreciate your message, <strong>$name</strong>. We will get back to you soon.</p>
                <a href='../frontend/index.html'>&larr; Go Back</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header("Location: ../html/contact.html");
    exit();
}
?>
