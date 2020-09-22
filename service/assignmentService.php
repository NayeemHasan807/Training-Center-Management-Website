<?php
	require_once('../db/db.php');
	
   	function getallassignmentbyuserid($userid)
   	{
   		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from student where studentid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$student = mysqli_fetch_assoc($result);
		$sql1 = "select * from course where courseid= '{$student['courseid']}'";
		$result1 = mysqli_query($conn, $sql1);
		$course = mysqli_fetch_assoc($result1);
		$sql2 = "select * from trainerassignment where trainerid='{$course['trainerid']}'";
		$result2 = mysqli_query($conn, $sql2);
		
		$assignments = [];

		while($row = mysqli_fetch_assoc($result2))
		{
			array_push($assignments, $row);
		}
		return $assignments;
   	}

   	function getallassignmentfilecount()
   	{
   		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}
		$sql = "select * from studentassignment";
		$result = mysqli_query($conn, $sql);

		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
   	}

   	function insertassignment($saveassignment)
   	{
   		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into studentassignment values('{$saveassignment['id']}','{$saveassignment['userid']}','{$saveassignment['filename']}','{$saveassignment['file']}')";
		
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