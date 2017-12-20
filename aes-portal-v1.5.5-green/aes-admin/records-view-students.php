<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_GET['viewall_id']))
    {
        $arecord="SELECT a.* FROM students a WHERE a.student_id=".$_GET['viewall_id'];
        $result_arecord=mysqli_query($con,$arecord);

        if(mysqli_num_rows($result_arecord)>0)
        {
            while($astud=mysqli_fetch_row($result_arecord))
            {
                $_SESSION['access'] = $astud[3].", ".$astud[1]." ".$astud[2]." | ".$_SESSION['atype']." Records";
                $_SESSION['student_id']=$astud[0];
            }
        }

        $sql_query="SELECT a.*,c.*,d.*,e.* FROM records a INNER JOIN students b ON a.student_id=b.student_id INNER JOIN section c ON a.section_id=c.section_id INNER JOIN school_year d ON c.sy_id=d.sy_id INNER JOIN level e ON c.level_id=e.level_id WHERE b.student_id=".$_GET['viewall_id']."&& a.record_type_id=".$_SESSION['type']." GROUP BY c.section_description, a.file,d.sy_description,e.level_description";
        $result_set=mysqli_query($con,$sql_query);
    }
    else if(isset($_GET['viewall_type']))
    {
        $_SESSION['type']=$_GET['viewall_type'];
        $_GET['viewall_id']=$_SESSION['student_id'];

        $arecord="SELECT a.* FROM record_type a WHERE a.id=".$_GET['viewall_type'];
        $result_arecord=mysqli_query($con,$arecord);

        if(mysqli_num_rows($result_arecord)>0)
        {
            while($astud=mysqli_fetch_row($result_arecord))
            {
                $_SESSION['access'] = "<i>".$_SESSION['fullname']."</i> ".$astud[1]." Records";
                $_SESSION['atype'] = $astud[1];
            }
        }

        $sql_query="SELECT a.*,c.*,d.*,e.* FROM records a INNER JOIN students b ON a.student_id=b.student_id INNER JOIN section c ON a.section_id=c.section_id INNER JOIN school_year d ON c.sy_id=d.sy_id INNER JOIN level e ON c.level_id=e.level_id WHERE b.student_id=".$_SESSION['student_id']."&& a.record_type_id=".$_SESSION['type']." GROUP BY c.section_description, a.file,d.sy_description,e.level_description";
        $result_set=mysqli_query($con,$sql_query);
    }
    else{
        header("location: index.php");
        exit;
    }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/loader.css">
        <link rel="stylesheet" href="../css/options.css">
        <link rel="stylesheet" href="../css/tables.css">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="shortcut icon" href="../images/head_logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/account.js"></script>
        <script src="../js/upload.js"></script>
        <script src="../js/records-option.js"></script>
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
                            <h2 style="text-align:center;">
                                <?php
                                    echo $_SESSION['access'];
                                ?>
                            </h2>
                            <div id="sortby" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th>Filename</th>
                                            <th width="250px">Level - Section<br>School Year</th>
                                            <th width="150px">Option</th>
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
                                                        <a href="records/<?php echo $row[4];?>">
                                                            <?php echo $row[4];?>
                                                        </a>
                                                    </td>
                                                    <td width="250px">
                                                        <?php echo $row[15]." - ".$row[8]."<br>[".$row[13]."]";?>
                                                    </td>
                                                    <td width="150px">
                                                        <a href="javascript: update_id('<?php echo $row[0];?>')">
                                                            update
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
                                <button class="studprofbut" style="margin-top:20px;" onclick="javascript: upload_new(<?php echo $_GET['viewall_id'];?>)">upload</button>
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