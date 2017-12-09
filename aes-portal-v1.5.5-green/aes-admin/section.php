<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_GET['delete_id']))
    {
        $sql_query="DELETE FROM section WHERE section_id=".$_GET['delete_id'];
        if(mysqli_query($con,$sql_query)){
            ?>
                <script type="text/javascript">
                    alert('Successfully delete the data!');
                    window.location.href='section.php';
                </script>
            <?php
        }
        else{
            ?>
                <script type="text/javascript">
                    alert('Error occured while deleting the data!');
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
        <script src="../js/section-option.js"></script>
        <title>Sections</title>
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
                            <h1 style="text-align:center;">Browse Sections</h1>
                            <div id="bysection" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th>Section Name</th>
                                            <th width="200px">Option</th>
                                            <th width="75px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            $sql_query="SELECT a.*,b.* FROM section a INNER JOIN school_year b ON a.sy_id=b.sy_id GROUP BY section_description,sy_description";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript: view_id('<?php echo $row[0]; ?>')">
                                                                    <?php echo $row[1]; ?>
                                                                </a>
                                                            </td>
                                                            <td width="200px">
                                                                <?php echo $row[6]; ?>
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