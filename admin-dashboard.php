<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard_styles.css">
    <link rel="stylesheet" type="text/css" href="add-member_styles.css">
    <link rel="stylesheet" href="member_req_style.css" />
    <link rel="stylesheet" href="admin_panel_styles.css">
</head>

<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="?action=add_member">Add Member</a></li>
            <li><a href="?action=show_member">Show Members List</a></li>
            <li><a href="?action=add_admin">Add Admin</a></li>
            <li><a href="?action=show_admin">Show Admins List</a></li>
            <li><a href="?action=add_committee">Add Committee</a></li>
            <li><a href="?action=show_committee">Show Committee List</a></li>
            <li><a href="?action=member_req">Member Request</a></li>
            <li><a href="?action=add_event">Add New Event</a></li>
            <li><a href="?action=show_event">Show Events List</a></li>
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

            <div class="admin-container">
                <h3 class="section-title">Add Member</h3>
                <form action="dash_add_member.php" method="post" enctype="multipart/form-data">
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
                        <select id="bloodGroup" name="bloodGroup" required class="btn-secondary">
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <!-- Add more options... -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required class="btn-secondary">
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
                        <input type="file" id="photo" name="photo" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <button type="submit">Add Member</button>
                    </div>
                </form>
            </div>

        </div>
        <?php
            } elseif ($action === 'add_admin') {
        ?>
        <div class="form-section">

            <div class="admin-container">
                <h3 class="section-title">Add Admin</h3>

                <form action="admin-signup.php" method="post">
                    <h2>Hatiya Chatro Forum Sign Up</h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="member_id">Member ID</label>
                        <input type="text" id="member_id" name="member_id" required>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
                <!-- Admin related form fields -->
                <!-- <button type="submit">Add Admin</button> -->
            </div>
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
            } 

        elseif ($action === 'show_member') {
            ?>
        <div class="form-section">
             
                 <table>
                 <tr>
                     <th>Member ID</th>
                     <th>Member Name</th>
                     <th>Member Phone</th>
                     <th>Blood Group</th>
                  
                     <th>Email</th>
                     <th>Date of Birth</th>
                     <th>Gender</th>
                     <th>Actions</th>
                 </tr>
         
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
         
                 $sql = "SELECT `memberID`, `memberName`, `memberPhone`, `bloodGroup`, `permanentAddress`, `presentAddress`, `institute`, `email`, `date_of_birth`, `gender` FROM `member` WHERE 1";
                 $result = mysqli_query($conn, $sql);
         
                 while ($row = mysqli_fetch_assoc($result)) {
                     echo "<tr>";
                     echo "<td>{$row['memberID']}</td>";
                     echo "<td>{$row['memberName']}</td>";
                     echo "<td>{$row['memberPhone']}</td>";
                     echo "<td>{$row['bloodGroup']}</td>";
                    
                     echo "<td>{$row['email']}</td>";
                     echo "<td>{$row['date_of_birth']}</td>";
                     echo "<td>{$row['gender']}</td>";
                     echo "<td>
                     <form action='edit.php' method='post'>
                         <input type='hidden' name='id' value='{$row['memberID']}' />
                         <button class='edit-button' type='submit'>Edit</button>
                     </form>
                     <form action='delete.php' method='post'>
                         <input type='hidden' name='id' value='{$row['memberID']}' />
                         <button class='delete-button' type='submit'>Delete</button>
                     </form>
                   </td>";
                     echo "</tr>";
                 }
         
                 mysqli_close($conn);
                 ?>
             </table>




        </div>
        <?php
                } 


         elseif ($action === 'show_admin') {
                          ?>
        <div class="form-section">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Member ID</th>
                    <th>Actions</th>
                </tr>

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
             
                     $sql = "SELECT `id`, `username`, `full_name`, `email`, `phone`, `member_id` FROM `admins`";
                     $result = mysqli_query($conn, $sql);
             
                     while ($row = mysqli_fetch_assoc($result)) {
                         echo "<tr>";
                         echo "<td>{$row['id']}</td>";
                         echo "<td>{$row['username']}</td>";
                         echo "<td>{$row['full_name']}</td>";
                         echo "<td>{$row['email']}</td>";
                         echo "<td>{$row['phone']}</td>";
                         echo "<td>{$row['member_id']}</td>";
                         echo "<td>
                                 <form action='edit.php' method='post'>
                                     <input type='hidden' name='id' value='{$row['id']}' />
                                     <button class='edit-button' type='submit'>Edit</button>
                                 </form>
                                 <form action='delete.php' method='post'>
                                     <input type='hidden' name='id' value='{$row['id']}' />
                                     <button class='delete-button' type='submit'>Delete</button>
                                 </form>
                               </td>";
                         echo "</tr>";
                     }
             
                     mysqli_close($conn);
                     ?>
            </table>



        </div>
        <?php
                              } 
             
        elseif ($action === 'show_event') {
           ?>
        <div class="form-section">
            <h3>Add Committee</h3>
            <form action="add_committee.php" method="post">
                <!-- Committee related form fields -->
                <button type="submit">Add Committee</button>
            </form>
        </div>
        <?php
               } 

       elseif ($action === 'show_committee') {
           ?>
        <div class="form-section">
            <h3>Add Committee</h3>
            <form action="add_committee.php" method="post">
                <!-- Committee related form fields -->
                <button type="submit">Add Committee</button>
            </form>
        </div>
        <?php
               } 

            
            
            elseif ($action === 'add_event') {
                ?>
        <div class="form-section">
            <div class="admin-container">
                <h2>Add New Event</h2>
                <form action="insert_event.php" method="POST" enctype="multipart/form-data">
                    <label for="title">Event Title:</label>
                    <input type="text" id="title" name="title" required>

                    <label for="description">Event Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>


                    <label for="cover_image">Cover Image:</label>
                    <input type="file" id="cover_image" name="cover_image" accept="image/*" required>

                    <button type="submit">Add Event</button>
                </form>
            </div>
        </div>
        <?php
                    } 
                    
                    elseif ($action === 'member_req') {
                ?>
        <div class="form-section">

            <form action="member_accept_decline.php" method="post">
                <div class="container">



                    <h1>Members Requests</h1>

                    <div class="members-list">
                        <?php 
    require_once 'config/db.php';

    $limit = 6;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $term = isset($_GET['term']) ? $_GET['term'] : '';
    $type = isset($_GET['type']) ? $_GET['type'] : '';

    $query = "SELECT * FROM MEMBER_REQ";

    // Prepare the query based on search type
    if (!empty($term) && !empty($type)) {
        $query .= " WHERE $type LIKE '%$term%'";
    }

    $query .= " ORDER BY memberName LIMIT $limit OFFSET $offset";

    $result = mysqli_query($con, $query);

   
    // Assume you have fetched the $result from your database query
    while ($row = mysqli_fetch_assoc($result)) :
    ?>
                        <div class="member-card">
                            <img class="member-photo" src="member_photo/<?php echo $row['email'] ?>.jpg"
                                alt="Member Photo">
                            <div class="member-info">
                                <span
                                    class="member-id"><?php echo "MEMBER REQ ID: " . $row['memberReqID']; ?></span><br>
                                <span class="member-name"><?php echo $row['memberName']; ?></span><br><br>

                                <span class="blood-group"><?php echo "Blood Group: " . $row['bloodGroup']; ?></span><br>
                                <span class="institute"><?php echo $row['institute']; ?></span><br>
                                <span class="phone-number"><?php echo "Phone: " .$row['memberPhone']; ?></span>
                                <div class="buttons-container">
                                    <form action="member_accept_decline.php" method="post">
                                        <input type="hidden" name="memberReqID"
                                            value="<?php echo $row['memberReqID']; ?>">
                                        <input type="hidden" name="action" value="accept">
                                        <button class="accept-button" type="submit">Accept</button>
                                    </form>

                                    <form action="member_accept_decline.php" method="post">
                                        <input type="hidden" name="memberReqID"
                                            value="<?php echo $row['memberReqID']; ?>">
                                        <input type="hidden" name="action" value="decline">
                                        <button class="decline-button" type="submit">Decline</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>


                        <div class="pagination">
                            <?php
    $query = "SELECT COUNT(*) as total FROM MEMBER_REQ";
    $countResult = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($countResult);
    $totalMembers = $row['total'];
    $totalPages = ceil($totalMembers / $limit);

    if ($page > 1) :
    ?>
                            <a
                                href="?page=<?php echo ($page - 1); ?>&term=<?php echo $term; ?>&type=<?php echo $type; ?>">Previous</a>
                            <?php endif;

    for ($i = 1; $i <= $totalPages; $i++) :
    ?>
                            <a href="?page=<?php echo $i; ?>&term=<?php echo $term; ?>&type=<?php echo $type; ?>"
                                <?php if ($page == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
                            <?php endfor;

    if ($page < $totalPages) :
    ?>
                            <a
                                href="?page=<?php echo ($page + 1); ?>&term=<?php echo $term; ?>&type=<?php echo $type; ?>">Next</a>
                            <?php endif; ?>
                        </div>

                    </div>
                    <!-- Admin related form fields -->
                    <!-- <button type="submit">Accept</button> -->
            </form>
        </div>
        <?php
          }  else {
                echo '<p>Select an option from the sidebar to continue.</p>';
            }
        } else {
            echo '<p>Select an option from the sidebar to continue.</p>';
        }
        ?>
    </div>
</body>

</html>