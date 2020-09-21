<?php

	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/userService.php');

	if(isset($_POST['login']))
	{
		$userid = $_POST['userid'];
		$password = $_POST['password'];

		if(empty($userid) || empty($password))
		{
			header('location: ../views/login.php?error=null_value');
		}
		else
		{
			$user = [
				'userid'=>$userid,
				'password'=>$password,
			];

			$user = validate($user);

			if(!empty($user))
			{
				if(isset($_POST['rememberme']))
				{
					setcookie('userid',$user['userid'],time()+10000,'/');
					setcookie('password',md5($user['password']),time()+10000,'/');
					setcookie('usertype',$user['usertype'],time()+10000,'/');
					setcookie('status','ok',time()+10000,'/');
					
					//print_r($_COOKIE);
					if ($user['usertype']=="Admin") 
					{
						header('location:../views/adminHome.php');
					}
					elseif ($user['usertype']=="Student") 
					{
						header('location:../views/studentHome.php');
					}
					else
						header('location:../views/trainerHome.php');
				}
				else
				{
					$_SESSION['userid']= $user['userid'];
					$_SESSION['password']= $user['password'];
					$_SESSION['usertype']= $user['usertype'];
					if ($user['usertype']=="Admin") 
					{
						header('location:../views/adminHome.php');
					}
					elseif ($user['usertype']=="Student") 
					{
						header('location:../views/studentHome.php');
					}
					else
						header('location:../views/trainerHome.php');
				}
			}
			else
			{
				header('location: ../views/login.php?error=invalid_user');
			}

		}

	}