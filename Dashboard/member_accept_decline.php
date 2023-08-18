<?php
// Assuming you have established a database connection
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["memberReqID"]) && isset($_POST["action"])) {
        $memberReqID = $_POST["memberReqID"];
        $action = $_POST["action"];

        if ($action === "accept") {
            try {
                $conn->beginTransaction();

                // Fetch member request data from MEMBER_REQ
                $selectReqQuery = "SELECT * FROM MEMBER_REQ WHERE memberReqID = ?";
                $reqStmt = $conn->prepare($selectReqQuery);
                $reqStmt->execute([$memberReqID]);
                $memberReqData = $reqStmt->fetch(PDO::FETCH_ASSOC);

                // Insert data into MEMBER table
                $insertMemberQuery = "INSERT INTO MEMBER (memberName, memberPhone, bloodGroup, fathersName, mothersName, permanentAddress, presentAddress, institute, class, depertment, guardianName, guardianPhone, email, gender, date_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insertMemberQuery);
                $stmt->execute([$memberReqData['memberName'], $memberReqData['memberPhone'], $memberReqData['bloodGroup'], $memberReqData['fathersName'], $memberReqData['mothersName'], $memberReqData['permanentAddress'], $memberReqData['presentAddress'], $memberReqData['institute'], $memberReqData['class'], $memberReqData['depertment'], $memberReqData['guardianName'], $memberReqData['guardianPhone'], $memberReqData['email'], $memberReqData['gender'], $memberReqData['date_of_birth']]);

                // Delete data from MEMBER_REQ
                $deleteReqQuery = "DELETE FROM MEMBER_REQ WHERE memberReqID = ?";
                $deleteStmt = $conn->prepare($deleteReqQuery);
                $deleteStmt->execute([$memberReqID]);

                $conn->commit();

                // Redirect back to the page after processing
                header("Location: ./admin-dashboard.php?action=member_req");
                exit();
            } catch (PDOException $e) {
                $conn->rollBack();
                echo "Error: " . $e->getMessage();
            }
        } elseif ($action === "decline") {
            // Delete data from MEMBER_REQ
            $deleteReqQuery = "DELETE FROM MEMBER_REQ WHERE memberReqID = ?";
            $deleteStmt = $conn->prepare($deleteReqQuery);
            $deleteStmt->execute([$memberReqID]);

            // Redirect back to the page after processing
            header("Location: ./admin-dashboard.php?action=member_req");
            exit();
        }
    }
}
?>
