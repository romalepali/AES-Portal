<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['update_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['update_id'])){
        $astud="SELECT a.*,b.* FROM records a INNER JOIN students b ON a.student_id=b.student_id WHERE a.record_id=".$_GET['update_id'];
        $result_astud=mysqli_query($con,$astud);
    }

    if(isset($_POST['updatebtn']))
    {
        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $folder="records/";
        $new_size = $file_size/1024;  
        $new_file_name = strtolower($file);        
        $final_file=str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($file_loc,$folder.$final_file)){
            $sql="UPDATE records SET file='$final_file',file_type='$file_type',file_size='$new_size' WHERE record_id=".$_GET['update_id'];
            if(mysqli_query($con,$sql)){
            ?>
                <script type="text/javascript">
                    alert('Successfully uploaded!');
                    function back(id){   
                        window.location.href='records-view-students.php?viewall_id='+id;
                    }
                    back(<?php echo $_SESSION['student_id'];?>);
                </script>
            <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error while uploading file!');
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
        <title>Upload File</title>
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
                            <h1 style="text-align:center;">
                                <?php
                                    if(mysqli_num_rows($result_astud)>0)
                                    {
                                        while($stud=mysqli_fetch_row($result_astud))
                                        {
                                            echo "Update ".$_SESSION['atype']."<br>".$stud[10].", ".$stud[8]." ".$stud[9];
                                        }
                                    }
                                ?>
                            </h1>
                            <div style="position relative; width:80%; margin:auto; margin-top:100px; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="position:relative; width:300px; padding:10px; margin:auto;">
                                        <input style="font-size:20px;" type="file" name="file" required><br><br>
                                    </div>
                                    <div style="position:relative; top:40px; width:150px; margin:auto; margin-bottom:120px; margin-top:50px;"> 
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