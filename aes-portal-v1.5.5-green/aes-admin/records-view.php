<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['record_type_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['record_type_id']))
    {
        $_SESSION['type']=$_GET['record_type_id'];
        $sql_query="SELECT a.*,b.*,c.*,count(b.record_type_id) FROM students a INNER JOIN records b ON a.student_id=b.student_id INNER JOIN record_type c ON b.record_type_id=c.id WHERE b.record_type_id=".$_GET['record_type_id']." GROUP BY a.lname,a.fname,a.mname";
        $result_set=mysqli_query($con,$sql_query);
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
        <script src="../js/view-student.js"></script>
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
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th>Name</th>
                                            <th width="175px">Record Type</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript: view_profile('<?php echo $row[0];?>')">
                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                        </a>
                                                    </td>
                                                    <td width="175px">
                                                        <a href="javascript: viewall_id('<?php echo $row[0]; $_SESSION['section_id']=$row[6];?>')">
                                                            <?php echo "<b>".$row[17]."</b> [".$row[19]."]"; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr height="50px">
                                                    <td colspan="5">No records found!</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </table>
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