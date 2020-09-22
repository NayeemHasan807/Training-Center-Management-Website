<?php 
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/assignmentService.php');

	//upload assignment
	if (isset($_POST['uploadassignment'])) 
	{
		$assignment = strtolower($_FILES['assignment']['name']);
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		$check=explode('.', $assignment);
		foreach ($check as $last) 
		{
			continue;
		}
		if ($last=='pdf' or $last=='docx') 
		{
			$filedirectory = '../assets/studentassignment/'.time().'.'.$last;
			$count = getallassignmentfilecount();
			$saveassignment = [
				'id' => $count+1,
				'userid' => $userid,
				'filename' => $assignment,
				'file' => $filedirectory
			];
			move_uploaded_file($_FILES['assignment']['tmp_name'],$filedirectory);
			$status = insertassignment($saveassignment);
			if($status)
			{
				header('location: ../views/studentUploadAssignment.php?success=done');
			}
			else
			{
				header('location: ../views/studentUploadAssignment.php?error=db_error');
			}
		}
		else
		{
			header('location: ../views/studentUploadAssignment.php?error=file_error');
		}
	}