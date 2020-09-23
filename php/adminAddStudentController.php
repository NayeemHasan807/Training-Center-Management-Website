<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/studentCRUDService.php');


	//add student
	if(isset($_POST['addstudent']))
	{
		$studentid = $_POST['studentid'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$courseid = $_POST['courseid'];
		if(empty($studentid) || empty($name) || empty($email) || empty($gender) || empty($dob) || empty($courseid))
		{
			header('location: ../views/adminAddStudent.php?error=null_value');
		}
		else
		{
		 	$check=checkid($studentid);
		 	print_r($check);
			if (empty($check))
			{
				$savestudents = [
					'studentid'=> $studentid,
					'name'=> $name,
					'email'=> $email,
					'gender'=> $gender,
					'dob' => $dob,
					'courseid' => $courseid
				];

				$status = insertintostudents($savestudents);


				if($status){
					header('location: ../views/adminViewAllStudent.php?success=done');
				}else{
					header('location: ../views/adminAddStudent.php?error=db_error');
				}
			}
			else
			{
				header('location: ../views/adminAddStudent.php?error=exist');
			}	
		}
	}

	//delete course
	if(isset($_POST['yes'])){
		$studentid = $_POST['studentid'];
		$status = deletestudent($studentid);

		if($status){
			header('location: ../views/adminViewAllStudent.php?success=done');
		}
	}elseif(isset($_POST['no'])){
		header('location: ../views/adminViewAllStudent.php');
	}
	
	//update course
	if(isset($_POST['edit'])){

		$courseid 	    = $_POST['courseid'];
		$coursename     = $_POST['coursename'];
		$trainerid 	    = $_POST['trainerid'];
		$courseday   	= $_POST['courseday'];
		$coursetime 	= $_POST['coursetime'];
		$sitavailable   = $_POST['sitavailable'];

		if(empty($courseid) || empty($coursename) || empty($trainerid) || empty($courseday) || empty($coursetime) || empty($sitavailable)){
			header('location: ../views/adminEditCourse.php?id={$id}');
		}else{

			$course = [
				'courseid'=> $courseid,
				'coursename'=> $coursename,
				'trainerid'=> $trainerid,
				'courseday'=> $courseday,
				'coursetime' => $coursetime,
				'sitavailable' => $sitavailable
			];

			$status = update($course);

			if($status){
				header('location: ../views/adminViewAllCourse.php?success=done');
			}else{
				header('location: ../views/adminEditCourse.php?id={$id}');
			}
		}
	}

?>