<?php
	require_once('../db/db.php');	


	function gettrainerdetails($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainer where trainerid='{$userid}'";
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

		$sql = "update trainer set name='{$update['name']}',email='{$update['email']}',gender='{$update['gender']}',dob='{$update['dob']}',phoneno='{$update['phoneno']}',address='{$update['address']}' where trainerid='{$update['trainerid']}'";

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