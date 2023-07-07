<?php 

  require_once 'db.php';

  function dispaly_member_data(){
    global $con;
    $query = "select * from MEMBER order by memberName";
    $result = mysqli_query($con,$query);
    return $result;
  }

?>