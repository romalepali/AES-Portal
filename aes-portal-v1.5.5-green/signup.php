<!DOCTYPE html>
<?php
    include ('include/verify-notlogged.php');

    if(isset($_POST['signup']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $user_type = $_POST['user_type'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];

        if(strcmp($password,$cpassword) != 0){
            ?>
                <script type="text/javascript">
                    alert('Passwords does not match!');
                </script>
            <?php
        }
        else{
            $sql_query2="SELECT * FROM users WHERE BINARY (fname='$fname' && mname='$mname' && lname='$lname') || (username='$username')";
            $result_set2=mysqli_query($con,$sql_query2);
            $fetched_row2=mysqli_num_rows($result_set2);
        
            if($fetched_row2>0){
                ?>
                    <script type="text/javascript">
                        alert('Account already exists!');
                    </script>
                <?php
            }
            else{
                $sql_query = "INSERT INTO users (user_type,username,password,fname,mname,lname,gender,birthdate,prof_pic,status) VALUES ('$user_type','$username','$password','$fname','$mname','$lname','$gender','$birthdate','profile.jpg','Inactive')";

                if(mysqli_query($con,$sql_query))
                {
                    ?>
                        <script type="text/javascript">
                            alert('Successfully created your account, please verify it to the administrator!');
                            window.location.href='index.php';
                        </script>
                    <?php
                }
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert('Error occured while creating your account!');
                        </script>
                    <?php
                }
            }
        }
    }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/loader.css">
        <link rel="shortcut icon" href="images/head_logo.png"/>
        <script src="js/loader.js"></script>
        <title>Sign Up</title>
    </head>
    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:auto">
                        <?php include ('include/header.php');?>
                        <div class="main" style="overflow:auto">
                            <h1 style="text-align:center;">SIGN UP</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                    <b>Username</b>
                                    <input type="text" name="username" placeholder="enter username" required><br><br>
                                    <b>Password</b>
                                    <input type="password" name="password" placeholder="enter password" required><br><br>
                                    <b>Confirm Password</b>
                                    <input type="password" name="cpassword" placeholder="enter confirm password" required><br><br>
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
                                    <b>User Type</b><br>
                                    <select name="user_type" required>
                                        <option value="">Select</option>
                                        <option value="Admin">Admin</option>
                                    </select><br><br>
                                    <b>Birthdate</b><br>
                                    <input type="date" name="birthdate" required><br><br>
                                    <div style="position:relative; width: 150px; margin:auto;"> 
                                        <button type="submit" name="signup" style="border:none; width: 150px; padding: 20px 0px; color:white; background-color:rgb(0, 100, 0);">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php include ('include/recent-updates.php');?>
                    </div>
                    <?php include ('include/footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>