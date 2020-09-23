<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/courseCRUDService.php');


	//add course
	if(isset($_POST['addcourse']))
	{
		$courseid = $_POST['courseid'];
		$coursename = $_POST['coursename'];
		$trainerid = $_POST['trainerid'];
		$courseday = $_POST['courseday'];
		$coursetime = $_POST['coursetime'];
		$sitavailable = $_POST['sitavailable'];
		// print_r($courseid);
		// print_r($coursename);
		// print_r($trainerid);
		// print_r($courseday);
		// print_r($coursetime);
		// print_r($sitavailable);

		if(empty($courseid) || empty($coursename) || empty($courseday) || empty($coursetime) || empty($sitavailable))
		{
			header('location: ../views/adminAddCourse.php?error=null_value');
		}
		else
		{
		 	$check=checkid($courseid);
		 	print_r($check);
			if (empty($check))
			{
				$savecourses = [
					'courseid'=> $courseid,
					'coursename'=> $coursename,
					'trainerid'=> $trainerid,
					'courseday'=> $courseday,
					'coursetime' => $coursetime,
					'sitavailable' => $sitavailable
				];

				$status = insertintocourses($savecourses);


				if($status){
					header('location: ../views/adminViewAllCourse.php?success=done');
				}else{
					header('location: ../views/adminAddCourse.php?error=db_error');
				}
			}
			else
			{
				header('location: ../views/adminAddCourse.php?error=exist');
			}	
		}
	}

	//delete course
	if(isset($_POST['yes'])){
		$courseid = $_POST['courseid'];
		$status = deletecourse($courseid);

		if($status){
			header('location: ../views/adminViewAllCourse.php?success=done');
		}
	}elseif(isset($_POST['no'])){
		header('location: ../views/adminViewAllCourse.php');
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