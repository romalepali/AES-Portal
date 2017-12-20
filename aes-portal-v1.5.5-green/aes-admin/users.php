<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if($_SESSION['user_type']=='Super Admin'){
        $active_query="SELECT count(status) FROM users WHERE status='Active' && user_type!='Super Admin'";
        $result_active=mysqli_query($con,$active_query);

        $inactive_query="SELECT count(status) FROM users WHERE status='Inactive' && user_type!='Super Admin'";
        $result_inactive=mysqli_query($con,$inactive_query);
    }else{
        $active_query="SELECT count(status) FROM users WHERE status='Active' && (user_type!='Super Admin' && user_type!='Admin')";
        $result_active=mysqli_query($con,$active_query);

        $inactive_query="SELECT count(status) FROM users WHERE status='Inactive' && (user_type!='Super Admin' && user_type!='Admin')";
        $result_inactive=mysqli_query($con,$inactive_query);
    }

    if(isset($_GET['deactivate_id']))
    {
        $sql_query="UPDATE users SET status='Inactive' WHERE user_id=".$_GET['deactivate_id'];
        mysqli_query($con,$sql_query);
        header("Location: users.php");
    }

    if(isset($_GET['activate_id']))
    {
        $sql_query="UPDATE users SET status='Active' WHERE user_id=".$_GET['activate_id'];
        mysqli_query($con,$sql_query);
        header("Location: users.php");
    }

    if(isset($_GET['delete_id']))
    {
        $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
        if(mysqli_query($con,$sql_query)){
            ?>
                <script type="text/javascript">
                    alert('Successfully deleted an user!');
                    window.location.href='users.php';
                </script>
            <?php
        }
        else{
            ?>
                <script type="text/javascript">
                    alert('Error occured while deleting an user!');
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
        <script src="../js/users-option.js"></script>
        <script src="../js/users-sort.js"></script>
        <title>Users</title>
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
                            <h1 style="text-align:center;">Browse Users</h1>
                            <div id="sortby" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="overflow:scroll; height:370px;">
                                    <a href="javascript: active()" style="text-decoration:none; color:white;">
                                        <div class="options">
                                            <?php
                                                if(mysqli_num_rows($result_active)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_active))
                                                    {
                                                        echo "Active [".$row[0]."]";
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </a>

                                    <a href="javascript: inactive()" style="text-decoration:none; color:white;">
                                        <div class="options">
                                            <?php
                                                if(mysqli_num_rows($result_inactive)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_inactive))
                                                    {
                                                        echo "Inactive [".$row[0]."]";
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div id="active" style="display:none; margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th width="175px">User Type</th>
                                            <th width="200px">Username</th>
                                            <th>Name</th>
                                            <th width="125px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            if($_SESSION['user_type']=='Super Admin'){
                                                $sql_query="SELECT * FROM users WHERE status='Active' && user_type!='Super Admin' GROUP BY user_id ASC";
                                                $result_set=mysqli_query($con,$sql_query);
                                                if(mysqli_num_rows($result_set)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_set))
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td width="175px">
                                                            <?php echo $row[1]; ?>
                                                        </td>
                                                        <td width="200px">
                                                            <?php echo $row[2]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row[6].", ".$row[4]." ".$row[5]; ?>
                                                        </td>
                                                        <td width="125px">
                                                            <a href="javascript: deactivate_id('<?php echo $row[0]; ?>')">deactivate</a>
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
                                            }
                                            else if($_SESSION['user_type']=='Admin'){
                                                $sql_query="SELECT * FROM users WHERE status='Active' && (user_type!='Super Admin' && user_type!='Admin') GROUP BY user_id ASC";
                                                $result_set=mysqli_query($con,$sql_query);
                                                if(mysqli_num_rows($result_set)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_set))
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td width="175px">
                                                            <?php echo $row[1]; ?>
                                                        </td>
                                                        <td width="200px">
                                                            <?php echo $row[2]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row[6].", ".$row[4]." ".$row[5]; ?>
                                                        </td>
                                                        <td width="125px">
                                                            <a href="javascript: deactivate_id('<?php echo $row[0]; ?>')">deactivate</a>
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
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: sortby('active')">back</button>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: add_new()">new</button>
                            </div>

                            <div id="inactive" style="display:none; margin: 20px auto; width:100%; padding:5px;">
                                <div style="width:98%; overflow:hide;">
                                    <table align="center">
                                        <tr>
                                            <th width="175px">User Type</th>
                                            <th width="200px">Username</th>
                                            <th>Name</th>
                                            <th width="200px">Option</th>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow:scroll; height:310px;">
                                    <table align="center">
                                        <?php
                                            if($_SESSION['user_type']=='Super Admin'){
                                                $sql_query="SELECT * FROM users WHERE status='Inactive' && user_type!='Super Admin' GROUP BY user_id ASC";
                                                $result_set=mysqli_query($con,$sql_query);
                                                if(mysqli_num_rows($result_set)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_set))
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td width="175px">
                                                            <?php echo $row[1]; ?>
                                                        </td>
                                                        <td width="200px">
                                                            <?php echo $row[2]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row[6].", ".$row[4]." ".$row[5]; ?>
                                                        </td>
                                                        <td width="125px">
                                                            <a href="javascript: activate_id('<?php echo $row[0]; ?>')">activate</a>
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
                                            }
                                            else if($_SESSION['user_type']=='Admin'){
                                                $sql_query="SELECT * FROM users WHERE status='Inactive' && (user_type!='Super Admin' && user_type!='Admin') GROUP BY user_id ASC";
                                                $result_set=mysqli_query($con,$sql_query);
                                                if(mysqli_num_rows($result_set)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_set))
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td width="175px">
                                                            <?php echo $row[1]; ?>
                                                        </td>
                                                        <td width="200px">
                                                            <?php echo $row[2]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row[6].", ".$row[4]." ".$row[5]; ?>
                                                        </td>
                                                        <td width="125px">
                                                            <a href="javascript: activate_id('<?php echo $row[0]; ?>')">activate</a>
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
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 100, 0); color:white; border:none" onclick="javascript: sortby('inactive')">back</button>
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