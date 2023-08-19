<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard_styles.css">
    <link rel="stylesheet" type="text/css" href="add-member_styles.css">
    <link rel="stylesheet" href="member_req_style.css" />
    <link rel="stylesheet" href="admin_panel_styles.css">
</head>

<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="?action=add_member">Add Member</a></li>
            <li><a href="?action=show_member">Show Members List</a></li>
            <li><a href="?action=add_admin">Add Admin</a></li>
            <li><a href="?action=show_admin">Show Admins List</a></li>
            <li><a href="?action=add_committee">Add Committee</a></li>
            <li><a href="?action=show_committee">Show Committee List</a></li>
            <li><a href="?action=member_req">Member Request</a></li>
            <li><a href="?action=add_event">Add New Event</a></li>
            <li><a href="?action=show_event">Show Events List</a></li>
            <li><a href="?action=logout">Logout</a></li>
            <!-- Add more menu items as needed -->
        </ul>
    </div>
    <div class="content">
        <?php
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action === 'add_member') {
        ?>
        <div class="form-section">

            <?php
              // Include the design file
              include 'add_member.php';
         ?>


        </div>
        <?php
            } elseif ($action === 'add_admin') {
        ?>
        <div class="form-section">
            <?php
                    // Include the design file
                    include 'add-admin.php';
               ?>

        </div>
        <?php
            } elseif ($action === 'add_committee') {
        ?>
        <div class="form-section">

            <?php
                    // Include the design file
                    include 'add_committee_form.php';
               ?>

        </div>
        <?php
            } 

    elseif ($action === 'edit_member') {
                       include 'edit_member.php';
                    } 

    elseif ($action === 'show_member') {
            ?>
        <div class="form-section">

            <?php
              // Include the design file
              include 'show_member.php';
         ?>

        </div>
        <?php
                } 


    elseif ($action === 'show_admin') {
                          ?>
        <div class="form-section">

            <?php
              // Include the design file
              include 'admin_panel.php';
         ?>

        </div>
        <?php
                              } 
             
    elseif ($action === 'show_event') {
           ?>
        <div class="form-section">
            <?php
              // Include the design file
              include 'show_events_list.php';
         ?>

        </div>
        <?php
               } 

    elseif ($action === 'show_committee') {
           ?>
        <div class="form-section">
            <?php
                     // Include the design file
                     include 'show_committeeList.php';
                ?>
        </div>
        <?php
               } 

            
            
    elseif ($action === 'add_event') {

                        include 'event_insertion.php';

                    } 
                    
    elseif ($action === 'member_req') {
                ?>
        <div class="form-section">

            <?php
              // Include the design file
              include 'show_member_req.php';
         ?>
        </div>
        <?php
          }
    elseif ($action === 'logout') {
            ?>
        <div class="form-section">

                  <?php
                       // Include the design file
                       header("Location: admin-login.html"); 
                  ?>
        </div>
        <?php
                   }
       
          else {
                include 'welcome.php';
            }
        } else {
            include 'welcome.php';
        }
        ?>
    </div>
</body>

</html>