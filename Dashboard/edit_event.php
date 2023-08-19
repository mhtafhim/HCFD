<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event_insertion_style.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="admin-container">
        <h2>Edit Event</h2>
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

        if(isset($_POST['post_id'])) {
            $id = $_POST['post_id'];

      

        $sql = "SELECT `post_id`, `title`, `description`, `publish_date`, `author` FROM `events_posts` WHERE post_id = $id";
        $result = mysqli_query($conn, $sql);
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $post_id = $row['post_id'];
                $title = $row['title'];
                $description = $row['description'];
                $publish_date = $row['publish_date'];
                $author = $row['author'];
        ?>
                <form action="update_event.php" method="POST">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

                    <label for="author_name">Author Name:</label>
                    <input type="text" id="author_name" name="author_name" value="<?php echo $author; ?>" required>

                    <label for="title">Event Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo $title; ?>" required>

                    <label for="description">Event Description:</label>
                    <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>

                    <label for="publish_date">Publish Date:</label>
                    <input type="date" id="publish_date" name="publish_date" value="<?php echo $publish_date; ?>" required>

                    <button type="submit">Update Event</button>
                </form>
        <?php
            }
        } else {
            echo "No events found.";
        }
        }
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>
