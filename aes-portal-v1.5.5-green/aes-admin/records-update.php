<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['update_type_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['update_type_id']))
    {
        $sql_query="SELECT id,type,description FROM record_type WHERE id=".$_GET['update_type_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        $type = $_POST['type'];
        $description = $_POST['description'];

        $sql_query = "UPDATE record_type SET type='$type',description='$description' WHERE id=".$_GET['update_type_id'];

        if(mysqli_query($con,$sql_query))
        {
            ?>
                <script type="text/javascript">
                    alert('Successfully updated a record!');
                    window.location.href='records.php';
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while updating a record!');
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
        <title>Update Records</title>
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
                            <h1 style="text-align:center;">Update Records</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                    <b>Record</b>
                                    <input type="text" name="type" placeholder="enter record name" value="<?php echo $fetched_row['type']; ?>"><br><br>
                                    <b>Description</b><br>
                                    <textarea style="width:100%;height:200px;" name="description" placeholder="enter record description" value="<?php echo $fetched_row['description']; ?>"></textarea><br><br>
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