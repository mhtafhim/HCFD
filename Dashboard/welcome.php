<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .body-div {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .center-text {
            text-align: center;
            font-weight: bold;
        }

     
    </style>
</head>
<body>


       <?php
      


       // Replace the following values with your MySQL server credentials
    //    $servername = "localhost";
    //    $username = "root";
    //    $password = "";
    //    $database = "hcfd_database";
       
    //    // Establishing a connection to MySQL server
    //    $conn = new mysqli($servername, $username, $password, $database);
       
    //    // Check connection
    //    if ($conn->connect_error) {
    //        die("Connection failed: " . $conn->connect_error);
    //    }
       
    //    // Retrieving form data
    //    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //        $memid = $_GET['data'];
      
       
    //        // Perform SQL query to retrieve the user's hashed password from the database
    //        $get_user_sql = "SELECT memberName FROM member WHERE memberID = ?";
    //        $stmt = $conn->prepare($get_user_sql);
    //        $stmt->bind_param("s", $memid);
    //        $stmt->execute();
    //        $result = $stmt->get_result();
    //        $stmt->close();
       
    //        if ($result->num_rows === 1) {
    //            $row = $result->fetch_assoc();
         

               ?>
    <div class ="body-div">
    <div class="center-text">
        <p>Welcome to Hatiya Chatro Forum Admin Dashboard.</p>
        <!-- <p>You are logged in as <span id="username"><?php //echo $row['memberName'] ; ?></span>.</p><br><br><br><br> -->
        <p>Select an option from the sidebar to continue.</p>
    </div>
    </div>

    <?php

// }

// }
// $conn->close();
?>

</body>
</html>