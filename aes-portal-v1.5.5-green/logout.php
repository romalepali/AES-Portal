<?php
    include ('connect.php');

    session_start();

    $login = "INSERT INTO access (user_id,operation_date,operation) VALUES ('".$_SESSION['user_id']."',NOW(),'Log Out')";
    if(mysqli_query($con,$login)){
        
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['username']);
        unset($_SESSION['fname']);
        unset($_SESSION['mname']);
        unset($_SESSION['lname']);
        unset($_SESSION['gender']);
        session_destroy();
        header("Location: index.php");
        exit; 
    }
?> 