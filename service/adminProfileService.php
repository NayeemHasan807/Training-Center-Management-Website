<?php
	require_once('../db/db.php');	


	function getadmindetails($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from admin where adminid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$details = mysqli_fetch_assoc($result);

		return $details;
	}

	
	function updateprofile($update)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "update admin set name='{$update['name']}',email='{$update['email']}',gender='{$update['gender']}',dob='{$update['dob']}' where adminid='{$update['adminid']}'";

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