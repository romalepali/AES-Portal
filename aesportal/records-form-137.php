<!DOCTYPE html>

<?php
    include 'connection.php'; //connect the connection page
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
        <link rel="stylesheet" href="css/records-form-137.css">
        <link rel="shortcut icon" href="images/head_logo.png" />
    </head>
    <title>Form 137</title>
    
    <body>
        <div class="cover">
            <a href="index.php">
                <img class="logo" src="images/logo.png" width="100px;">
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
                        <a href="logout.php">LOG OUT</a>
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
					<input class="search_button" type="image" src="images/search_button.png">
				</form>
            </div>
        </div>
        
        <div id="content_con_login">
            <div id="content_login">
                <div id="managetext">Form 137 Records</div>
                <table align="center">
                    <tr height="50px">
                        <th align="center">Student ID</th>
                        <th align="center">First Name</th>
                        <th align="center">Middle Name</th>
                        <th align="center">Last Name</th>
                        <th align="center">Gender</th>
                        <th align="center">Section</th>
                        <th align="center">Level</th>
                        <th colspan="3" align="center">Operations</th>
                    </tr>
                    <?php
                    // Create connection
                    $conn = new mysqli($server, $unm, $pwd, $db);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT a.studid,a.fname,a.mname,a.lname,a.gender,b.secname,c.levelname FROM students a,section b,level c where a.secid=b.id and a.levid=c.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <tr height="50px">
                            <td align="center"><?php echo $row["studid"];?></td>
                            <td align="center"><?php echo $row["fname"];?></td>
                            <td align="center"><?php echo $row["mname"];?></td>
                            <td align="center"><?php echo $row["lname"];?></td>
                            <td align="center"><?php echo $row["gender"];?></td>
                            <td align="center"><?php echo $row["secname"];?></td>
                            <td align="center"><?php echo $row["levelname"];?></td>
                            <td align="center" width="50px"><a href="#">view</a></td>
                            <td align="center" width="50px"><a href="#">update</a></td>
                            <td align="center" width="50px"><a href="#">delete</a></td>
                        </tr>
                        <?php 
                        }
                    } else {
                        ?>
                        <tr>
                             <td colspan="9" align="center"><?php echo "0 results";?></td>
                        </tr>
                        <?php
                    }

                    $conn->close();
                    ?>
                </table>
                <div id="addrecord">
                    <a href="#">new</a>
                </div>
            </div>
            <div id="footer">
                AES Portal &copy 2017
            </div>
	   </div>
    </body>
</html>