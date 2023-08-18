<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_panel_styles.css">
    <title>Document</title>
</head>
<body>

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

                 $limit = 6;
                 $page = isset($_GET['page']) ? $_GET['page'] : 1;
                 $offset = ($page - 1) * $limit;
     
               
     
                 $query = "SELECT * FROM MEMBER";
     
               
     
                 $query .= " ORDER BY memberName LIMIT $limit OFFSET $offset";
     



         
                 $sql = "SELECT `memberID`, `memberName`, `memberPhone`, `bloodGroup`, `permanentAddress`, `presentAddress`, `institute`, `email`, `date_of_birth`, `gender` FROM `member` WHERE 1";
                 $result = mysqli_query($conn, $query);
         
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
                     <form action='?action=edit_member' method='post'>
                         <input type='hidden' name='id' value='{$row['memberID']}' />
                         <button class='edit-button' type='submit'>Edit</button>
                     </form>
                     <form action='delete_member.php' method='post'>
                         <input type='hidden' name='id' value='{$row['memberID']}' />
                         <button class='delete-button' type='submit'>Delete</button>
                     </form>
                   </td>";
                     echo "</tr>";
                 }
         
              //   mysqli_close($conn);
                 ?>
            </table>


            <div class="pagination">
            <?php
            $query = "SELECT COUNT(*) as total FROM MEMBER";
            $countResult = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($countResult);
            $totalMembers = $row['total'];
            $totalPages = ceil($totalMembers / $limit);

            if ($page > 1) :
            ?>
            <a href="./admin-dashboard.php?action=show_member&page=<?php echo ($page - 1); ?>">Previous</a>
            <?php endif;

            for ($i = 1; $i <= $totalPages; $i++) :
            ?>
            <a href="./admin-dashboard.php?action=show_member&page=<?php echo $i; ?>"
                <?php if ($page == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor;

            if ($page < $totalPages) :
            ?>
            <a href="./admin-dashboard.php?action=show_member&page=<?php echo ($page + 1); ?>">Next</a>
            <?php endif; ?>
        </div>

    
</body>
</html>