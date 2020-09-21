<?php

	if($_GET['error'] == 'invalid_request')
	{
		session_start();
		session_destroy();
		setcookie('userid',$_COOKIE['userid'],time()-10000,'/');
		setcookie('password',md5($_COOKIE['password']),time()-10000,'/');
		setcookie('usertype',$_COOKIE['usertype'],time()-10000,'/');
		setcookie('status','ok',time()-10000,'/');
		header('location: ../views/login.php?error=invalid_request');
	}
	else
	{
		session_start();
		session_destroy();
		setcookie('userid',$_COOKIE['userid'],time()-10000,'/');
		setcookie('password',md5($_COOKIE['password']),time()-10000,'/');
		setcookie('usertype',$_COOKIE['usertype'],time()-10000,'/');
		setcookie('status','ok',time()-10000,'/');
		header('location:../home.php');
	}
	

?>