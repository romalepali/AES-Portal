<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_POST['addbtn']))
    {
        $type = $_POST['type'];
        $description = $_POST['description'];

        $sql_query2="SELECT * FROM record_type WHERE BINARY type='$type'";
        $result_set2=mysqli_query($con,$sql_query2);
        $fetched_row2=mysqli_num_rows($result_set2);
    
        if($fetched_row2>0){
            ?>
                <script type="text/javascript">
                    alert('Record already exists!');
                </script>
            <?php
        }
        else{
            $sql_query = "INSERT INTO record_type (type,description) VALUES ('$type','$description')";
            
            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully added a new record!');
                        window.location.href='records.php';
                    </script>
                <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error occured while adding a new record!');
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
        <title>Add New Record</title>
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
                            <h1 style="text-align:center;">Add New Record</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST">
                                    <b>Record Name</b>
                                    <input type="text" name="type" placeholder="enter first name"><br><br>
                                    <b>Record Description</b>
                                    <input type="text" name="description" placeholder="enter middle name"><br><br>
                                    <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:125px;"> 
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