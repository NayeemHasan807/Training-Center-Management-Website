<?php
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerStudentMarksService.php');

	//manual check for js validation
	// if (isset($_POST['studentid'])) 
	// {
	// 	$json = $_POST['studentid'];
	// 	$data = json_decode($json);
	// 	$studentid = $data->studentid;
	// 	//echo $studentid;
	// 	$check1 = checkstudentid($studentid);
	// 	if ($check1 == 1)
	// 	{
	// 		echo "found";
	// 	}
	// 	else
	// 	{
	// 		echo "this studentid is invalid";
	// 	}

	// }
	// if (isset($_POST['coursename'])) 
	// {
	// 	$json = $_POST['coursename'];
	// 	$data = json_decode($json);
	// 	$coursename = $data->coursename;
	// 	//echo "coursename";
	// 	$check2 = checkcoursename($coursename);
	// 	if ($check2 > 0) 
	// 	{
	// 		echo "found";
	// 	}
	// 	else
	// 	{
	// 		echo "this coursename is invalid";
	// 	}
	// }

	//save marks
	if (isset($_POST['addmarks'])) 
	{
		$json = $_POST['addmarks'];
		$data = json_decode($json);
		$studentid = $data->studentid;
		$coursename = $data->coursename;
		$marks = $data->marks;
		
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		if(empty($studentid) or empty($coursename) or empty($marks))
		{
			echo "Null Submission!";
		}
		else
		{
			$check1 = checkstudentid($studentid);
			if ($check1 == 1) 
			{
				$check2 = checkcoursename($coursename);
				if ($check2 > 0) 
				{
					$check3 = checkexistance($studentid,$coursename);
					if ($check3 != 1)
					{
						if ($marks >= 0 and $marks <= 100) 
						{
							$count = getallstudentmarkscount();
							$savemarks = [
								'id' => $count+1,
								'userid' => $userid,
								'studentid' => $studentid,
								'coursename' => $coursename,
								'marks' => $marks
							];

							$status = insertstudentmarks($savemarks);
							if($status)
							{
								echo "Marks added!";
							}
							else
							{
								echo "database error";
							}
						}
						else
						{
							echo "marks need to be in between 0-100!";
						}
					}
					else
					{
						echo "already added this marks";
					}
				}
				else
				{
					echo "this coursename is invalid";
				}
			}
			else
			{
				echo "this studentid is invalid";
			}			
		}
	}


	#update marks
	if (isset($_POST['updatemarks'])) 
	{
		$json = $_POST['updatemarks'];
		$data = json_decode($json);
		$id = $data->id;
		$studentid = $data->studentid;
		$coursename = $data->coursename;
		$marks = $data->marks;
		
		if(empty($studentid) or empty($coursename) or empty($marks))
		{
			header('location: ../views/trainerEditStudentMarks.php?id={$id}');
		}
		else
		{
			$check1 = checkstudentid($studentid);
			if ($check1 == 1) 
			{
				$check2 = checkcoursename($coursename);
				if ($check2 > 0) 
				{
					$check3 = checkexistance($studentid,$coursename);
					if ($check3 != 1)
					{
						if ($marks >= 0 and $marks <= 100) 
						{
							$updatemarks = [
								'id' => $id,
								'studentid' => $studentid,
								'coursename' => $coursename,
								'marks' => $marks
							];

							$status = updatestudentmarks($updatemarks);
							if($status)
							{
								echo "Marks Updated!";
							}
							else
							{
								echo "database error";
							}
						}
						else
						{
							echo "marks need to be in between 0-100!";
						}
					}
					else
					{
						$check4 = getstudentmarksbyid($id);
						if ($check4['marks'] != $marks ) 
						{
							if ($marks >= 0 and $marks <= 100) 
							{
								$updatemarks = [
									'id' => $id,
									'studentid' => $studentid,
									'coursename' => $coursename,
									'marks' => $marks
								];

								$status = updatestudentmarks($updatemarks);
								if($status)
								{
									echo "Marks Updated!";
								}
								else
								{
									echo "database error";
								}
							}
							else
							{
								echo "marks need to be in between 0-100!";;
							}
						}
						else
						{
							echo "You have already added this student marks";	
						}
					}
				}
				else
				{
					echo "this coursename is invalid";
				}
			}
			else
			{
				echo "this studentid is invalid";
			}			
		}
	}


	// delete marks
	if(isset($_POST['yes']))
	{
		$id = $_POST['id'];
		$status = deletestudentmarks($id);

		if($status)
		{
			header('location: ../views/trainerViewStudentMarks.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/trainerViewStudentMarks.php');
	}

?>