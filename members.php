<?php 


/*require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);
*/

require_once 'config/db.php';
require_once 'config/functions.php';

$result = dispaly_member_data();


?>


<!DOCTYPE html>
<html>

<head>
    <title>Navigation Bar with Logo</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="memberList.css">
    <!-- Load Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="http://localhost/hcfd/index.php">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Member's List</a></li>
                </ul>
            </div>
            <div class="logo">
                <img src="HCFD_logo.png" alt="Logo">
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Commitee</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!------------------- main segment --------------->


    <div class="container">


        <div class="search-section">
            <input type="text" id="search-field" placeholder="Search">
            <select id="search-option">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
            <button id="search-button">Search</button>
        </div>


        <h1>Members List</h1>
        <div class="members-list">
            <?php 
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="member-card">
                <img class="member-photo" src="<?php echo "member_photo/".$row['email'].".jpg" ?>" alt="Member Photo">
                <!-- <div class="member-name">John Doe  </div> -->
                <div class="member-info">
                    <span class="member-name"><?php echo $row['memberName']; ?></span>
                    <br><br>
                    <span class="blood-group"><?php echo "Blood Group : " .$row['bloodGroup']; ?></span>
                    <br>
                    <span class="institute"><?php echo $row['institute']; ?></span>
                    <br>
                    <span class="phone-number"><?php echo $row['memberPhone']; ?></span>
                </div>
            </div>

            <?php    
                }
            ?>


            <!-- Add more member cards here... -->
        </div>
    </div>

</body>

</html>