<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_POST['addbtn']))
    {
        if($_POST['sy_start']>=$_POST['sy_end']){
            ?>
                <script type="text/javascript">
                    alert('Invalid School Year!');
                </script>
            <?php
        }
        else{
            $sy_description = $_POST['sy_start']."-".$_POST['sy_end'];
            
            $sql_query2="SELECT * FROM school_year WHERE sy_description='$sy_description'";
            $result_set2=mysqli_query($con,$sql_query2);
            $fetched_row2=mysqli_num_rows($result_set2);
        
            if($fetched_row2>0){
                ?>
                    <script type="text/javascript">
                        alert('School Year already exists!');
                    </script>
                <?php
            }
            else{
                $sql_query = "INSERT INTO school_year (sy_description) VALUES ('$sy_description')";
    
                if(mysqli_query($con,$sql_query))
                {
                    ?>
                        <script type="text/javascript">
                            alert('Successfully added a new School Year!');
                            window.location.href='year.php';
                        </script>
                    <?php
                }
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert('Error occured while adding a new School Year!');
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
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/loader.css">
        <link rel="stylesheet" href="../css/tables.css">
        <link rel="shortcut icon" href="../images/head_logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/account.js"></script>
        <title>Add New School Year</title>
    </head>

    <style>
        input[type=number] {
            height: 30px;
            width: 40%;
            text-align:center;
        }
    </style>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <?php include ('include/header.php');?>    
                        <div class="main">
                            <h1 style="text-align:center;">Add New School Year</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST">
                                    <b>School Year</b>
                                    <input type="number" name="sy_start" placeholder="start">
                                    -
                                    <input type="number" name="sy_end" placeholder="end"><br>
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