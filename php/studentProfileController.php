<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/studentService.php');

	if (isset($_POST['update'])) 
	{
		if (isset($_SESSION['userid'])) 
		{
			$userid=$_SESSION['userid'];
		}
		else
		{
			$userid=$_COOKIE['userid'];
		}
		
		$name=$_POST['name'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];

		if(empty($name) or empty($email) or empty($dob) or empty($gender))
		{
			header("location:../views/editProfileStudent.php?error=null");
		}
		else
		{
			$update = [
				'studentid' => $userid,
				'name' => $name,
				'email' => $email,
				'gender' => $gender,
				'dob' => $dob
			];

			$status = updateprofile($update);
			if($status)
			{
				header("location:../views/viewProfileStudent.php");
			}
			else
			{
				header("location:../views/editProfileStudent.php?error=db");
			}
		}
	}
?>