<?php
	require_once('../db/db.php');
	
    function getmarks($userid)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "select * from student where studentid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$student = mysqli_fetch_assoc($result);
		$sql1 = "select * from studentmarks where studentid='{$student['studentid']}'";
		$result1 = mysqli_query($conn, $sql1);
		$mark = [];

		while($row = mysqli_fetch_assoc($result1)){
			array_push($mark, $row);
		}

		return $mark;
	}

?>