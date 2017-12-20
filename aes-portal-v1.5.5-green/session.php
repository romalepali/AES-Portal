<?php
	include ('connect.php');
	
	if(empty($_SESSION)){
		session_start();
	}

	if(!isset($_POST['submit']))
	{
		header("Location: index.php");    
		exit;  
	}

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$query="SELECT * FROM users WHERE BINARY username='$username' AND BINARY password='$password'";
	$result=mysqli_query($con, $query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_row($result)){
            $_SESSION['user_id']=$row[0];
			$_SESSION['user_type']=$row[1];
			$_SESSION['status']=$row[10];
		}

		if(($_SESSION['user_type']=='Super Admin') && $_SESSION['status']=='Active'){
			$message="You are logged as a Super Admin";
			$login = "INSERT INTO access (user_id,operation_date,operation) VALUES ('".$_SESSION['user_id']."',NOW(),'Log In')";
			mysqli_query($con,$login);
			echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script>window.location='aes-admin/';</script>";
        }
        else if(($_SESSION['user_type']=='Admin') && $_SESSION['status']=='Active'){
			$login = "INSERT INTO access (user_id,operation_date,operation) VALUES ('".$_SESSION['user_id']."',NOW(),'Log In')";
			mysqli_query($con,$login);

			$message="You are logged as an Admin";
			echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script>window.location='aes-admin/';</script>";
        }else if($_SESSION['user_type']=='Teacher' && $_SESSION['status']=='Active'){
			$message="You are logged as a Teacher";
			echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script>window.location='aes-teacher/';</script>";
        }else if ($_SESSION['user_type']=='Student' && $_SESSION['status']=='Active'){
			$message="You are logged as a Student";
			echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script>window.location='aes-student/';</script>";
        }else {
			$message="Please verify your account to the administrator";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>window.location='index.php';</script>";
		}
	}
	else
	{
		$message="Incorrect Username/Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>window.location='index.php';</script>";
	}
?>