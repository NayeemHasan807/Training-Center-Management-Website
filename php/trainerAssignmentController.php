<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerAssignmentService.php');

	//save assignment
	if (isset($_POST['addassignment'])) 
	{
		$trainerassignment = strtolower($_FILES['trainerassignment']['name']);
		$marks = $_POST['marks'];
		$deadline = $_POST['deadline'];

		if (!empty($trainerassignment) and !empty($marks) and !empty($deadline)) 
		{
			if(!empty($_SESSION['userid']))
			{
				$userid = $_SESSION['userid'];
			}
			else
			{
				$userid = $_COOKIE['userid'];
			}
			
			$check=explode('.', $trainerassignment);
			foreach ($check as $last) 
			{
				continue;
			}
			if ($last=='pdf' or $last=='docx') 
			{
				if ($marks > '0' and $marks <= '50') 
				{
					$break=explode('/', $deadline);
					if($break['0'] >='1' and $break['0'] <= '31' and $break['1'] >='1' and $break['1'] <= '12' and $break['2'] >='2020' and $break['2'] <= '2021'  )
					{
						$filedirectory = '../assets/trainerassignment/'.time().'.'.$last;
						$count = getalltrainerassignmentcount();
						$saveassignment = [
							'id' => $count+1,
							'userid' => $userid,
							'filename' => $trainerassignment,
							'file' => $filedirectory,
							'marks' => $marks,
							'deadline' => $deadline
						];
						move_uploaded_file($_FILES['trainerassignment']['tmp_name'],$filedirectory);
						$status = insertassignment($saveassignment);
						if($status)
						{
							header('location: ../views/trainerViewAssignment.php?success=done');
						}
						else
						{
							header('location: ../views/trainerAddAssignment.php?error=db_error');
						}
					}
					else
					{
						header('location: ../views/trainerAddAssignment.php?error=deadline_error');
					}
				}
				else
				{
					header('location: ../views/trainerAddAssignment.php?error=marks_error');
				}
			}
			else
			{
				header('location: ../views/trainerAddAssignment.php?error=null_error');
			}
		}
		else
		{
			header('location: ../views/trainerAddAssignment.php?error=null_error');
		}
		
	}

	//update assignment
	if(isset($_POST['updateassignment']))
	{
		$id = $_POST['id'];
		$marks = $_POST['marks'];
		$deadline = $_POST['deadline'];

		if (!empty($marks) and !empty($deadline)) 
		{
			if ($marks > '0' and $marks < '100') 
			{
				$break=explode('/', $deadline);
				if($break['0'] >='1' and $break['0'] <= '31' and $break['1'] >='1' and $break['1'] <= '12' and $break['2'] >='2020' and $break['2'] <= '2021'  )
				{
					$updateassignment = [
						'id' => $id,
						'marks' => $marks,
						'deadline' => $deadline
					];

					$status = updateassignment($updateassignment);
					if($status)
					{
						header('location: ../views/trainerViewAssignment.php?success=done');
					}
					else
					{
						header('location: ../views/trainerEditAssignment.php?id={$id}');
					}
				}
				else
				{
					header('location: ../views/trainerEditAssignment.php?id={$id}');
				}
			}
			else
			{
				header('location: ../views/trainerEditAssignment.php?id={$id}');
			}
		}
		else
		{
			header('location: ../views/trainerEditAssignment.php?id={$id}');
		}

	}

	// delete assignment
	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$file = $_POST['file'];
		$status = deleteassignment($id);

		if($status){
			unlink($file);
			header('location: ../views/trainerViewAssignment.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/trainerViewAssignment.php');
	}