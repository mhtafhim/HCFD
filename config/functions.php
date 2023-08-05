<?php 

  require_once 'db.php';

  function display_member_data(){
    global $con;
    $query = "select * from MEMBER order by memberName";
    $result = mysqli_query($con,$query);
    return $result;
  }

  function display_committee_data($session){
    global $con;
    $query = "select * from committee join member on member.memberID = committee.memberID where SESSION = $session order by committee.ranks";
    $result = mysqli_query($con,$query);
    return $result;
  }

  function display_committee_session(){
    global $con;
    $query = "select DISTINCT session from committee order by session";
    $result = mysqli_query($con,$query);
    return $result;
  }



?>