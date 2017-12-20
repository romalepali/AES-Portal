<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['update_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['update_id']))
    {
        $sql_query="SELECT * FROM section WHERE section_id=".$_GET['update_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        $section_description = $_POST['section_description'];
        $teacher_id = $_POST['teacher_id'];
        $sy_id = $_POST['sy_id'];
        $level_id = $_POST['level_id'];

        $sql_query = "UPDATE section SET section_description='$section_description',teacher_id='$teacher_id',sy_id='$sy_id',level_id='$level_id' WHERE section_id=".$_GET['update_id'];

        if(mysqli_query($con,$sql_query))
        {
            ?>
                <script type="text/javascript">
                    alert('Successfully updated a section!');
                    function back(id){   
                        window.location.href='section-view.php?view_id='+id;
                    }
                    back(<?php echo $_GET['update_id']?>);
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while updating a section!');
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
        <title>Update Section</title>
    </head>

    <style>
        select {
            height: 30px;
            width: 100%;
        }
    </style>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <?php include ('include/header.php');?>    
                        <div class="main">
                            <h1 style="text-align:center;">Update Section</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                    <b>Section</b>
                                    <input type="text" name="section_description" placeholder="enter section name" value="<?php echo $fetched_row[1]; ?>"><br><br>
                                    <b>Level</b><br>
                                    <select name="level_id" required>
                                        <?php
                                            $sql_query="SELECT * FROM level";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    if($fetched_row['level_id']==$row[0]){
                                                        echo "<option value='$row[0]' selected>".$row[1]."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$row[0]'>".$row[1]."</option>";
                                                    }
                                                ?>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    Not Available
                                                <?php
                                            }
                                        ?>
                                    </select><br><br>

                                    <b>School Year</b><br>
                                    <select name="sy_id" required>
                                        <?php
                                            $sql_query="SELECT * FROM school_year GROUP BY sy_description";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    if($fetched_row['sy_id']==$row[0]){
                                                        echo "<option value='$row[0]' selected>".$row[1]."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$row[0]'>".$row[1]."</option>";
                                                    }
                                                ?>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    Not Available
                                                <?php
                                            }
                                        ?>
                                    </select>

                                    <br><br><b>Adviser</b><br>
                                    <select name="teacher_id" required>
                                        <?php
                                            $sql_query="SELECT lname,fname,mname,teacher_id FROM teachers";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    if($fetched_row['teacher_id']==$row[3]){
                                                        echo "<option value='$row[3]' selected>".$row[0].", ".$row[1]." ".$row[2]."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$row[3]'>".$row[0].", ".$row[1]." ".$row[2]."</option>";
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    Not Available
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:80px;"> 
                                        <button type="submit" name="updatebtn" style="border:none; width: 150px; padding: 20px 0px; color:white; background-color:rgb(0, 100, 0);">update</button>
                                    </div>
                                </form>
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