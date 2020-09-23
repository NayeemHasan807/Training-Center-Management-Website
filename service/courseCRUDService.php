<?php
	require_once('../db/db.php');
	
	function checkid($coureid)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from course where courseid='{$courseid}'";
		$result = mysqli_query($conn, $sql);
		$course = mysqli_fetch_assoc($result);

		return $course;
	}
	
	function getcoursebyid($courseid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from course where courseid='$courseid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getallcoursecount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from course";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}


	function getallcourse()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from course";
		$result = mysqli_query($conn, $sql);
		$courses = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($courses, $row);
		}
		return $courses;
	}


	function insertintocourses($savecourses)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into course values('{$savecourses['courseid']}','{$savecourses['coursename']}','{$savecourses['trainerid']}','{$savecourses['courseday']}','{$savecourses['coursetime']}','{$savecourses['sitavailable']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deletecourse($courseid)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from course where courseid='$courseid'";

		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}		
	}

?>