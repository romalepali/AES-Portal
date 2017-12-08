<?php
    include ('../connect.php');

    if(empty($_SESSION))    
    session_start();

    if(isset($_SESSION['username'])&&$_SESSION['user_type']=='Teacher'){
        header("location: ../aes-teacher/");
        exit;
    }
    else if(isset($_SESSION['username'])&&$_SESSION['user_type']=='Student'){
        header("location: ../aes-student/");
        exit;
    }
    else if(!isset($_SESSION['user_type'])){
        header("location: ../");
        exit;
    }
?>