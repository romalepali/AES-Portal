<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(isset($_POST['addbtn']))
    {
        $section_description = $_POST['section_description'];
        $teacher_id = $_POST['teacher_id'];
        $sy_id = $_POST['sy_id'];
        $level_id = $_POST['level_id'];

        $sql_query2="SELECT * FROM section WHERE BINARY section_description='$section_description' && teacher_id='$teacher_id' && sy_id='$sy_id' && level_id='$level_id'";
        $result_set2=mysqli_query($con,$sql_query2);
        $fetched_row2=mysqli_num_rows($result_set2);
    
        if($fetched_row2>0){
            ?>
                <script type="text/javascript">
                    alert('Student already exists!');
                </script>
            <?php
        }
        else{
            $sql_query = "INSERT INTO section (section_description, teacher_id, sy_id, level_id) VALUES ('$section_description','teacher_id','$sy_id','$level_id')";

            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully added a new section!');
                        window.location.href='section.php';
                    </script>
                <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error occured while adding a new section!');
                    </script>
                <?php
            }
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
        <title>Add New Section</title>
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
                            <h1 style="text-align:center;">Add New Student</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST">
                                    <b>Section</b>
                                    <input type="text" name="section_description" placeholder="enter section name"><br>
                                    
                                    <br><br><b>Adviser</b><br>
                                    <select name="teacher_id" value="">
                                        <option value="">Select</option>
                                        <?php
                                            $sql_query="SELECT lname, fname, mname FROM teachers";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    if($fetched_row['teacher_id']==$row[0]){
                                                        echo "<option value='$row[0]' checked required selected>".$row[0].","." ".$row[1].$row[2]."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$row[0]' required>".$row[0].","." ".$row[1]." ".$row[2]."</option>";
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

                                    <br><br><b>School Year</b><br>
                                    <select name="sy_id" value="">
                                        <option value="">Select</option>
                                        <?php
                                            $sql_query="SELECT sy_description FROM school_year";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    if($fetched_row['sy_id']==$row[0]){
                                                        echo "<option value='$row[0]' checked required selected>".$row[0]."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$row[0]' required>".$row[0]."</option>";
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

                                    <br><br><b>Level</b><br>
                                    <select name="level_id" value="">
                                        <option value="">Select</option>
                                        <?php
                                            $sql_query="SELECT level_description FROM level";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    if($fetched_row['level_id']==$row[0]){
                                                        echo "<option value='$row[0]' checked required selected>".$row[0]."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$row[0]' required>".$row[0]."</option>";
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
                                    <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:80px;"> 
                                        <button type="submit" name="addbtn" style="border:none; width: 150px; padding: 20px 0px; color:white; background-color:rgb(0, 100, 0);">Add</button>
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