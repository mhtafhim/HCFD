<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="member_req_style.css" />
    <title>Document</title>
</head>

<body>
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
                    <img class="member-photo" src="http://localhost/hcfd/HCFD/member_photo/<?php echo $row['email'] ?>.jpg" alt="Member Photo">
                    <div class="member-info">
                        <span class="member-id"><?php echo "MEMBER REQ ID: " . $row['memberReqID']; ?></span><br>
                        <span class="member-name"><?php echo $row['memberName']; ?></span><br><br>

                        <span class="blood-group"><?php echo "Blood Group: " . $row['bloodGroup']; ?></span><br>
                        <span class="institute"><?php echo $row['institute']; ?></span><br>
                        <span class="phone-number"><?php echo "Phone: " .$row['memberPhone']; ?></span>
                        <div class="buttons-container">
                            <form action="member_accept_decline.php" method="post">
                                <input type="hidden" name="memberReqID" value="<?php echo $row['memberReqID']; ?>">
                                <input type="hidden" name="action" value="accept">
                                <button class="accept-button" type="submit">Accept</button>
                            </form>

                            <form action="member_accept_decline.php" method="post">
                                <input type="hidden" name="memberReqID" value="<?php echo $row['memberReqID']; ?>">
                                <input type="hidden" name="action" value="decline">
                                <button class="decline-button" type="submit">Decline</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>



            </div>
            <!-- Admin related form fields -->
            <!-- <button type="submit">Accept</button> -->
    </form>
</body>

</html>