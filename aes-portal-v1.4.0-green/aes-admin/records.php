<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_GET['delete_id']))
    {
        $sql_query="DELETE FROM teachers WHERE teacher_id=".$_GET['delete_id'];
        mysqli_query($con,$sql_query);
        header("Location: teachers.php");
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
        <script src="../js/view-type.js"></script>
        <title>Records</title>
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
                            <h1 style="text-align:center;">Browse Records</h1>
                            <div id="sortby" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="border:solid 1px black; overflow:scroll; height:370px;">
                                    <?php
                                        $sql_query="SELECT a.*,count(b.record_type_id) FROM record_type a LEFT JOIN records b ON a.id=b.record_type_id GROUP BY a.type";
                                        $result_set=mysqli_query($con,$sql_query);
                                        if(mysqli_num_rows($result_set)>0)
                                        {
                                            while($row=mysqli_fetch_row($result_set))
                                            {
                                                ?>
                                                    <a href="javascript: view_type_id('<?php echo $row[0]?>')" style="text-decoration:none; color:white;">
                                                        <div class="options">
                                                            <?php echo "<b>".$row[1]."</b> [".$row[3]."]";?>
                                                        </div>
                                                    </a>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                        ?>
                                            <div class="options">
                                                <?php echo "No Records Found!";?>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                </div>
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