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

    if(isset($_POST['addbtn']))
    {
        // variables for input data
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $section_id = $_POST['section_id'];
        // variables for input data

        // sql query for inserting data into database
        $sql_query = "INSERT INTO students (fname,mname,lname,birthdate,gender,section_id) VALUES ('$fname','$mname','$lname','$birthdate','$gender','$section_id')";
        // sql query for inserting data into database

        // sql query execution function
        if(mysqli_query($con,$sql_query))
        {
            ?>
            <script type="text/javascript">
            alert('Data Are Inserted Successfully ');
            window.location.href='a-z-students.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            alert('error occured while inserting your data');
            </script>
            <?php
        }
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/add-records-form-137.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
    </head>
    <title>Add New Student</title>
    
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
                            <a href="records-form-137.php">Form 137</a>
                        </div>
                    </div>
                    <div class="dropdown_content">
                        <button class="dropbutton">STUDENTS</button>
                        <div class="dropdown_contents">
                            <a href="#">A-Z</a>
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
                    <form method="post">
                        <div class="signup_text">Add New Users</div>
                        <div class="signup_con">
                            <span class="fname">
                                <b>First Name</b>
                                <input type="text" placeholder="Enter First Name" name="fname" required> <br><br>
                            </span>
                            <span class="mname">
                                <b>Middle Name</b>
                                <input type="text" placeholder="Enter Middle Name" name="mname" required> <br><br>
                            </span>
                            <span class="mname">
                                <b>Last Name</b>
                                <input type="text" placeholder="Enter Last Name" name="lname" required> <br><br>
                            </span>
                            <span class="birthdate">
                                <b>Birthdate</b>
                                <input type="date" placeholder="Enter Birthdate" name="birthdate" required> <br><br>
                            </span>
                            <span class="gender">
                                <b>Gender:</b> <br>
                                <input type="radio" name="gender" value="Female">Female <br>
                                <input type="radio" name="gender" value="Male">Male <br><br>
                            </span>
                            <span class="section">
                                <b>Level & Section:</b> <br>
                                <input type="radio" name="section_id" value="1" required>Grade 1 - Ruby<br>
                                <input type="radio" name="section_id" value="2" required>Grade 2 - Pearl<br>
                                <input type="radio" name="section_id" value="3" required>Grade 3 - Diamond<br>
                                <input type="radio" name="section_id" value="4" required>Grade 4 - Peridot<br>
                                <input type="radio" name="section_id" value="5" required>Grade 5 - Quartz<br>
                                <input type="radio" name="section_id" value="6" required>Grade 6 - Topaz<br><br>
                            </span>
                            <button class="signup_button" type="submit" name="addbtn">Add</button>
                        </div>
                    </form>
                </div>
                <div id="footer">
                    AES Portal &copy 2017
                </div>
           </div>
        </div>
    </body>
</html>