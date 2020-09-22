<?php
	require_once('../db/db.php');
	
    function classDetailsForCourse($userid)
	{
		$conn = dbConnection();

		if(!$conn){
			
			echo "DB connection error";
		}

		$sql = "select * from student where studentid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$student = mysqli_fetch_assoc($result);
		$sql1 = "select * from course where courseid= '{$student['courseid']}'";
		$result1 = mysqli_query($conn, $sql1);
		$course = mysqli_fetch_assoc($result1);
		$sql2 = "select * from trainer where trainerid='{$course['trainerid']}'";
		$result2 = mysqli_query($conn, $sql2);
		$trainer = mysqli_fetch_assoc($result2);
		
		$data=[
			'courseid' =>$course['courseid'],
			'coursename' =>$course['coursename'],
			'trainerid' =>$trainer['trainerid'],
			'name' =>$trainer['name'],
			'sitavailable' =>$course['sitavailable']
		];

		return $data;
		
	}

?>