<?php
	session_start();
	
	if(!empty($_SESSION))
	{
		if(empty($_SESSION['usertype']))
		{
			header('location:logout.php?error=invalid_request');
		}
	}
	else
	{
		if(!isset($_COOKIE['status']))
		{
			header('location:logout.php?error=invalid_request');
		}
	}
?>