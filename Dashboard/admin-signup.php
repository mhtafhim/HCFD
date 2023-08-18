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
    $confirm_password = $_POST["confirm_password"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $member_id = $_POST["member_id"];

    // Validate if the passwords match
    if ($password !== $confirm_password) {
        // Passwords do not match, show an error message or redirect back to the signup page with an error parameter
        // Replace "signup.html" with the signup page URL
        header("Location: signup.html?error=1");
        exit();
    }

    // Perform SQL query to check if the username already exists
    $check_username_sql = "SELECT * FROM admins WHERE username = '$username'";
    $check_username_result = $conn->query($check_username_sql);

    if ($check_username_result->num_rows > 0) {
        // Username already exists, show an error message or redirect back to the signup page with an error parameter
        // Replace "signup.html" with the signup page URL
        header("Location: signup.html?error=2");
        exit();
    }

    // Hash the password before storing it in the database (using BCRYPT algorithm)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Perform SQL query to insert the new user into the database
    $insert_user_sql = "INSERT INTO admins (username, password, full_name, email, phone, member_id) 
                        VALUES ('$username', '$hashed_password', '$full_name', '$email', '$phone', '$member_id')";

    if ($conn->query($insert_user_sql) === TRUE) {
        // Registration successful, redirect to login page or other pages
        // Replace "index.html" with the login page URL
        header("Location: admin-login.html?registration=success");
        exit();
    } else {
        // Registration failed, show an error message or redirect back to the signup page with an error parameter
        // Replace "signup.html" with the signup page URL
        header("Location: admin-signup.html?error=3");
        exit();
    }
}

$conn->close();
?>
