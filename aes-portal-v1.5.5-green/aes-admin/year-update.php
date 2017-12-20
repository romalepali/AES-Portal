<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['update_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['update_id']))
    {
        $sql_query="SELECT * FROM school_year WHERE sy_id=".$_GET['update_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
        
    }

    if(isset($_POST['updatebtn']))
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

            $sql_query = "UPDATE school_year SET sy_description='$sy_description' WHERE sy_id=".$_GET['update_id'];

            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully updated the data!');
                        window.location.href='year.php';
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
        <title>Update School Year</title>
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
                            <h1 style="text-align:center;">Update School Year</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                    <b>School Year</b>
                                    <?php 
                                        $years = explode("-",$fetched_row[1]);
                                        $count=1;
                                        foreach($years as $year){
                                            if($count==1){
                                                ?>
                                                    <input type="number" name="sy_start" value="<?php echo $year;?>" placeholder="start">-
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <input type="number" name="sy_end" value="<?php echo $year;?>" placeholder="end"><br>
                                                <?php
                                            }
                                            ++$count;
                                        }
                                    ?>
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