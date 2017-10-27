<?php
	session_start();

	$l=mysqli_connect("localhost","root","",'aesportal');

	$username=$_POST['username'];
	$password=$_POST['password'];
	$q="select * from user where username='$username' and password='$password'";
	$res=mysqli_query($l, $q);
	if(mysqli_num_rows($res)>0)
	{
	  $_SESSION['username']=$username;
		echo "<script>window.location='../views/records';</script>";
	}
	else
	{
		$message="Incorrect username/password found!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>window.location='../';</script>";
		echo"<script>close()</script>";
	}

?>