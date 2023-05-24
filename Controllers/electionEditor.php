<?php
session_start();

require '../dbconfig.php';
require '../models/user.php';


$query = $conn->prepare("UPDATE election
    SET title = '".$_POST["title"]."',
        description = '".$_POST["description"]."',
        start_date = '".$_POST["start_date"]."',
        end_date= '".$_POST["end_date"]."'WHERE election_id = '".$_SESSION["election_id"]."';");

    $query->execute([
        
    ]);
header("Location: ../views/AdminDashboard.php");




    

?>