<?php
	require_once('../db/db.php');

	function getallclasstimedetailsbyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from course where trainerid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$details = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($details, $row);
		}

		return $details;
	}

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

?>