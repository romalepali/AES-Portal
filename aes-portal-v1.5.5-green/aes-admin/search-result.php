<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_POST['submit']))
	{
		header("Location: index.php");    
		exit;  
	}
    
    $search = $_POST['search'];
    $search_type = $_POST['search_type'];

    if($search_type=='students'){
        $query="SELECT * FROM students WHERE fname LIKE '%" . $search . "%' OR mname LIKE '%" . $search . "%' OR lname LIKE '%" . $search ."%' OR lrn LIKE '%" . $search . "%' GROUP BY lname,fname,mname";
    }
    else {
        $query="SELECT * FROM teachers WHERE fname LIKE '%" . $search . "%' OR mname LIKE '%" . $search . "%' OR lname LIKE '%" . $search ."%' OR valid_id LIKE '%" . $search . "%' GROUP BY lname,fname,mname";
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
        <script src="../js/students-option.js"></script>
        <title>Search Result</title>
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
                            <h1 style="text-align:center;">Search Result for "<?php echo $search;?>"</h1>
                            <div id="bysearch" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <?php
                                                if($search_type=='students'){
                                                    ?>
                                                        <th width="200px">LRN</th>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                        <th width="200px">Teacher ID</th>
                                                    <?php
                                                }
                                            ?>
                                            <th>Name</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            $result_set=mysqli_query($con,$query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                ?>
                                                    <tr>
                                                        <?php
                                                            if($search_type=='students'){
                                                                ?>
                                                                    <td width="200px">
                                                                        <?php echo $row[8];?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript: view_id('<?php echo $row[0]; ?>')">
                                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                                        </a>
                                                                    </td>
                                                                <?php
                                                            }
                                                            else {
                                                                ?>
                                                                    <td width="200px">
                                                                        <?php echo $row[6];?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript: adviser('<?php echo $row[0]; ?>')">
                                                                            <?php echo $row[3].", ".$row[1]." ".$row[2]; ?>
                                                                        </a>
                                                                    </td>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr height="50px">
                                                    <td colspan="4">No result found!</td>
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