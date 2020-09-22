<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerAttendanceService.php');

	//save attendance
	if (isset($_POST['addattendance'])) 
	{
		print_r($_POST);
		$trainerattendance = strtolower($_FILES['trainerattendance']['name']);
		$month = $_POST['month'];
		$year = $_POST['year'];

		if (!empty($trainerattendance) and !empty($month) and !empty($year)) 
		{
			if(!empty($_SESSION['userid']))
			{
				$userid = $_SESSION['userid'];
			}
			else
			{
				$userid = $_COOKIE['userid'];
			}
			
			$check=explode('.', $trainerattendance);
			foreach ($check as $last) 
			{
				continue;
			}
			if ($last=='xlsx') 
			{
				$filedirectory = '../assets/trainerattendance/'.time().'.'.$last;
				$count = getalltrainerattendancecount();
				$saveattendance = [
					'id' => $count+1,
					'userid' => $userid,
					'filename' => $trainerattendance,
					'file' => $filedirectory,
					'month' => $month,
					'year' => $year
				];
				
				move_uploaded_file($_FILES['trainerattendance']['tmp_name'],$filedirectory);
				$status = insertattendance($saveattendance);
				if($status)
				{
					header('location: ../views/trainerViewAttendance.php?success=done');
				}
				else
				{
					header('location: ../views/trainerAddAttendance.php?error=db_error');
				}
			}
			else
			{
				header('location: ../views/trainerAddAttendance.php?error=null_error');
			}
		}
		else
		{
			header('location: ../views/trainerAddAttendance.php?error=null_error');
		}
		
	}

	//update attendance
	if(isset($_POST['updateattendance']))
	{
		$id = $_POST['id'];
		$month = $_POST['month'];
		$year = $_POST['year'];

		if (!empty($month) and !empty($year)) 
		{
			$updateattendance = [
				'id' => $id,
				'month' => $month,
				'year' => $year
			];

			$status = updateattendance($updateattendance);
			if($status)
			{
				header('location: ../views/trainerViewattendance.php?success=done');
			}
			else
			{
				header('location: ../views/trainerEditattendance.php?id={$id}');
			}
		}
		else
		{
			header('location: ../views/trainerEditattendance.php?id={$id}');
		}

	}

	// delete attendance
	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$file = $_POST['file'];
		$status = deleteattendance($id);

		if($status){
			unlink($file);
			header('location: ../views/trainerViewAttendance.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/trainerViewAttendance.php');
	}

?>