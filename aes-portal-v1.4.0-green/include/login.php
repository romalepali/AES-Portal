<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div id="mySidenav1" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
            <img width="125px;"src="images/aeslogo.png">
            <h1 style="color:white; text-align:center;">LOG IN</h1>
            <form style="color:white; margin: 0px 10px; text-align:center;" action="session.php" method="POST">
                Username
                <input type="text" name="username" placeholder="enter username" required><br><br>
                Password
                <input type="password" name="password" placeholder="enter password" required><br><br>
                <button style="border:none; padding: 10px; color:black; background-color:white;" name="submit">Log In</button>
            </form>
        </div>
    </body>
</html>