<?php
	require_once('../db/db.php');

	function getassignmentbyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainerassignment where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getallassignmentbyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainerassignment where trainerid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$assignments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($assignments, $row);
		}

		return $assignments;
	}

	function getalltrainerassignmentcount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainerassignment";
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

		$sql = "insert into trainerassignment values('{$saveassignment['id']}','{$saveassignment['userid']}','{$saveassignment['filename']}','{$saveassignment['file']}','{$saveassignment['marks']}','{$saveassignment['deadline']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateassignment($updateassignment)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "update trainerassignment set marks='{$updateassignment['marks']}',deadline='{$updateassignment['deadline']}' where id='{$updateassignment['id']}'";

		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deleteassignment($id){
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from trainerassignment where id='$id'";

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