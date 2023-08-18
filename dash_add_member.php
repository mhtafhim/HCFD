<?php

require_once 'config/db.php';
// Assuming you have a MySQL database connection already established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hcfd_database";

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $memberName = strtoupper($_POST['memberName']);
    $memberPhone = $_POST['memberPhone'];
    $bloodGroup = strtoupper($_POST['bloodGroup']);
    $gender = $_POST['gender'];
    $fathersName = $_POST['fathersName'];
    $mothersName = $_POST['mothersName'];
    $permanentAddress = $_POST['permanentAddress'];
    $presentAddress = $_POST['presentAddress'];
    $institute = $_POST['institute'];
    $class = $_POST['class'];
    $department = $_POST['depertment'];
    $guardianName = $_POST['guardianName'];
    $guardianPhone = $_POST['guardianPhone'];
    $email = $_POST['email'];
    $dob = $_POST['dob_year'].'-'.$_POST['dob_month'].'-'.$_POST['dob_day'];

    /* Handle file upload
    $targetDirectory = "member_photo/";
    $targetFile = $targetDirectory . $email . "." . $extension;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    */

    // Handle file upload
    $targetDirectory = "member_photo/";
    $originalFileName = $_FILES["photoo"]["name"];
    $email = $_POST["email"];
    $uploadOk = 1;
    $extension =  strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
    $targetFile = $targetDirectory . $email . ".jpg" ; // Rename the file using the email

// ...


    // Check if the file is an actual image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photoo"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photoo"]["size"] > 5000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only specific file formats
    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($extension, $allowedExtensions)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // If file upload is successful, move the file and insert data into the database
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["photoo"]["tmp_name"], $targetFile)) {
            // Prepare and execute the SQL statement
            $stmt = $conn->prepare("INSERT INTO MEMBER (memberName, memberPhone, bloodGroup, fathersName, mothersName, permanentAddress, presentAddress, institute, class, depertment, guardianName, guardianPhone, email,gender,date_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
            $stmt->execute([$memberName, $memberPhone, $bloodGroup, $fathersName, $mothersName, $permanentAddress, $presentAddress, $institute, $class, $department, $guardianName, $guardianPhone, $email,$gender,$dob]);

            // Redirect to a success page or display a success message
            echo "<h2>Member added successfully!</h2>";
            header("Location: ./admin-dashboard.php?action=add_member");
          
        } else {
            echo "Sorry, there was an error uploading your file.";
            header("Location: ./admin-dashboard.php?action=add_member");
         
        }
    }
}

// Close the database connection
$conn = null;
?>

