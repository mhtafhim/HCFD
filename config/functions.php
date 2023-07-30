<?php 

  require_once 'db.php';

  function dispaly_member_data(){
    global $con;
    $query = "select * from MEMBER order by memberName";
    $result = mysqli_query($con,$query);
    return $result;
  }

  function dispaly_committee_data($session){
    global $con;
    $query = "select * from committee join member on member.memberID = committee.memberID where SESSION = $session order by committee.ranks";
    $result = mysqli_query($con,$query);
    return $result;
  }



?>