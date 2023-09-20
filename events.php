<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="events_style.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Event Posts</title>
</head>

<body>

   <?php
        include 'header.php';
   ?>


    <div class="parent-container">
    <?php
        // Replace with your database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hcfd_database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        


        $sql = "SELECT * FROM events_posts"; // Assuming your table name is events_post
        
        $sql .= " ORDER BY post_id desc LIMIT $limit OFFSET $offset";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $post_id = $row['post_id'];
                $cover_image_url = "./blog_image/".$post_id.".jpg"; // Adjust the path as needed
             //   echo $cover_image_url;

             $description = $row['description'];
             $words = explode(' ', $description);
             $truncated_description = implode(' ', array_slice($words, 0, 60));
     
        ?>
                <div class="post-card">
                    <img class="post-cover" src="<?php echo $cover_image_url; ?>" alt="Blog Post Cover">
                    <div class="post-details">
                        <h2 class="post-title"><?php echo $row['title']; ?></h2>
                        <p class="post-description"><?php echo $truncated_description."..."; ?></p>
                        <p class="post-date">Published on <?php echo $row['publish_date']; ?></p>
                        <a href="./event_details.php?post_id=<?php echo $row['post_id']; ?>" class="details-button">Details</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No blog posts available.";
        }
        ?>

        <div class="pagination">
        <?php
        $query = "SELECT COUNT(*) as total FROM events_posts";
        $countResult = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($countResult);
        $totalMembers = $row['total'];
        $totalPages = ceil($totalMembers / $limit);

        if ($page > 1) :
        ?>
        <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
        <?php endif;

        for ($i = 1; $i <= $totalPages; $i++) :
        ?>
        <a href="?page=<?php echo $i; ?>"
            <?php if ($page == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor;

        if ($page < $totalPages) :
        ?>
        <a href="?page=<?php echo ($page + 1); ?>">Next</a>
        <?php endif; ?>
    </div>

    <?php

        $conn->close();
        ?>
    </div>
</body>

</html>