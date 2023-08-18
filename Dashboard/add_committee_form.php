<!DOCTYPE html>
<html>
<head>
    <title>Add New Committee Member</title>
    <link rel="stylesheet" type="text/css" href="add-member_styles.css">
</head>
<body>
    <div class="admin-container">
        <h2>Add New Committee Member</h2>
        <form action="add_committee.php" method="POST" enctype="multipart/form-data">
            <label for="memberID">Member ID:</label>
            <input type="text" id="memberID" name="memberID" required>
            
            <label for="designation">Designation:</label>
            <select id="designation" name="designation" required>
                <?php
                // Fetch designation options from database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "hcfd_database";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $designationQuery = "SELECT id, designation FROM designation";
                $result = $conn->query($designationQuery);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $des = $row['id'] . "'>" . $row['designation'];
                        echo "<option value='" . $des . "</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
            
            <label for="SESSION">Session:</label>
            <select id="SESSION" name="SESSION" required>
                <?php
                $currentYear = date("Y");
                for ($year = 2000; $year <= $currentYear + 3; $year++) {
                    echo "<option value='$year'>$year</option>";
                }
                ?>
            </select>
            
            <label for="fromDate">From Date:</label>
            <input type="date" id="fromDate" name="fromDate" >
            
            <label for="toDate">To Date:</label>
            <input type="date" id="toDate" name="toDate" >
            
            <button type="submit">Add Member</button>
        </form>
    </div>
</body>
</html>
