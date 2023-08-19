<!DOCTYPE html>
<html>
<head>
    <title>Committee Members</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button, .delete-button {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 20%;
            margin: 5px;
        }

        .edit-button {
            background-color: green;
            color: white;
        }

        .delete-button {
            background-color: red;
            color: white;
        }

    </style>
</head>
<body>
    <table>
        <tr>
            <th>Committee Member ID</th>
            <th>Member ID</th>
            <th>Member Name</th>
            <!-- <th>Email</th> -->
            <th>Phone</th>
            <th>Designation</th>
            <th>Session</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Ranks</th>
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

        $session = "2023"; // Replace with the desired session

        $sql = "SELECT c.C_memID, m.memberName, m.email, m.memberPhone, c.designation, c.session, c.fromDate, c.toDate, c.ranks,m.memberID
                FROM committee c
                JOIN member m ON m.memberID = c.memberID
                -- WHERE c.SESSION = '$session'
                ORDER BY session,c.ranks";
                
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['C_memID']}</td>";
            echo "<td>{$row['memberID']}</td>";
            echo "<td>{$row['memberName']}</td>";
        //    echo "<td>{$row['email']}</td>";
            echo "<td>{$row['memberPhone']}</td>";
            echo "<td>{$row['designation']}</td>";
            echo "<td>{$row['session']}</td>";
            echo "<td>{$row['fromDate']}</td>";
            echo "<td>{$row['toDate']}</td>";
            echo "<td>{$row['ranks']}</td>";
            echo "<td>
            <form action='edit_committe.php' method='post'>
                <input type='hidden' name='id' value='{$row['memberID']}' />
                <button class='edit-button' type='submit'>Edit</button>
            </form>
            <form action='delete_member.php' method='post'>
                <input type='hidden' name='id' value='{$row['C_memID']}' />
                <input type='hidden' name='id_type' value='C_memID' />
                <input type='hidden' name='option' value='show_committee' />
                <input type='hidden' name='anotherValue' value='committee' />
                <button class='delete-button' type='submit'>Delete</button>
            </form>
          </td>";
            echo "</tr>";
        }

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
