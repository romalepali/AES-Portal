<?php
    session_start();
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
?> 