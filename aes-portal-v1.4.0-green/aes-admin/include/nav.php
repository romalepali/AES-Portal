<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
        <script src="../js/nav2.js"></script>
        <script src="../js/logout.js"></script>
    </head>
    <body>
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
            <a href="javascript: updateuser_id('<?php echo $_SESSION['user_id'];?>')">Change Username</a>
            <a href="javascript: updatepass_id('<?php echo $_SESSION['user_id'];?>')">Change Password</a>
        </div>
        <div id="mySidenav2" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
            <a href="activities.php">Activities</a>
            <a href="#" onclick="openNav2_2()">Updates</a>
        </div>
        <div id="mySidenav2_2" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2_2()">&times;</a>
            <a href="updates.php">Browse</a>
            <a href="updates-new.php">Add New</a>
        </div>
        <div id="mySidenav3" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
            <a href="#" onclick="openNav3_1()">Students</a>
            <a href="#" onclick="openNav3_2()">Teachers</a>
            <a href="#" onclick="openNav3_3()">Users</a>
            <a href="#" onclick="openNav3_4()">Records</a>
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
            <a href="about.php">AES Portal</a>
            <a href="developers.php">Developers</a>
            <a href="contacts.php">Contacts</a>
        </div>
    </body>
</html>