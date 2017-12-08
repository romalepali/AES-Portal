<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_POST['addbtn']))
    {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $section_id = $_POST['section_id'];
        $lrn = $_POST['lrn'];

        $sql_query2="SELECT * FROM students WHERE BINARY lrn='$lrn' && fname='$fname' && mname='$mname' && lname='$lname'";
        $result_set2=mysqli_query($con,$sql_query2);
        $fetched_row2=mysqli_num_rows($result_set2);
    
        if($fetched_row2>0){
            ?>
                <script type="text/javascript">
                    alert('Student already exists!');
                </script>
            <?php
        }
        else{
            $sql_query = "INSERT INTO students (fname,mname,lname,birthdate,gender,section_id,prof_pic,lrn) VALUES ('$fname','$mname','$lname','$birthdate','$gender','$section_id','profile.jpg','$lrn')";

            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully added a new student!');
                        window.location.href='students.php';
                    </script>
                <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error occured while adding a new student!');
                    </script>
                <?php
            }
        }
    }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/loader.css">
        <link rel="stylesheet" href="../css/options.css">
        <link rel="stylesheet" href="../css/tables.css">
        <link rel="shortcut icon" href="../images/head_logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/account.js"></script>
        <title>Add New Student</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <?php include ('include/header.php');?>    
                        <div class="main">
                            <h1 style="text-align:center;">Add New Student</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST">
                                    <b>LRN</b>
                                    <input type="text" name="lrn" placeholder="enter lrn"><br><br>
                                    <b>First Name</b>
                                    <input type="text" name="fname" placeholder="enter first name"><br><br>
                                    <b>Middle Name</b>
                                    <input type="text" name="mname" placeholder="enter middle name"><br><br>
                                    <b>Last Name</b>
                                    <input type="text" name="lname" placeholder="enter last name"><br><br>
                                    <b>Gender</b><br>
                                    <select name="gender" required>
                                        <option value="">Select</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select><br><br>
                                    <b>Birthdate</b><br>
                                    <input type="date" name="birthdate"><br><br>
                                    <b>Level & Section</b><br>
                                    <select name="section_id" required>
                                        <option value="">Select</option>
                                        <?php
                                            $sql_query="SELECT a.section_id,a.section_description,b.level_description FROM section a INNER JOIN level b ON a.level_id=b.level_id group by b.level_description,a.section_description";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                { 
                                                    echo "<option value='$row[0]'>".$row[2]." - ".$row[1]."</option>";
                                                ?>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    Not Available
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:80px;"> 
                                        <button type="submit" name="addbtn" style="border:none; width: 150px; padding: 20px 0px; color:white; background-color:rgb(0, 100, 0);">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php include ('include/recent-updates.php');?>
                    </div>
                    <?php include ('include/footer.php');?>
                </div>
            <div>
        </div>
    </body>
</html>