<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="events_styles.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Blog Post Card</title>
</head>

<body>

    <header>
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="./memberview.php">Member's List</a></li>
                </ul>
            </div>
            <div class="logo">
                <img src="HCFD_logo.png" alt="Logo">
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="./commitee.php">Commitee</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
            </div>
        </nav>
    </header>


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

        $sql = "SELECT * FROM events_posts"; // Assuming your table name is events_post
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
                        <a href="#" class="details-button">Details</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No blog posts available.";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>