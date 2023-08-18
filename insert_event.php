<?php
// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hcfd_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$title = $_POST['title'];
$description = $_POST['description'];
//$publish_date = $_POST['publish_date'];

// Prepare and execute the SQL query
$sql = "INSERT INTO events_posts (title, description, publish_date) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $description);
$stmt->execute();

// Get the last inserted post_id
$post_id = $stmt->insert_id;

$stmt->close();
$conn->close();

// Handle uploaded cover image
if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "./blog_image/";
    $target_file = $target_dir . $post_id . "." . pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION);
    
    move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file);
}

// Redirect to admin panel or confirmation page
header("Location: ./admin-dashboard.php?action=add_event");
exit();
?>
