<!DOCTYPE html>
<html>

<head>
    <title>Members List</title>
    <link rel="stylesheet" type="text/css" href="memberview_Styles.css">
    <link rel="stylesheet" type="text/css" href="styles.css">

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

    <!--  end of header --->


    <div class="container">

        <div class="search-section">


            <form method="GET" action="memberview.php">
                <input type="text" id="search-field" name="term" placeholder="Search">
                <select id="search-option" name="type">
                    <option value="memberName">Name</option>
                    <option value="bloodGroup">Blood Group</option>
                </select>
                <button type="submit" id="search-button">Search</button>
            </form>
        </div>


        <!-- Member Request button aligned to the right -->
        <div class="member-request-button-container">
            <a href="./member_request.php" class="member-request-button">Member Request</a>
        </div>


        <h1>Members List</h1>

        <div class="members-list">
            <?php 
            require_once 'config/db.php';

            $limit = 6;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $term = isset($_GET['term']) ? $_GET['term'] : '';
            $type = isset($_GET['type']) ? $_GET['type'] : '';

            $query = "SELECT * FROM MEMBER";

            // Prepare the query based on search type
            if (!empty($term) && !empty($type)) {
                $query .= " WHERE $type LIKE '%$term%'";
            }

            $query .= " ORDER BY memberName LIMIT $limit OFFSET $offset";

            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) :
            ?>
            <div class="member-card">
                <img class="member-photo" src="member_photo/<?php echo $row['email'] ?>.jpg" alt="Member Photo">
                <div class="member-info">
                    <span class="member-id"><?php echo "MEMBER ID: " . $row['memberID']; ?></span><br>
                    <span class="member-name"><?php echo $row['memberName']; ?></span><br><br>

                    <span class="blood-group"><?php echo "Blood Group: " . $row['bloodGroup']; ?></span><br>
                    <span class="institute"><?php echo $row['institute']; ?></span><br>
                    <span class="phone-number"><?php echo "Phone: " .$row['memberPhone']; ?></span>

                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            $query = "SELECT COUNT(*) as total FROM MEMBER";
            $countResult = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($countResult);
            $totalMembers = $row['total'];
            $totalPages = ceil($totalMembers / $limit);

            if ($page > 1) :
            ?>
            <a href="?page=<?php echo ($page - 1); ?>&term=<?php echo $term; ?>&type=<?php echo $type; ?>">Previous</a>
            <?php endif;

            for ($i = 1; $i <= $totalPages; $i++) :
            ?>
            <a href="?page=<?php echo $i; ?>&term=<?php echo $term; ?>&type=<?php echo $type; ?>"
                <?php if ($page == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor;

            if ($page < $totalPages) :
            ?>
            <a href="?page=<?php echo ($page + 1); ?>&term=<?php echo $term; ?>&type=<?php echo $type; ?>">Next</a>
            <?php endif; ?>
        </div>

    </div>
</body>

</html>