<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerService.php');


	//update profile
	if (isset($_POST['update'])) 
	{
		if (isset($_SESSION)) 
		{
			$trainerid=$_SESSION['userid'];
		}
		else
		{
			$trainerid=$_COOKIE['userid'];
		}
		
		$name=$_POST['name'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$phoneno=$_POST['phoneno'];
		$address=$_POST['address'];
		if (!empty($_POST['ssc']) and empty($_POST['hsc']) and empty($_POST['bsc'])) 
		{
			$ssc = $_POST['ssc'];
			$quelification=$ssc;
		}
		elseif(empty($_POST['ssc']) and !empty($_POST['hsc']) and empty($_POST['bsc']))
		{
			$hsc = $_POST['hsc'];
			$quelification=$hsc;
		}
		elseif(empty($_POST['ssc']) and empty($_POST['hsc']) and !empty($_POST['bsc']))
		{
			$bsc = $_POST['bsc'];
			$quelification=$bsc;
		}
		elseif(!empty($_POST['ssc']) and !empty($_POST['hsc']) and empty($_POST['bsc']))
		{
			$ssc = $_POST['ssc'];
			$hsc = $_POST['hsc'];
			$quelification=$ssc."/".$hsc;
		}
		elseif(!empty($_POST['ssc']) and empty($_POST['hsc']) and !empty($_POST['bsc']))
		{
			$ssc = $_POST['ssc'];
			$bsc = $_POST['bsc'];
			$quelification=$ssc."/".$bsc;
		}
		elseif(empty($_POST['ssc']) and !empty($_POST['hsc']) and !empty($_POST['bsc']))
		{
			$hsc = $_POST['hsc'];
			$bsc = $_POST['bsc'];
			$quelification=$hsc."/".$bsc;
		}
		else
		{
			$ssc = $_POST['ssc'];
			$hsc = $_POST['hsc'];
			$bsc = $_POST['bsc'];
			$quelification=$ssc."/".$hsc."/".$bsc;
		}

		if(empty($name) or empty($email) or empty($gender) or empty($dob) or empty($phoneno) or empty($address) or empty($quelification))
		{
			echo $trainerid;
			echo $name;
			echo $email;
			echo $gender;
			echo $dob;
			echo $phoneno;
			echo $address;
			echo $quelification;

			header("location:../views/editProfileTrainer.php?error=null");
		}
		else
		{
			$update = [
				'trainerid' => $trainerid,
				'name' => $name,
				'email' => $email,
				'gender' => $gender,
				'dob' => $dob,
				'phoneno' => $phoneno,
				'address' => $address,
				'eduqualification' => $quelification
			];

			$status = updateprofile($update);
			if($status)
			{
				header("location : ../views/viewProfileTrainer.php");
			}
			else
			{
				header("location:../views/editProfileTrainer.php?error=db");
			}
		}
	}
?>