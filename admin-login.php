<?php
// Replace the following values with your MySQL server credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "hcfd_database";

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

    // Perform SQL query to retrieve the user's hashed password from the database
    $get_user_sql = "SELECT password FROM admins WHERE username = ?";
    $stmt = $conn->prepare($get_user_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify the hashed password with the entered password
        if (password_verify($password, $hashed_password)) {
            // Login successful, redirect to dashboard or other pages
            // Replace "dashboard.php" with the page you want to redirect after successful login
            header("Location: ./dashboard/admin-dashboard.php");
            exit();
        } else {
            // Login failed, show an error message or redirect back to the login page with an error parameter
            // Replace "index.html" with the login page URL
            header("Location: admin-login.html?error=invalid_credentials");
            exit();
        }
    } else {
        // Login failed, show an error message or redirect back to the login page with an error parameter
        // Replace "index.html" with the login page URL
        header("Location: admin-login.html?error=invalid_credentials");
        exit();
    }
}

$conn->close();
?>
