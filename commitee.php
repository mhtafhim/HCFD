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
    $currentDate = new DateTime();
    $type = $currentDate->format("Y");
    $result = display_committee_data($type);
}



?>


<!DOCTYPE html>
<html>

<head>
    <title>Committee List</title>
    
    <link rel="stylesheet" type="text/css" href="committee_styles.css">
    <!-- <link rel="stylesheet" type="text/css" href="memberviewStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Load Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>



  
<?php
        include 'header.php';
   ?>


    <!------------------- main segment --------------->
   
    <div class="container">


    <br><br>
    <h1 class="committee_heading">Committee</h1><br><br>

    <div class="search-section">
            <form method="GET" action="commitee.php">
                
                <select id="search-option" name="type" class = "select_btn">
                <?php 
                while($row = mysqli_fetch_assoc($sessionsList)){
                    $ses = $row['session'];
                 ?>
                   
                    <option value="<?php echo $ses; ?>"  <?php if($type == $ses) echo 'selected';else  ?>><?php echo $row['session']; ?></option>
                  

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
            <img src="<?php echo "member_photo/".$row['email'].".jpg" ?>" alt="<?php echo $row['designation']; ?>">
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