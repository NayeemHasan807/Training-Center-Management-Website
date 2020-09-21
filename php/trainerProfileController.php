<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerProfileService.php');

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
		$phoneno=$_POST['phoneno'];
		$address=$_POST['address'];

		if(empty($name) or empty($email) or empty($dob) or empty($gender) or empty($phoneno) or empty($address))
		{
			header("location:../views/editProfileTrainer.php?error=null");
		}
		else
		{
			$update = [
				'trainerid' => $userid,
				'name' => $name,
				'email' => $email,
				'gender' => $gender,
				'dob' => $dob,
				'phoneno' => $phoneno,
				'address' => $address
			];

			$status = updateprofile($update);
			if($status)
			{
				header("location:../views/viewProfileTrainer.php");
			}
			else
			{
				header("location:../views/editProfileTrainer.php?error=db");
			}
		}
	}
?>