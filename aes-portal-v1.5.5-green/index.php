<!DOCTYPE html>
<?php
    include ('include/verify-notlogged.php');
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/loader.css">
        <link rel="shortcut icon" href="images/head_logo.png"/>
        <script src="js/loader.js"></script>
        <title>AES Archive Management System</title>
    </head>
    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:auto">
                        <?php include ('include/header.php');?>
                        <?php include ('include/intro-message.php');?>
                        <?php include ('include/recent-updates.php');?>
                    </div>
                    <?php include ('include/footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>