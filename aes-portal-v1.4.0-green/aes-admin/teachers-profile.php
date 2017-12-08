<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['view_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['view_id']))
    {
        $sql_query="SELECT a.teacher_id,a.fname,a.mname,a.lname,a.gender,a.prof_pic,a.valid_id FROM teachers a WHERE a.teacher_id=".$_GET['view_id'];
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
        <script src="../js/teachers-view.js"></script>
        <title>Teacher Profile</title>
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
                            <h1 style="text-align:center;">Teacher Profile</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <a href="javascript: upload_prof('<?php echo $fetched_row[0]; ?>')">
                                    <div class="studentpic">
                                        <img class="profilepic" src="../uploads/<?php echo $fetched_row[5]?>">
                                    </div>
                                </a>
                                <div class="studentsinfo">
                                    <div class="title">Information</div>
                                    <table align="center">
                                        <tr>
                                            <th width="200px">Teacher ID</th>
                                            <td width="200px"><?php echo $fetched_row[6]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $fetched_row[1]." ".$fetched_row[2]." ".$fetched_row[3]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $fetched_row[4]; ?></td>
                                        </tr>
                                    </table>
                                    <button class="studprofbut" onclick="javascript: update_id('<?php echo $fetched_row[0]; ?>')">Update</button>
                                </div>
                                <div class="records">
                                    <div class="title">Students</div>
                                    <div class="record">
                                        <?php
                                            $sql_query="SELECT a.student_id,a.fname,a.mname,a.lname FROM students a INNER JOIN section b ON a.section_id=b.section_id INNER JOIN teachers d ON b.teacher_id=d.teacher_id WHERE b.section_id=".$_GET['view_id']." GROUP BY a.lname,a.fname,a.mname";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                    <a href="javascript: view_id('<?php echo $row[0]; ?>')" style="text-decoration:none; color:black;">
                                                        <div style="margin: 2px 0px; width:100%; padding:10px 0px; background-color:whitesmoke;">
                                                            <?php echo $row[3].", ".$row[1]." ".$row[2];?>
                                                        </div>
                                                    </a>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    Haven't Handled A Student Yet!
                                                <?php
                                            }
                                        ?>
                                        </table>
                                    </div>
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