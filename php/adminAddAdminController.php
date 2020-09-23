<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/adminCRUDService.php');


	//add admin as user
	if(isset($_POST['addadmin']))
	{
		$adminid = $_POST['adminid'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		if(empty($adminid) || empty($name) || empty($email) || empty($gender) || empty($dob))
		{
			header('location: ../views/adminAddAdmin.php?error=null_value');
		}
		else
		{
		 	$check=checkid($adminid);
		 	print_r($check);
			if (empty($check))
			{
				$saveadmins = [
					'adminid'=> $adminid,
					'name'=> $name,
					'email'=> $email,
					'gender'=> $gender,
					'dob' => $dob
				];
				$password = "123";
				$usertype = "Admin";

				$adduser = [
						'userid'=>$adminid,
						'password' => $password,
						'usertype' => $usertype
				];

				$status = insertintoadmins($saveadmins,$adduser);


				if($status){
					header('location: ../views/adminViewAllAdmin.php?success=done');
				}else{
					header('location: ../views/adminAddAdmin.php?error=db_error');
				}
			}
			else
			{
				header('location: ../views/adminAddAdmin.php?error=exist');
			}	
		}
	}

	//delete admin
	if(isset($_POST['yes'])){
		$adminid = $_POST['adminid'];
		$status = delete($adminid);

		if($status){
			header('location: ../views/adminViewAllAdmin.php?success=done');
		}
	}elseif(isset($_POST['no'])){
		header('location: ../views/adminViewAllAdmin.php');
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