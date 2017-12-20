<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['view_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['view_id']))
    {
        $sql_query="SELECT a.section_description,b.lname,b.fname,b.mname,c.level_description,d.sy_description FROM section a INNER JOIN teachers b ON a.teacher_id = b.teacher_id INNER JOIN level c ON a.level_id = c.level_id INNER JOIN school_year d ON a.sy_id=d.sy_id WHERE section_id=".$_GET['view_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);

    }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/loader.css">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="shortcut icon" href="../images/head_logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/account.js"></script>
        <script src="../js/section-view.js"></script>
        <title>Section Info</title>
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
                            <h1 style="text-align:center;">Section Info</h1>
                            <div style="position relative; width:100%; margin:auto; text-align:left;">
                                <div class="studentsinfo">
                                    <table align="center">
                                        <tr>
                                            <th>Section </th>
                                            <td><?php echo $fetched_row[0]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Adviser </th>
                                            <td><?php echo $fetched_row[1].", ".$fetched_row[2]." ".$fetched_row[3]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Level </th>
                                            <td><?php echo $fetched_row[4]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>School Year </th>
                                            <td><?php echo $fetched_row[5]; ?></td>
                                        </tr>
                                    </table>
                                    <button class="studprofbut" onclick="javascript: update_id('<?php echo $_GET['view_id']; ?>')">Update</button>
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