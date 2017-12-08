<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_POST['addbtn']))
    {
        $valid_id = $_POST['valid_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];

        $sql_query2="SELECT * FROM teachers WHERE BINARY fname='$fname' && mname='$mname' && lname='$lname' || valid_id='$valid_id'";
        $result_set2=mysqli_query($con,$sql_query2);
        $fetched_row2=mysqli_num_rows($result_set2);
    
        if($fetched_row2>0){
            ?>
                <script type="text/javascript">
                    alert('Teacher already exists!');
                </script>
            <?php
        }
        else{
            $sql_query = "INSERT INTO teachers (fname,mname,lname,gender,prof_pic,valid_id) VALUES ('$fname','$mname','$lname','$gender','profile.jpg','$valid_id')";

            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully added a new teacher!');
                        window.location.href='teachers.php';
                    </script>
                <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error occured while adding a new teacher!');
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
        <title>Add New Teacher</title>
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
                            <h1 style="text-align:center;">Add New Teacher</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST">
                                    <b>Teacher ID</b>
                                    <input type="text" name="valid_id" placeholder="enter teacher id" required><br><br>
                                    <b>First Name</b>
                                    <input type="text" name="fname" placeholder="enter first name" required><br><br>
                                    <b>Middle Name</b>
                                    <input type="text" name="mname" placeholder="enter middle name" required><br><br>
                                    <b>Last Name</b>
                                    <input type="text" name="lname" placeholder="enter last name" required><br><br>
                                    <b>Gender</b><br>
                                    <select name="gender" required>
                                        <option value="">Select</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select><br><br>
                                    <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:80px;"> 
                                        <button type="submit" name="addbtn" style="border:none; width: 150px; padding: 20px 0px; color:white; background-color:rgb(0, 100, 0);">add</button>
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