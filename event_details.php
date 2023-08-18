<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blogposts.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>iBlog - Heaven for bloggers</title>
</head>

<body>



    <header>
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./events.php">Events</a></li>
                    <li><a href="./memberview.php">Member's List</a></li>
                </ul>
            </div>
            <div class="logo">
                <img src="HCFD_logo.png" alt="Logo" class="logo-img">
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
        
        // Check if a post_id is provided through POST
        if(isset($_GET['post_id'])) {
            $post_id = $_GET['post_id'];
        
            // Prepare and execute the SQL query to fetch the specific post
            $sql = "SELECT `post_id`, `title`, `description`, `publish_date`, `author` FROM `events_posts` WHERE `post_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        
                // Display the post details
             
                $title = $row['title'];
                $author = $row['author'];
                $date = $row['publish_date'];
                $description = $row['description'];

            } else {
                echo "Post not found.";
            }
        
            $stmt->close();
        } else {
            echo "No post_id provided.";
        }
        
        $conn->close();
        ?>


    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="post-img">
        <img src="./blog_image/<?php  echo $post_id; ?>.jpg" alt="" class="blog-img">
    </div>
    <div class="m-auto blog-post-content max-width-2 m-auto my-2">
        <h1 class="font1"><?php echo $title; ?></h1>
        <div class="blogpost-meta">
            <div class="author-info">
                <div>
                    <b>
                    <?php  echo $author; ?>
                    </b>
                </div>
                <div><?php  echo $date; ?></div>
            </div>

        </div>
        <p class="font1"><?php  echo $description; ?></p>

    </div>


</body>

</html>