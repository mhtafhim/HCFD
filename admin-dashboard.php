<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin-dashboard_style.css">
    <link rel="stylesheet" type="text/css" href="add_member_style.css">
</head>

<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="?action=add_member">Add Member</a></li>
            <li><a href="?action=add_admin">Add Admin</a></li>
            <li><a href="?action=add_committee">Add Committee</a></li>
            <!-- Add more menu items as needed -->
        </ul>
    </div>
    <div class="content">
        <?php
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action === 'add_member') {
        ?>
        <div class="form-section">
            <h3>Add Member</h3>
            <form action="add_member.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="memberName">Member Name</label>
                    <input type="text" id="memberName" name="memberName" required maxlength="50">
                </div>

                <div class="form-group">
                    <label for="memberPhone">Member Phone</label>
                    <input type="text" id="memberPhone" name="memberPhone" required maxlength="15">
                </div>

                <div class="form-group">
                    <label for="bloodGroup">Blood Group</label>
                    <select id="bloodGroup" name="bloodGroup" required>
                        <option value="" disabled selected>Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>


                <div class="dob-select">
                    <select name="dob_year" required>
                        <option value="" disabled selected>Year</option>
                        <?php
                        $currentYear = date('Y');
                        $startYear = $currentYear - 100;
                        for ($year = $currentYear; $year >= $startYear; $year--) {
                            echo '<option value="' . $year . '">' . $year . '</option>';
                        }
                        ?>
                    </select>
                    <select name="dob_month" required>
                        <option value="" disabled selected>Month</option>
                        <?php
                        $months = [
                            'January', 'February', 'March', 'April',
                            'May', 'June', 'July', 'August',
                            'September', 'October', 'November', 'December'
                        ];
                        foreach ($months as $index => $month) {
                            $monthValue = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                            echo '<option value="' . $monthValue . '">' . $month . '</option>';
                        }
                        ?>
                    </select>
                    <select name="dob_day" required>
                        <option value="" disabled selected>Day</option>
                        <?php
                        for ($day = 1; $day <= 31; $day++) {
                            echo '<option value="' . $day . '">' . $day . '</option>';
                        }
                        ?>
                    </select>
                </div>
               

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fathersName">Father's Name</label>
                    <input type="text" id="fathersName" name="fathersName" required maxlength="50">
                </div>

                <div class="form-group">
                    <label for="mothersName">Mother's Name</label>
                    <input type="text" id="mothersName" name="mothersName" required maxlength="50">
                </div>

                <div class="form-group">
                    <label for="permanentAddress">Permanent Address</label>
                    <input type="text" id="permanentAddress" name="permanentAddress" required maxlength="70">
                </div>

                <div class="form-group">
                    <label for="presentAddress">Present Address</label>
                    <input type="text" id="presentAddress" name="presentAddress" required maxlength="70">
                </div>

                <div class="form-group">
                    <label for="institute">Institute</label>
                    <input type="text" id="institute" name="institute" maxlength="50">
                </div>

                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" id="class" name="class" maxlength="30">
                </div>

                <div class="form-group">
                    <label for="depertment">Department</label>
                    <input type="text" id="depertment" name="depertment" maxlength="30">
                </div>

                <div class="form-group">
                    <label for="guardianName">Guardian's Name</label>
                    <input type="text" id="guardianName" name="guardianName" maxlength="50">
                </div>

                <div class="form-group">
                    <label for="guardianPhone">Guardian's Phone</label>
                    <input type="text" id="guardianPhone" name="guardianPhone" maxlength="20">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required maxlength="50">
                </div>

                <div class="form-group">
                    <label for="photo">Upload Photo</label>
                    <input type="file" id="photo" name="photoo" accept="image/*" required>
                </div>

                <div class="form-group">
                    <button type="submit">Add Member</button>
                </div>
            </form>
        </div>
        <?php
            } elseif ($action === 'add_admin') {
        ?>
        <div class="form-section">
            <h3>Add Admin</h3>
            <form action="add_admin.php" method="post">
                <!-- Admin related form fields -->
                <button type="submit">Add Admin</button>
            </form>
        </div>
        <?php
            } elseif ($action === 'add_committee') {
        ?>
        <div class="form-section">
            <h3>Add Committee</h3>
            <form action="add_committee.php" method="post">
                <!-- Committee related form fields -->
                <button type="submit">Add Committee</button>
            </form>
        </div>
        <?php
            } else {
                echo '<p>Select an option from the sidebar to continue.</p>';
            }
        } else {
            echo '<p>Select an option from the sidebar to continue.</p>';
        }
        ?>
    </div>
</body>

</html>