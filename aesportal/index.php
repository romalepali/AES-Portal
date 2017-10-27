<!DOCTYPE html>
<html>
<head>
	<title>AES Portal | Log In</title>
	<link rel="stylesheet" href="views/css/styles.css">
	<link rel="shortcut icon" href="views/images/head_logo.png" />
</head>

<script language="javascript" type="text/javascript">
  function fun_val()
  	{
  		var l=document.loginsell.username.value;
  		if(l=="")
  		{
  			alert("Please Enter User name");
  			document.loginsell.username.focus;
  			return false;
  		}

  		var p=document.loginsell.password.value;
  		if(p=="")
  		{
  			alert("Please Enter Password");
  			document.loginsell.password.focus;
  			return false;
  		}
  	}
  </script>

<body>
	<div id="container">
		<div id="cover">
			<span class="logo">
				<img src="views/images/logo.png" width="150px">
			</span>
		</div>

		<div id="contents">
			<div id="login">
				<form action="controller/session.php" method="post">
					<span class="usertext">Username</span>
					<input class="user" type="text" name="username" size="50" maxlength="32">
					<span class="passtext">Password</span>
					<input class="pass" type="password" name="password" size="50" maxlength="32">
					<input class="login_button" type="submit" name="gologin" value="Log In" onClick="return fun_val();">

					<span class="forgot">
						<a href="#">forgot your password</a>
					</span>
				</form>
			</div>
		</div>

		<div id="footer">
			AES Portal &copy 2017
		</div>
	</div>
</body>
</html>