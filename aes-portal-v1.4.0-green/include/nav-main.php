<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
        <script src="../js/nav2.js"></script>
        <script src="../js/logout.js"></script>
        <script src="js/nav1.js"></script>
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" onclick="openNav1()">Log In</a>
            <a href="signup.php">Sign Up</a>
        </div>
        <?php include ('include/login.php');?>
    </body>
</html>