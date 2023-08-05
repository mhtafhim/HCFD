<?php 


/*require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);
*/

require_once 'config/db.php';
require_once 'config/functions.php';

$sessionsList = display_committee_session();

$type = isset($_GET['type']) ? $_GET['type'] : '';

if(!empty($type))
{
    $result = display_committee_data($type);
}
else
{
    $result = display_committee_data(2023);
}



?>


<!DOCTYPE html>
<html>

<head>
    <title>Navigation Bar with Logo</title>
    
    <link rel="stylesheet" type="text/css" href="committee.css">
    <!-- <link rel="stylesheet" type="text/css" href="memberviewStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Load Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


    <!------------------- main segment --------------->
   
    <div class="container">


    <br><br>
    <h1 class="committee_heading">Committee</h1><br><br>

    <div class="search-section">
            <form method="GET" action="commitee.php">
                
                <select id="search-option" name="type">
                <?php 
                while($row = mysqli_fetch_assoc($sessionsList)){
                 ?>

                    <option value="<?php echo $row['session']; ?>"><?php echo $row['session']; ?></option>

                <?php    
                       }
                ?>

                </select>
                <button type="submit" id="search-button">Go</button>
            </form>
        </div>






    <div class="team-container">

        <?php 
                while($row = mysqli_fetch_assoc($result)){
    ?>
        <div class="team-member ">
            <img src="<?php echo "member_photo/".$row['email'].".jpg" ?>" alt="President/CEO">
            <h3><?php echo $row['memberName']; ?></h3>
            <p><?php echo $row['designation']; ?></p>
            <p>Email: <?php echo $row['email']; ?></p>
            <p>Phone:<?php echo $row['memberPhone']; ?></p>
        </div>

        <?php    
                }
      ?>

    </div>

    </div>



</body>

</html>