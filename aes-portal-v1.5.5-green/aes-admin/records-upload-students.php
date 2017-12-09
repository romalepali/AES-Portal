<!DOCTYPE html>
<?php
    include ('include/verify-admin.php');

    if(!isset($_GET['upload_new'])){
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
        $record_type = $_SESSION['type'];
        $section_id = $_SESSION['section_id'];
        $student_id = $_GET['upload_new'];
        
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
                        window.location.href='records-view-students.php?viewall_id='+id;
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
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="#" onclick="openNav1()">Account</a>
                    <a href="#" onclick="openNav2()">Dashboard</a>
                    <a href="#" onclick="openNav3()">Manage</a>
                    <a href="#" onclick="openNav4()">About</a>
                </div>
                <div id="mySidenav1" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
                    <a href="javascript: viewprof_id('<?php echo $_SESSION['user_id'];?>')">Profile</a>
                    <a href="#" onclick="openNav1_2()">Settings</a>
                    <a href="javascript: logout()">Log Out</a>
                </div>
                <div id="mySidenav1_2" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav1_2()">&times;</a>
                    <a href="javascript: updateuser_id('<?php echo $_SESSION['user_id']?>')">Change Username</a>
                    <a href="javascript: updatepass_id('<?php echo $_SESSION['user_id']?>')">Change Password</a>
                </div>
                <div id="mySidenav2" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
                    <a href="activities.php">Activities</a>
                    <a href="updates.php">Updates</a>
                </div>
                <div id="mySidenav3" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
                    <a href="#" onclick="openNav3_1()">Students</a>
                    <a href="#" onclick="openNav3_2()">Teachers</a>
                    <a href="#" onclick="openNav3_3()">Users</a><a href="#" onclick="openNav3_4()">Records</a>
                    <a href="#" onclick="openNav3_5()">Section</a>
                    <a href="#" onclick="openNav3_6()">Level</a>
                    <a href="#" onclick="openNav3_7()">Year</a>
                </div>
                <div id="mySidenav3_1" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3_1()">&times;</a>
                    <a href="students.php">Browse</a>
                    <a href="students-new.php">Add New</a>
                </div>
                <div id="mySidenav3_2" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3_2()">&times;</a>
                    <a href="teachers.php">Browse</a>
                    <a href="teachers-new.php">Add New</a>
                </div>
                <div id="mySidenav3_3" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3_3()">&times;</a>
                    <a href="users.php">Browse</a>
                    <a href="users-new.php">Add New</a>
                </div>
                <div id="mySidenav3_4" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3_4()">&times;</a>
                    <a href="records.php">Browse</a>
                    <a href="records-new.php">Add New</a>
                </div>
                <div id="mySidenav3_5" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3_5()">&times;</a>
                    <a href="section.php">Browse</a>
                    <a href="section-new.php">Add New</a>
                </div>
                <div id="mySidenav3_6" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3_6()">&times;</a>
                    <a href="level.php">Browse</a>
                    <a href="level-new.php">Add New</a>
                </div>
                <div id="mySidenav3_7" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3_7()">&times;</a>
                    <a href="year.php">Browse</a>
                    <a href="year-new.php">Add New</a>
                </div>
                <div id="mySidenav4" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav4()">&times;</a>
                    <a href="developers.php">Developers</a>
                    <a href="contacts.php">Contacts</a>
                </div>

                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <?php include ('include/header.php');?>    
                        <div class="main">
                            <h1 style="text-align:center;">Upload File</h1>
                            <div style="position relative; width:80%; margin:auto; margin-top:100px; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="position:relative; width:300px; padding:10px; margin:auto;">
                                        <input style="font-size:20px;" type="file" name="file"><br><br>
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