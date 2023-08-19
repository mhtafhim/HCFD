<!DOCTYPE html>
<html>
<head>
    <title>Events Posts</title>
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
            <th>Post ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Description</th>
            <th>Publish Date</th>
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

        $sql = "SELECT * FROM `events_posts`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $description = $row['description'];
            $words = explode(' ', $description);
            $truncated_description = implode(' ', array_slice($words, 0, 40));

            echo "<tr>";
            echo "<td>{$row['post_id']}</td>";
            echo "<td>{$row['author']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$truncated_description}</td>";
            echo "<td>{$row['publish_date']}</td>";
            echo "<td>
                    <form action='edit_event.php' method='post'>
                        <input type='hidden' name='post_id' value='{$row['post_id']}' />
                        <button class='edit-button' type='submit'>Edit</button>
                    </form>
                    <form action='delete_member.php' method='post'>
                        <input type='hidden' name='id' value='{$row['post_id']}' />
                        <input type='hidden' name='id_type' value='post_id' />
                        <input type='hidden' name='option' value='show_event' />
                        <input type='hidden' name='anotherValue' value='events_posts' />
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
