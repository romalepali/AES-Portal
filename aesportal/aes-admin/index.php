<!DOCTYPE html>

<?php
    include '../connection.php'; //connect the connection page
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_SESSION['username'])) 
    { //if not yet logged in    
        header("location: index.php");// send to login page    
        exit; 
    }  
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/aes-admin.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
    </head>
    <title>AES Portal</title>
    
    <body>
        <div class="body">
            <div class="cover">
                <a href="index.php">
                    <img class="logo" src="../images/logo.png" width="100px;">
                </a>
            </div>
            <div class="navbar">
                <div class="menu">
                     <div class="dropdown_content">
                        <button class="dropbutton">MY ACCOUNT</button>
                        <div class="dropdown_contents">
                            <a href="#">PROFILE</a>
                            <a href="#">SETTINGS</a>
                            <a href="#">MANAGE</a>
                            <a href="../logout.php">LOG OUT</a>
                        </div>
                    </div>
                    <div class="dropdown_content">
                        <button class="dropbutton">RECORDS</button>
                        <div class="dropdown_contents">
                            <a href="#">Form 137</a>
                        </div>
                    </div>
                    <div class="dropdown_content">
                        <button class="dropbutton">STUDENTS</button>
                        <div class="dropdown_contents">
                            <a href="a-z-students.php">A-Z</a>
                            <a href="#">LEVEL</a>
                            <a href="#">SECTION</a>
                            <a href="#">SCHOOL YEAR</a>
                        </div>
                    </div>
                    <div class="dropdown_content">
                        <button class="dropbutton">HELP</button>
                        <div class="dropdown_contents">
                            <a href="#">HOW TO USE</a>
                        </div>
                    </div>
                    <div class="dropdown_content">
                        <button class="dropbutton">ABOUT</button>
                        <div class="dropdown_contents">
                            <a href="#">WEBSITE</a>
                            <a href="#">DEVELOPMENT</a>
                            <a href="#">CONTACT US</a>
                        </div>
                    </div> 
                </div>
                <div class="search">
                    <form>
                        <input class="search_bar" name="record" type="text" size="32" maxlength="32" value="" placeholder="search records">
                        <input class="search_button" type="image" src="../images/search_button.png">
                    </form>
                </div>
            </div>

            <div id="content">
                <div id="contents">

                </div>
                <div id="footer">
                    AES Portal &copy 2017
                </div>
           </div>
        </div>
    </body>
</html>