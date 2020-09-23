<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerCRUDService.php');


	//add trainer as user
	if(isset($_POST['addtrainer']))
	{
		$trainerid = $_POST['trainerid'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$phoneno = $_POST['phoneno'];
		$address = $_POST['address'];
		$eduqualification = $_POST['eduqualification'];

		if(empty($trainerid) || empty($name) || empty($email) || empty($gender) || empty($dob) || empty($phoneno) || empty($address) || empty($eduqualification))
		{
			header('location: ../views/adminAddTrainer.php?error=null_value');
		}
		else
		{
		 	$check=checkid($trainerid);
		 	print_r($check);
			if (empty($check))
			{
				$savetrainers = [
					'trainerid'=> $trainerid,
					'name'=> $name,
					'email'=> $email,
					'gender'=> $gender,
					'dob' => $dob,
					'phoneno'=> $phoneno,
					'address'=> $address,
					'eduqualification' => $eduqualification
				];
				$password = "123";
				$usertype = "Trainer";

				$adduser = [
						'userid'=>$trainerid,
						'password' => $password,
						'usertype' => $usertype
				];

				$status = insertintotrainers($savetrainers,$adduser);


				if($status){
					header('location: ../views/adminViewAllTrainer.php?success=done');
				}else{
					header('location: ../views/adminAddTrainer.php?error=db_error');
				}
			}
			else
			{
				header('location: ../views/adminAddTrainer.php?error=exist');
			}	
		}
	}

	//delete trainer
	if(isset($_POST['yes'])){
		$trainerid = $_POST['trainerid'];
		$status = delete($trainerid);

		if($status){
			header('location: ../views/adminViewAllTrainer.php?success=done');
		}
	}elseif(isset($_POST['no'])){
		header('location: ../views/adminViewAllTrainer.php');
	}
	
	//update user
	if(isset($_POST['edit'])){

		$username 	= $_POST['username'];
		$id 		= $_POST['id'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];

		if(empty($username) || empty($password) || empty($email) || empty($id)){
			header('location: ../views/edit.php?id={$id}');
		}else{

			$user = [
				'username'=> $username,
				'id'=> $id,
				'password'=> $password,
				'email'=> $email
			];

			$status = update($user);

			if($status){
				header('location: ../views/all_users.php?success=done');
			}else{
				header('location: ../views/edit.php?id={$id}');
			}
		}
	}

?>