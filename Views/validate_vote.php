<?php
session_start();



$msg_error = $msg = "";
require '../dbconfig.php';
require '../models/User.php';
$userModel = new User($conn);

$fetchData = $userModel->selectSome($_SESSION["userid"],$_GET["election_id"]);
$count = count($fetchData);
if($count > 0){  
  $msg_error = "You have already voted for ".$fetchData["vote"]." this election";
    header("location: ../election-details.php?election_id=".$_GET["election_id"]."&msg_error=$msg_error");    
  }
  else{
    
    $stmt = $userModel->insertVote($_GET["election_id"],$_SESSION["userid"],$_GET["name"]);
    
    $msg = "You have successfully voted for ".$_GET["name"]." in this election";
    header("location: election-details.php?election_id=".$_GET["election_id"]."&msg=$msg");
}



?>
