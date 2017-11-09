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

    if(isset($_GET['edit_id']))
    {
        $sql_query="SELECT student_id,fname,mname,lname,birthdate,gender,section_id FROM students WHERE student_id=".$_GET['edit_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        // variables for input data
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $section_id = $_POST['section_id'];
        // variables for input data

        // sql query for update data into database
        $sql_query = "UPDATE students SET fname='$fname',mname='$mname',lname='$lname',birthdate='$birthdate',gender='$gender',section_id='$section_id' WHERE student_id=".$_GET['edit_id'];
        // sql query for update data into database

        // sql query execution function
        if(mysqli_query($con,$sql_query))
        {
            ?>
            <script type="text/javascript">
            alert('Data Are Updated Successfully');
            window.location.href='a-z-students.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            alert('error occured while updating data');
            </script>
            <?php
        }
        // sql query execution function
    }
    if(isset($_POST['cancelbtn']))
    {
        header("Location: a-z-students.php");
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/add-records-form-137.css">
        <link rel="shortcut icon" href="../images/head_logo.png" />
    </head>
    <title>Modify Student</title>
    
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
                                <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo $fetched_row['fname']; ?>" required> <br><br>
                            </span>
                            <span class="mname">
                                <b>Middle Name</b>
                                <input type="text" placeholder="Enter Middle Name" name="mname" value="<?php echo $fetched_row['mname']; ?>" required> <br><br>
                            </span>
                            <span class="mname">
                                <b>Last Name</b>
                                <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $fetched_row['lname']; ?>" required> <br><br>
                            </span>
                            <span class="birthdate">
                                <b>Birthdate</b>
                                <input type="date" placeholder="Enter Birthdate" name="birthdate" value="<?php echo $fetched_row['birthdate']; ?>" required> <br><br>
                            </span>
                            <span class="gender">
                                <b>Gender:</b> <br>
                                <?php
                                    if ($fetched_row['gender'] == 'Female')
                                    {
                                        echo "<input type='radio' name='gender' value='Female' checked>Female <br>";
                                        echo "<input type='radio' name='gender' value='Male'>Male <br><br>";
                                    }
                                    else
                                    {
                                        echo "<input type='radio' name='gender' value='Female'>Female <br>";
                                        echo "<input type='radio' name='gender' value='Male' checked>Male <br><br>";
                                    }
                                ?>
                            </span>
                            <span class="section">
                                <b>Level & Section:</b> <br>
                                <?php
                                    if ($fetched_row['section_id'] == 1)
                                    {
                                        echo "<input type='radio' name='section_id' value='1' checked>Grade 1 - Ruby <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 2 - Pearl <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 3 - Diamond <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 4 - Peridot <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 5 - Quartz <br>";
                                        echo "<input type='radio' name='section_id' value='2'>Grade 6 - Topaz <br><br>";
                                    }
                                    else if ($fetched_row['section_id'] == 2)
                                    {
                                        echo "<input type='radio' name='section_id' value='1'>Grade 1 - Ruby <br>";
                                        echo "<input type='radio' name='section_id' value='1' checked>Grade 2 - Pearl <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 3 - Diamond <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 4 - Peridot <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 5 - Quartz <br>";
                                        echo "<input type='radio' name='section_id' value='2'>Grade 6 - Topaz <br><br>";
                                    }
                                    else if ($fetched_row['section_id'] == 3)
                                    {
                                        echo "<input type='radio' name='section_id' value='1'>Grade 1 - Ruby <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 2 - Pearl <br>";
                                        echo "<input type='radio' name='section_id' value='1' checked>Grade 3 - Diamond <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 4 - Peridot <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 5 - Quartz <br>";
                                        echo "<input type='radio' name='section_id' value='2'>Grade 6 - Topaz <br><br>";
                                    }
                                    else if ($fetched_row['section_id'] == 4)
                                    {
                                        echo "<input type='radio' name='section_id' value='1'>Grade 1 - Ruby <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 2 - Pearl <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 3 - Diamond <br>";
                                        echo "<input type='radio' name='section_id' value='1' checked>Grade 4 - Peridot <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 5 - Quartz <br>";
                                        echo "<input type='radio' name='section_id' value='2'>Grade 6 - Topaz <br><br>";
                                    }
                                    else if ($fetched_row['section_id'] == 5)
                                    {
                                        echo "<input type='radio' name='section_id' value='1'>Grade 1 - Ruby <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 2 - Pearl <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 3 - Diamond <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 4 - Peridot <br>";
                                        echo "<input type='radio' name='section_id' value='1' checked>Grade 5 - Quartz <br>";
                                        echo "<input type='radio' name='section_id' value='2'>Grade 6 - Topaz <br><br>";
                                    }
                                    else
                                    {
                                        echo "<input type='radio' name='section_id' value='1'>Grade 1 - Ruby <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 2 - Pearl <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 3 - Diamond <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 4 - Peridot <br>";
                                        echo "<input type='radio' name='section_id' value='1'>Grade 5 - Quartz <br>";
                                        echo "<input type='radio' name='section_id' value='2' checked>Grade 6 - Topaz <br><br>";
                                    }
                                ?>
                            </span>
                            <button class="signup_button" type="submit" name="updatebtn">Update</button>
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