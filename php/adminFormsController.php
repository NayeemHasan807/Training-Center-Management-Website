<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/adminFormsService.php');

	//save file
	if (isset($_POST['addforms'])) 
	{
		$adminforms = strtolower($_FILES['adminforms']['name']);
		$towhom = $_POST['towhom'];
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		$check=explode('.', $adminforms);
		foreach ($check as $last) 
		{
			continue;
		}
		if ($last=='docx') 
		{
			$filedirectory = '../assets/adminforms/'.time().'.'.$last;
			$count = getalladminformscount();
			$saveforms = [
				'id' => $count+1,
				'userid' => $userid,
				'formsname' => $adminforms,
				'forms' => $filedirectory,
				'towhom' => $towhom

			];
			move_uploaded_file($_FILES['adminforms']['tmp_name'],$filedirectory);
			$status = insertforms($saveforms);
			if($status)
			{
				header('location: ../views/adminAddForms.php?success=done');
			}
			else
			{
				header('location: ../views/adminAddForms.php?error=db_error');
			}
		}
		else
		{
			header('location: ../views/adminAddForms.php?error=null_error');
		}
	}

?>