<!DOCTYPE html>
<html>
<head>
    <title>Admins Data</title>
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

        /* .edit-button, .delete-button:hover{
            background-color: white;
        } */
    </style>
</head>
<body>
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
                    <form action='./admin-dashboard.php' method='post'>
                        <input type='hidden' name='id' value='{$row['id']}' />
                        <button class='edit-button' type='submit'>Edit</button>
                    </form>
                    <form action='delete_member.php' method='post'>
                        <input type='hidden' name='id' value='{$row['id']}' />
                        <input type='hidden' name='id_type' value='id' />
                        <input type='hidden' name='option' value='show_admin' />
                        <input type='hidden' name='anotherValue' value='admins' />
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
