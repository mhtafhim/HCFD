<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-member_styles.css">
    <title>Document</title>
</head>

<body>

    <?php
               // Replace with your database connection details
               $host = 'localhost';
               $user = 'root';
               $password = '';
               $database = 'hcfd_database';
               
               $conn = mysqli_connect($host, $user, $password, $database);
               
               if (!$conn) {
                   die("Connection failed: " . mysqli_connect_error());
               }
               
               if(isset($_POST['id'])) {
                   $edit_member_id = $_POST['id'];
               
                   $sql = "SELECT `memberID`, `memberName`, `memberPhone`, `bloodGroup`, `fathersName`, `mothersName`, `permanentAddress`, `presentAddress`, `institute`, `class`, `depertment`, `guardianName`, `guardianPhone`, `email`, `date_of_birth`, `gender` FROM `member` WHERE `memberID` = '$edit_member_id'";
                   $result = mysqli_query($conn, $sql);
               
                   if(mysqli_num_rows($result) == 1) {
                       $row = mysqli_fetch_assoc($result);
               
                       $memberName = $row['memberName'];
                       $memberPhone = $row['memberPhone'];
                       $bloodGroup = $row['bloodGroup'];
                       $dob = $row['date_of_birth'];
                       $gender = $row['gender'];
                       $fathersName = $row['fathersName'];
                       $mothersName = $row['mothersName'];
                       $permanentAddress = $row['permanentAddress'];
                       $presentAddress = $row['presentAddress'];
                       $institute = $row['institute'];
                       $class = $row['class'];
                       $depertment = $row['depertment'];
                       $guardianName = $row['guardianName'];
                       $guardianPhone = $row['guardianPhone'];
                       $email = $row['email'];
                   }
               }
               
               mysqli_close($conn);
               ?>

    <div class="admin-container">
        <h3 class="section-title">Edit Member</h3>
        <form action="./dashboard/dash_update_member.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="memberID" name = "memberID">MemberID :</label>
                <input type="text" id="memberID" name="memberID" required maxlength="50"
                    value="<?php echo $edit_member_id; ?>" readonly>
            </div>

          

            <div class="form-group">
                <label for="memberName">Member Name</label>
                <input type="text" id="memberName" name="memberName" required maxlength="50"
                    value="<?php echo $memberName; ?>">
            </div>

            <div class="form-group">
                <label for="memberPhone">Member Phone</label>
                <input type="text" id="memberPhone" name="memberPhone" required maxlength="15"
                    value="<?php echo $memberPhone; ?>">
            </div>

            <div class="form-group">
                <label for="bloodGroup">Blood Group</label>
                <!-- Populate the selected option based on the value from the database -->
                <select id="bloodGroup" name="bloodGroup" required class="btn-secondary">
                    <option value="" disabled>Select Blood Group</option>
                    <option value="A+" <?php if($bloodGroup == 'A+') echo 'selected'; ?>>A+</option>
                    <option value="A-" <?php if($bloodGroup == 'A-') echo 'selected'; ?>>A-</option>
                    <option value="B+" <?php if($bloodGroup == 'B+') echo 'selected'; ?>>B+</option>
                    <option value="B-" <?php if($bloodGroup == 'B-') echo 'selected'; ?>>B-</option>
                    <option value="AB+" <?php if($bloodGroup == 'AB+') echo 'selected'; ?>>AB+</option>
                    <option value="AB-" <?php if($bloodGroup == 'AB-') echo 'selected'; ?>>AB-</option>
                    <option value="O+" <?php if($bloodGroup == 'O+') echo 'selected'; ?>>O+</option>
                    <option value="O-" <?php if($bloodGroup == 'O-') echo 'selected'; ?>>O-</option>
                    <!-- Add more options if needed... -->
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required value="<?php echo $dob; ?>">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required class="btn-secondary">
                    <option value="" disabled>Select Gender</option>
                    <option value="Male" <?php if($gender == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if($gender == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if($gender == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fathersName">Father's Name</label>
                <input type="text" id="fathersName" name="fathersName" required maxlength="50"
                    value="<?php echo $fathersName; ?>">
            </div>

            <div class="form-group">
                <label for="mothersName">Mother's Name</label>
                <input type="text" id="mothersName" name="mothersName" required maxlength="50"
                    value="<?php echo $mothersName; ?>">
            </div>

            <div class="form-group">
                <label for="permanentAddress">Permanent Address</label>
                <input type="text" id="permanentAddress" name="permanentAddress" required maxlength="70"
                    value="<?php echo $permanentAddress; ?>">
            </div>

            <div class="form-group">
                <label for="presentAddress">Present Address</label>
                <input type="text" id="presentAddress" name="presentAddress" required maxlength="70"
                    value="<?php echo $presentAddress; ?>">
            </div>

            <div class="form-group">
                <label for="institute">Institute</label>
                <input type="text" id="institute" name="institute" maxlength="50" value="<?php echo $institute; ?>">
            </div>

            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" id="class" name="class" maxlength="30" value="<?php echo $class; ?>">
            </div>

            <div class="form-group">
                <label for="depertment">Department</label>
                <input type="text" id="depertment" name="depertment" maxlength="30" value="<?php echo $depertment; ?>">
            </div>

            <div class="form-group">
                <label for="guardianName">Guardian's Name</label>
                <input type="text" id="guardianName" name="guardianName" maxlength="50"
                    value="<?php echo $guardianName; ?>">
            </div>

            <div class="form-group">
                <label for="guardianPhone">Guardian's Phone</label>
                <input type="text" id="guardianPhone" name="guardianPhone" maxlength="20"
                    value="<?php echo $guardianPhone; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required maxlength="50" value="<?php echo $email; ?>">
            </div>

            

            <div class="form-group">
                <button type="submit">Update Member</button>
            </div>
        </form>
    </div>



</body>

</html>