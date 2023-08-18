<?php
// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hcfd_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberID = $_POST["memberID"];
    $designationID = $_POST["designation"];
    $SESSION = $_POST["SESSION"];
    $fromDate = $_POST["fromDate"];
    $toDate = $_POST["toDate"];

    // Fetch designation rank from the selected designation
    $designationRankQuery = "SELECT rank,designation FROM designation WHERE id = '$designationID'";
    $result = $conn->query($designationRankQuery);
    $row = $result->fetch_assoc();
    $designationRank = $row['rank'];
    $des = $row['designation'];

    // Inserting data into the committee table
    $committeeInsertQuery = "INSERT INTO committee (C_memID, memberID, designation, ranks, SESSION, fromDate, toDate) 
                            VALUES (NULL, '$memberID', '$des', '$designationRank', '$SESSION', '$fromDate', '$toDate')";

    if ($conn->query($committeeInsertQuery) === TRUE) {
        echo "Committee member added successfully!";
        header("Location: ./admin-dashboard.php?action=add_committee");
    } else {
        echo "Error: " . $committeeInsertQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>
