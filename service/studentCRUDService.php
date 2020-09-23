<?php
	require_once('../db/db.php');
	
	function checkid($studentid)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from student where studentid='{$studentid}'";
		$result = mysqli_query($conn, $sql);
		$student = mysqli_fetch_assoc($result);

		return $student;
	}
	
	function getstudentbyid($studentid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from student where studentid='$studentid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getallstudentcount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from student";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}


	function getallstudent()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from student";
		$result = mysqli_query($conn, $sql);
		$students = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($students, $row);
		}
		return $students;
	}


	function insertintostudents($savestudents)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into student values('{$savestudents['studentid']}','{$savestudents['name']}','{$savestudents['email']}','{$savestudents['gender']}','{$savestudents['dob']}','{$savestudents['courseid']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deletestudent($studentid)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from student where studentid='$studentid'";

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