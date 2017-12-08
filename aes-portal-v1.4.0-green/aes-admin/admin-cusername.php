<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['updateuser_id'])){
        header("Location: index.php");
        exit;
    }

    if(isset($_GET['updateuser_id']))
    {
        $sql_query="SELECT user_id,username FROM users WHERE user_id=".$_GET['updateuser_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        $username = $_POST['username'];
        $nusername = $_POST['nusername'];

        if($username != $fetched_row[1]){
            ?>
                <script type="text/javascript">
                    alert('Current username is incorrect!');
                </script>
            <?php
        }
        else{
            $sql_query = "UPDATE users SET username='$nusername' WHERE user_id=".$_GET['updateuser_id'];
            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully changed the username!');
                        function back(id){   
                            window.location.href='admin-profile.php?viewprof_id='+id;
                        }

                        back(<?php echo $_GET['updateuser_id']?>);
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
        <title>Change Username</title>
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
                            <h1 style="text-align:center;">Change Username</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                            <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                <b>Current Username</b>
                                <input type="text" name="username" placeholder="enter current username" required><br><br>
                                <b>New Username</b>
                                <input type="text" name="nusername" placeholder="enter new username" required><br><br>
                                <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:130px;"> 
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