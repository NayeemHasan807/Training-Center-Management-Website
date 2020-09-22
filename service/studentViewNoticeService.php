<?php
	require_once('../db/db.php');
	
    function notice($userid)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from student where studentid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$student = mysqli_fetch_assoc($result);
		//print_r($student);
		$sql1 = "select * from course where courseid='{$student['courseid']}'";
		$result3 = mysqli_query($conn, $sql1);
		$course = mysqli_fetch_assoc($result3);
		//print_r($course);
		$sql2 = "select * from trainernotice where trainerid='{$course['trainerid']}'";
		$result2 = mysqli_query($conn, $sql2);
		//print_r($result2);
		$notice = [];

		while($row = mysqli_fetch_assoc($result2)){
			array_push($notice, $row);
		}

		return $notice;
	}

?>