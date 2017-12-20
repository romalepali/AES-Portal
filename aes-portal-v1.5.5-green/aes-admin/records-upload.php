<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['upload_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['upload_id'])){
        $astud="SELECT a.* FROM students a WHERE a.student_id=".$_GET['upload_id'];
        $result_astud=mysqli_query($con,$astud);
    }

    if(isset($_POST['uploadbtn']))
    {
        if(isset($_SESSION['type'])){
            $record_type = $_SESSION['type'];
        }
        else{
            $record_type = $_POST['id'];
        }
        
        $section_id = $_POST['section_id'];
        $student_id = $_GET['upload_id'];

        $sql_query2="SELECT * FROM records WHERE record_type_id='$record_type' && section_id='$section_id' && student_id='$student_id'";
        $result_set2=mysqli_query($con,$sql_query2);
        $fetched_row2=mysqli_num_rows($result_set2);

        if($fetched_row2>0){
            ?>
                <script type="text/javascript">
                    alert('Record already exists, please use update to change it!');
                </script>
            <?php
        }
        else{
            $file = rand(1000,100000)."-".$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder="records/";
            $new_size = $file_size/1024;  
            $new_file_name = strtolower($file);        
            $final_file=str_replace(' ','-',$new_file_name);

            if(move_uploaded_file($file_loc,$folder.$final_file))
            {
                $sql="INSERT INTO records(record_type_id,student_id,section_id,file,file_type,file_size) VALUES('$record_type','$student_id','$section_id','$final_file','$file_type','$new_size')";
                mysqli_query($con,$sql);
                ?>
                    <script>
                        alert('Successfully uploaded!');
                        function back(id){   
                            window.location.href='students-profile.php?view_id='+id;
                        }
                        back(<?php echo $student_id;?>);
                    </script>
                <?php
                $_SESSION['atype']=NULL;
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
                                    if(isset($_SESSION['atype'])){   
                                        if(mysqli_num_rows($result_astud)>0)
                                        {
                                            while($stud=mysqli_fetch_row($result_astud))
                                            {
                                                echo "Upload ".$_SESSION['atype']."<br>".$stud[3].", ".$stud[1]." ".$stud[2];
                                            }
                                        }
                                    }
                                    else if(!isset($_SESSION['atype'])){
                                        if(mysqli_num_rows($result_astud)>0)
                                        {
                                            while($stud=mysqli_fetch_row($result_astud))
                                            {
                                                echo "Upload Record<br>".$stud[3].", ".$stud[1]." ".$stud[2];
                                            }
                                        }
                                    }
                                    else{
                                        if(mysqli_num_rows($result_astud)>0)
                                        {
                                            while($stud=mysqli_fetch_row($result_astud))
                                            {
                                                echo "Upload Record";
                                            }
                                        }
                                    }
                                ?>
                            </h1>
                            <div style="position relative; width:80%; margin:auto; margin-top:100px; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="position:relative; width:300px; padding:10px; margin:auto;">
                                        <input style="font-size:20px;" type="file" name="file" required><br><br>
                                    </div>
                                    <div style="position:relative; width:300px; padding:10px; margin:auto; text-align:center">
                                        <b>Section</b><br>
                                        <select name='section_id' required>
                                            <option value="">Select</option>
                                            <?php
                                                $sql_query="SELECT a.*,b.*,c.* FROM section a INNER JOIN school_year b ON a.sy_id=b.sy_id INNER JOIN level c ON a.level_id=c.level_id GROUP BY c.level_description,a.section_description,b.sy_description";
                                                $result_set=mysqli_query($con,$sql_query);
                                                
                                                if(mysqli_num_rows($result_set)>0)
                                                {
                                                    while($row=mysqli_fetch_row($result_set))
                                                    { 
                                                    ?>
                                                        <option value="<?php echo $row[0];?>"><?php echo $row[8]." - ".$row[1]." [".$row[6]."]";?></option>;
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
                                        <?php
                                            if(!isset($_SESSION['atype'])){
                                                ?>
                                                    <b>Record Type</b><br>
                                                    <select name='id' required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            $sql_query="SELECT a.* FROM record_type a GROUP BY a.type";
                                                            $result_set=mysqli_query($con,$sql_query);
                                                            
                                                            if(mysqli_num_rows($result_set)>0)
                                                            {
                                                                while($row=mysqli_fetch_row($result_set))
                                                                { 
                                                                ?>
                                                                    <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>;
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
                                                <?php
                                            }
                                        ?>          
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