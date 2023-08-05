<?php
// Replace the following values with your MySQL server credentials
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Establishing a connection to MySQL server
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform SQL query to validate user credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful, redirect to dashboard or other pages
        // Replace "dashboard.php" with the page you want to redirect after successful login
        header("Location: dashboard.php");
        exit();
    } else {
        // Login failed, show an error message or redirect back to the login page with an error parameter
        // Replace "index.html" with the login page URL
        header("Location: index.html?error=1");
        exit();
    }
}

$conn->close();
?>
