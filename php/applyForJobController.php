<?php 
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/applyForJobService.php');

	//upload assignment
	if (isset($_POST['uploadcv'])) 
	{
		$cv = strtolower($_FILES['cv']['name']);
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		$check=explode('.', $cv);
		foreach ($check as $last) 
		{
			continue;
		}
		if ($last=='pdf' or $last=='docx') 
		{
			$filedirectory = '../assets/studentcv/'.time().'.'.$last;
			$count = getallcvfilecount();
			$savecv = [
				'id' => $count+1,
				'userid' => $userid,
				'filename' => $cv,
				'file' => $filedirectory
			];
			move_uploaded_file($_FILES['cv']['tmp_name'],$filedirectory);
			$status = insertassignment($savecv);
			if($status)
			{
				header('location: ../views/applyForJobHome.php?success=done');
			}
			else
			{
				header('location: ../views/applyForJobHome.php?error=db_error');
			}
		}
		else
		{
			header('location: ../views/applyForJobHome.php?error=file_error');
		}
	}