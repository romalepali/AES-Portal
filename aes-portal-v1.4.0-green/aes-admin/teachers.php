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
        <script src="../js/teachers-option.js"></script>
        <script src="../js/teachers-sort.js"></script>
        <title>Teachers</title>
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
                            <h1 style="text-align:center;">Browse Teachers</h1>
                            <div id="sortby" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="overflow:scroll; height:370px;">
                                    <a href="javascript: byid()" style="text-decoration:none; color:white;">
                                        <div class="options">
                                            By Teacher ID
                                        </div>
                                    </a>

                                    <a href="javascript: byname()" style="text-decoration:none; color:white;">
                                        <div class="options">
                                            By Name
                                        </div>
                                    </a>

                                    <a href="javascript: bysection()" style="text-decoration:none; color:white;">
                                        <div class="options">
                                            By Section
                                        </div>
                                    </a>

                                    <a href="javascript: bylevel()" style="text-decoration:none; color:white;">
                                        <div class="options">
                                            By Level
                                        </div>
                                    </a>
                                    <a href="javascript: byyear()" style="text-decoration:none; color:white;">
                                        <div class="options">
                                            By School Year
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div id="byid" style="display:none; margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th  width="175px">Teacher ID</th>
                                            <th>Name</th>
                                            <th width="75px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            $sql_query="SELECT * FROM teachers GROUP BY teacher_id";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                <tr>
                                                    <td width="175px">
                                                        <?php echo $row[6]; ?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript: view_id('<?php echo $row[0]; ?>')">
                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                        </a>
                                                    </td>
                                                    <td width="75px">
                                                        <a href="javascript: delete_id('<?php echo $row[0]; ?>')">delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr height="50px">
                                                    <td colspan="4">No data found!</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: sortby('byid')">back</button>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: add_new()">new</button>
                            </div>

                            <div id="byname" style="display:none; margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th>Name</th>
                                            <th width="75px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            $sql_query="SELECT * FROM teachers GROUP BY lname,fname,mname";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript: view_id('<?php echo $row[0]; ?>')">
                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                        </a>
                                                    </td>
                                                    <td width="75px">
                                                        <a href="javascript: delete_id('<?php echo $row[0]; ?>')">delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr height="50px">
                                                    <td colspan="4">No data found!</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: sortby('byname')">back</button>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: add_new()">new</button>
                            </div>

                            <div id="bysection" style="display:none; margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th  width="275px">Section</th>
                                            <th>Name</th>
                                            <th width="75px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            $sql_query="SELECT a.*,b.* FROM teachers a INNER JOIN section b ON a.teacher_id=b.teacher_id GROUP BY b.section_description, a.lname,a.fname,a.mname";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                <tr>
                                                    <td width="275px">
                                                        <?php echo $row[8];?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript: view_id('<?php echo $row[0]; ?>')">
                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                        </a>
                                                    </td>
                                                    <td width="75px">
                                                        <a href="javascript: delete_id('<?php echo $row[0]; ?>')">delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr height="50px">
                                                    <td colspan="4">No data found!</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: sortby('bysection')">back</button>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: add_new()">new</button>
                            </div>

                            <div id="bylevel" style="display:none; margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th  width="175px">Level</th>
                                            <th>Name</th>
                                            <th width="75px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            $sql_query="SELECT a.*,c.* FROM teachers a INNER JOIN section b ON a.teacher_id=b.teacher_id INNER JOIN level c ON b.level_id=c.level_id GROUP BY c.level_description, a.lname,a.fname,a.mname";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                <tr>
                                                    <td width="175px">
                                                        <?php echo $row[8];?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript: view_id('<?php echo $row[0]; ?>')">
                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                        </a>
                                                    </td>
                                                    <td width="75px">
                                                        <a href="javascript: delete_id('<?php echo $row[0]; ?>')">delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr height="50px">
                                                    <td colspan="4">No data found!</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: sortby('bylevel')">back</button>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: add_new()">new</button>
                            </div>

                            <div id="byyear" style="display:none; margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th  width="275px">School Year</th>
                                            <th>Name</th>
                                            <th width="75px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            $sql_query="SELECT a.*,c.* FROM teachers a INNER JOIN section b ON a.teacher_id=b.teacher_id INNER JOIN school_year c ON b.sy_id=c.sy_id GROUP BY c.sy_description, a.lname,a.fname,a.mname";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                <tr>
                                                    <td width="275px">
                                                        <?php echo $row[8];?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript: view_id('<?php echo $row[0]; ?>')">
                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                        </a>
                                                    </td>
                                                    <td width="75px">
                                                        <a href="javascript: delete_id('<?php echo $row[0]; ?>')">delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr height="50px">
                                                    <td colspan="4">No data found!</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: sortby('byyear')">back</button>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: add_new()">new</button>
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