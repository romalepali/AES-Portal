<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['view_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['view_id']))
    {
        $sql_query2="SELECT a.teacher_id FROM teachers a INNER JOIN section b ON a.teacher_id=b.teacher_id INNER JOIN students c ON b.section_id=c.section_id WHERE c.student_id=".$_GET['view_id'];
        $result_set2=mysqli_query($con,$sql_query2);
        $fetched_row2=mysqli_num_rows($result_set2);

        $_SESSION['student_id']=$_GET['view_id'];
        $_SESSION['atype']=NULL;

        if($fetched_row2>0){
            $sql_query="SELECT a.student_id,a.lrn,a.fname,a.mname,a.lname,a.birthdate,a.gender,b.section_description,c.level_description,a.prof_pic,d.fname,d.mname,d.lname,d.teacher_id,a.section_id FROM students a INNER JOIN section b ON a.section_id=b.section_id INNER JOIN level c ON b.level_id=c.level_id INNER JOIN teachers d ON b.teacher_id=d.teacher_id WHERE a.student_id=".$_GET['view_id'];
            $result_set=mysqli_query($con,$sql_query);
            $fetched_row=mysqli_fetch_array($result_set);  
        }
        else{
            $sql_query="SELECT a.student_id,a.lrn,a.fname,a.mname,a.lname,a.birthdate,a.gender,b.section_description,c.level_description,a.prof_pic,a.section_id FROM students a INNER JOIN section b ON a.section_id=b.section_id INNER JOIN level c ON b.level_id=c.level_id WHERE a.student_id=".$_GET['view_id'];
            $result_set=mysqli_query($con,$sql_query);
            $fetched_row=mysqli_fetch_array($result_set);
        }
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
        <script src="../js/students-view.js"></script>
        <script src="../js/upload.js"></script>
        <title>Student Profile</title>
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
                            <h1 style="text-align:center;">Student Profile</h1>
                            <div style="position relative; width:100%; margin:auto; text-align:left;">
                                <a href="javascript: upload_prof('<?php echo $fetched_row[0]; ?>')">
                                    <div class="studentpic">
                                        <img class="profilepic" src="../uploads/<?php echo $fetched_row[9]?>">
                                    </div>
                                </a>
                                <div class="studentsinfo">
                                    <div class="title">Student Info</div>
                                    <table align="center">
                                        <tr>
                                            <th>LRN</th>
                                            <td><?php echo $fetched_row[1]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $fetched_row[4].", ".$fetched_row[2]." ".$fetched_row[3]; ?></td>
                                            <?php $_SESSION['fullname']=$fetched_row[4].", ".$fetched_row[2]." ".$fetched_row[3];?>
                                        </tr>
                                        <tr>
                                            <th>Birthdate</th>
                                            <td><?php echo $fetched_row[5]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $fetched_row[6]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Section</th>
                                            <td><?php echo $fetched_row[7]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Level</th>
                                            <td><?php echo $fetched_row[8]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Adviser</th>
                                            <td>
                                                <?php
                                                    if($fetched_row2>0){
                                                        ?>
                                                            <a style="text-decoration:none; color:rgb(0, 100, 0);" href="javascript: view_id(<?php echo $fetched_row[13];?>)">
                                                                <?php echo $fetched_row[12].", ".$fetched_row[10]." ".$fetched_row[11];?>
                                                            </a>
                                                        <?php
                                                        $_SESSION['section_id']=$fetched_row[14];
                                                    }
                                                    else{
                                                            echo "N/A";
                                                            $_SESSION['section_id']=$fetched_row[10];
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <button class="studprofbut" onclick="javascript: update_id('<?php echo $fetched_row[0]; ?>')">Update</button>
                                </div>

                                <div class="records">
                                    <div class="title">Available Records</div>
                                    <div class="record">
                                        <?php
                                            $sql_query="SELECT a.*,count(b.record_type_id) FROM record_type a INNER JOIN records b ON a.id=b.record_type_id INNER JOIN students c ON b.student_id=c.student_id WHERE c.student_id=".$fetched_row[0]." GROUP BY a.type;";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                    <a href="javascript: viewall_type('<?php echo $row[0];?>')" style="text-decoration:none; color:black;">
                                                        <div style="margin: 2px 0px; width:100%; padding:10px 0px; background-color:whitesmoke;">
                                                            <?php echo "<b>".$row[1]."</b> [".$row[3]."]";?>
                                                        </div>
                                                    </a>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    No records found!
                                                <?php
                                            }
                                        ?>
                                        </table>
                                    </div>
                                    <button class="studprofbut" onclick="javascript: upload_new('<?php echo $fetched_row[0]; ?>')">upload</button>
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