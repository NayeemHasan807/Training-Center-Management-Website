<?php
	require_once('../db/db.php');
	
    function classRoutineTime($userid)
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
		$classRoutineTime = [];

		while($row = mysqli_fetch_assoc($result1)){
			array_push($classRoutineTime, $row);
		}

		return $classRoutineTime;
	}

?>