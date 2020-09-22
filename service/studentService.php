<?php
	require_once('../db/db.php');	

	function updateprofile($update)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "update student set name='{$update['name']}',email='{$update['email']}',gender='{$update['gender']}',dob='{$update['dob']}' where studentid='{$update['studentid']}'";

		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getstudentdetails($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from student where studentid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$info = mysqli_fetch_assoc($result);

		return $info;
	}
?>