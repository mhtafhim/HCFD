<?php


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
    $memberID = $_POST['memberID'];
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
    $depertment = $_POST['depertment'];
    $guardianName = $_POST['guardianName'];
    $guardianPhone = $_POST['guardianPhone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

  
            // Prepare and execute the SQL statement


            $sql = "UPDATE MEMBER SET memberName = ?, memberPhone = ?, bloodGroup = ?, fathersName = ?, mothersName = ?, permanentAddress = ?, presentAddress = ?, institute = ?, class = ?, depertment = ?, guardianName = ?, guardianPhone = ?, email = ?, gender = ?, date_of_birth = ? WHERE memberID = ?";
    
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(1, $memberName);
            $stmt->bindParam(2, $memberPhone);
            $stmt->bindParam(3, $bloodGroup);
            $stmt->bindParam(4, $fathersName);
            $stmt->bindParam(5, $mothersName);
            $stmt->bindParam(6, $permanentAddress);
            $stmt->bindParam(7, $presentAddress);
            $stmt->bindParam(8, $institute);
            $stmt->bindParam(9, $class);
            $stmt->bindParam(10, $depertment);
            $stmt->bindParam(11, $guardianName);
            $stmt->bindParam(12, $guardianPhone);
            $stmt->bindParam(13, $email);
            $stmt->bindParam(14, $gender);
            $stmt->bindParam(15, $dob);
            $stmt->bindParam(16, $memberID);
            
            if ($stmt->execute()) {
                echo "Update successful.";
                header("Location: ./admin-dashboard.php?action=show_member");
            } else {
                echo "Update failed.";
            }
      
            
          
      
    
}

// Close the database connection
$conn = null;
?>

