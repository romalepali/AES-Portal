<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['upload_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_POST['uploadbtn']))
    {
        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $folder="records/";
        $record_type = $_POST['record_type_id'];
        $section_id = $_SESSION['section_id'];
        $student_id = $_GET['upload_id'];
        
        // new file size in KB
        $new_size = $file_size/1024;  
        // new file size in KB
        
        // make file name in lower case
        $new_file_name = strtolower($file);
        // make file name in lower case
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file))
        {
            $sql="INSERT INTO records(record_type_id,student_id,section_id,file,file_type,file_size) VALUES('$record_type','$student_id','$section_id','$final_file','$file_type','$new_size')";
            mysqli_query($con,$sql);
            ?>
                <script>
                    alert('Successfully uploaded');
                    function back(id){   
                        window.location.href='students-profile.php?view_id='+id;
                    }

                    back(<?php echo $student_id;?>);
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert('Error while uploading file');
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
        <title>Upload File</title>
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
                            <h1 style="text-align:center;">Upload File</h1>
                            <div style="position relative; width:80%; margin:auto; margin-top:100px; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="position:relative; width:300px; padding:10px; margin:auto;">
                                        <input style="font-size:20px;" type="file" name="file" required><br><br>
                                    </div>
                                    <div style="position:relative; width:300px; padding:10px; margin:auto; text-align:center">
                                        <b>Record Type</b><br>
                                        <select name='record_type_id' required>
                                            <option name="record_type_id" value="">Select</option>
                                            <?php
                                                $sql_query="SELECT * FROM record_type GROUP BY type";
                                                $result_set=mysqli_query($con,$sql_query);
                                                
                                                if(mysqli_num_rows($result_set)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_set))
                                                    { 
                                                        echo "<option value='$row[0]'>".$row[1]."</option>";
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
                                    </div>
                                    <div style="position:relative; top:40px; width:150px; margin:auto; margin-bottom:120px; margin-top:50px;"> 
                                        <button type="submit" name="uploadbtn" style="border:none; width: 150px; padding: 20px 0px; color:white; background-color:rgb(0, 100, 0);">upload</button>
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