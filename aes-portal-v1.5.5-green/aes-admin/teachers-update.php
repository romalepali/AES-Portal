<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['update_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['update_id']))
    {
        $sql_query="SELECT teacher_id,fname,mname,lname,gender,valid_id FROM teachers WHERE teacher_id=".$_GET['update_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        $valid_id = $_POST['valid_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];

        $sql_query = "UPDATE teachers SET fname='$fname',mname='$mname',lname='$lname',gender='$gender',valid_id='$valid_id' WHERE teacher_id=".$_GET['update_id'];

        if(mysqli_query($con,$sql_query))
        {
            ?>
                <script type="text/javascript">
                    alert('Successfully updated the data!');
                    function back(id){   
                        window.location.href='teachers-profile.php?view_id='+id;
                    }

                    back(<?php echo $_GET['update_id']?>);
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while updating the data!');
                </script>
            <?php
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
        <title>Update Teacher</title>
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
                            <h1 style="text-align:center;">Update Teacher</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                    <b>Teacher ID</b>
                                    <input type="text" name="valid_id" placeholder="enter teacher id" value="<?php echo $fetched_row['valid_id']; ?>"><br><br>
                                    <b>First Name</b>
                                    <input type="text" name="fname" placeholder="enter first name" value="<?php echo $fetched_row['fname']; ?>"><br><br>
                                    <b>Middle Name</b>
                                    <input type="text" name="mname" placeholder="enter middle name" value="<?php echo $fetched_row['mname']; ?>"><br><br>
                                    <b>Last Name</b>
                                    <input type="text" name="lname" placeholder="enter last name" value="<?php echo $fetched_row['lname']; ?>"><br><br>
                                    <b>Gender</b><br>
                                    <select name="gender" required>
                                        <?php
                                            if ($fetched_row['gender'] == 'Female')
                                            {
                                                echo "<option value='Female' selected>Female</option>";
                                                echo "<option value='Male'>Male</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='Female'>Female</option>";
                                                echo "<option value='Male' selected>Male</option>";
                                            }
                                        ?>
                                    </select>
                                    <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:80px;"> 
                                        <button type="submit" name="updatebtn" style="border:none; width: 150px; padding: 20px 0px; color:white; background-color:rgb(0, 100, 0);">update</button>
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