<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerFileService.php');

	//save file
	if (isset($_POST['addfile'])) 
	{
		$trainerfile = strtolower($_FILES['trainerfile']['name']);
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		$check=explode('.', $trainerfile);
		foreach ($check as $last) 
		{
			continue;
		}
		if ($last=='ppt' or $last=='pdf' or $last=='docx') 
		{
			$filedirectory = '../assets/trainerfile/'.time().'.'.$last;
			$count = getalltrainerfilecount();
			$savefile = [
				'id' => $count+1,
				'userid' => $userid,
				'filename' => $trainerfile,
				'file' => $filedirectory
			];
			move_uploaded_file($_FILES['trainerfile']['tmp_name'],$filedirectory);
			$status = insertfile($savefile);
			if($status)
			{
				header('location: ../views/trainerViewFile.php?success=done');
			}
			else
			{
				header('location: ../views/trainerAddFile.php?error=db_error');
			}
		}
		else
		{
			header('location: ../views/trainerAddFile.php?error=null_error');
		}
	}

	//delete file
	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$file = $_POST['file'];
		$status = deletefile($id);

		if($status){
			unlink($file);
			header('location: ../views/trainerViewFile.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/trainerViewFile.php');
	}