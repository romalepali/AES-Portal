<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');
    
    if(!isset($_GET['upload_prof'])){
        header("location: index.php");
        exit;
    }

    if(isset($_POST['uploadbtn']))
    {
        $file = rand(1000,100000)."-".$_FILES['prof_pic']['name'];
        $file_loc = $_FILES['prof_pic']['tmp_name'];
        $file_size = $_FILES['prof_pic']['size'];
        $file_type = $_FILES['prof_pic']['type'];
        $folder="../uploads/";
        $teacher_id = $_GET['upload_prof'];
        
        // new file size in KB
        $new_size = $file_size/1024;  
        // new file size in KB
        
        // make file name in lower case
        $new_file_name = strtolower($file);
        // make file name in lower case
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file))
        {
            $sql="UPDATE teachers SET prof_pic='$final_file' WHERE teacher_id='$teacher_id'";
            mysqli_query($con,$sql);
            ?>
                <script>
                    alert('Successfully uploaded!');

                    function back(id){   
                        window.location.href='teachers-profile.php?view_id='+id;
                    }

                    back(<?php echo $teacher_id;?>);
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert('Error while uploading file!');
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
                                        <input style="font-size:20px;" type="file" name="prof_pic"><br><br>
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