<?php
	require_once('../db/db.php');

	function getattendancebyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from attendance where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getallattendancebyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from attendance where trainerid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$attendances = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($attendances, $row);
		}

		return $attendances;
	}

	function getalltrainerattendancecount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from attendance";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}

	function insertattendance($saveattendance)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into attendance values('{$saveattendance['id']}','{$saveattendance['userid']}','{$saveattendance['month']}','{$saveattendance['year']}' , '{$saveattendance['filename']}','{$saveattendance['file']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateattendance($updateattendance)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "update attendance set month='{$updateattendance['month']}',year='{$updateattendance['year']}' where id='{$updateattendance['id']}'";

		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deleteattendance($id){
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from attendance where id='$id'";

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