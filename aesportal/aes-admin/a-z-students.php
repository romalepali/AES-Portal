<!DOCTYPE html>

<?php
    include ('../connection.php'); //connect the connection page
    if(empty($_SESSION)) // if the session not yet started     
        session_start(); 
    if(!isset($_SESSION['username'])) 
    { //if not yet logged in    
        header("location: index.php");// send to login page    
        exit; 
    }

    if(isset($_GET['delete_id']))
    {
        $sql_query="DELETE FROM students WHERE student_id=".$_GET['delete_id'];
        mysqli_query($con,$sql_query);
        header("Location: a-z-students.php");
    }
?> 

<html>
    <head>
        <link rel="stylesheet" href="../css/a-z-students.css">
        <link rel="shortcut icon" href="..images/head_logo.png" />
        
        <script type="text/javascript">
            function edt_id(id)
            {
                if(confirm('Sure to edit ?'))
                {
                    window.location.href='modify-students.php?edit_id='+id;
                }
            }
            function delete_id(id)
            {
                if(confirm('Sure to Delete ?'))
                {
                    window.location.href='a-z-students.php?delete_id='+id;
                }
            }
        </script>
    </head>
    <title>List of Students</title>
    
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
                        <button class="dropbutton">TEACHERS</button>
                        <div class="dropdown_contents">
                            <a href="#">A-Z</a>
                            <a href="#">LEVEL</a>
                            <a href="#">SECTION</a>
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

            <div id="content_con_login">
                <div id="content_login">
                    <div id="managetext">List of Students</div>
                    <table align="center">
                    <tr height="50px">
                        <th align="center">First Name</th>
                        <th align="center">Middle Name</th>
                        <th align="center">Last Name</th>
                        <th align="center">Birthdate</th>
                        <th align="center">Gender</th>
                        <th align="center">Student ID</th>
                        <th align="center">Records</th>
                        <th colspan="2" align="center">Operations</th>
                    </tr>
                    <?php
                        $sql_query="SELECT a.lname,a.mname,a.fname,a.birthdate,a.gender,a.student_id FROM students a group by a.lname,a.fname,a.mname";
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_row($result_set))
                            {
                            ?>
                            <tr height="50px">
                                <td align="center"><?php echo $row[0];?></td>
                                <td align="center"><?php echo $row[1];?></td>
                                <td align="center"><?php echo $row[2];?></td>
                                <td align="center"><?php echo $row[3];?></td>
                                <td align="center"><?php echo $row[4];?></td>
                                <td align="center"><?php echo $row[5];?></td>
                                <td align="center" width="50px"><a href="#">view</a></td>
                                <td align="center" width="50px"><a href="javascript:edt_id('<?php echo $row[5]; ?>')">modify</a></td>
                                <td align="center" width="50px"><a href="javascript:delete_id('<?php echo $row[5]; ?>')">delete</a></td>
                            </tr>
                            <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr height="50px">
                            <td colspan="9" align="center">No Data Found !</td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
                    <a class="new" href="new-students.php">
                        <div id="addrecord">
                            new
                        </div>
                    </a>
                </div>
                <div id="footer">
                    AES Portal &copy 2017
                </div>
           </div>
        </div>
    </body>
</html>