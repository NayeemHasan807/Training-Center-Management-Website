<?php
	require_once('../db/db.php');

	function getfilebyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainerfile where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getallfilebyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainerfile where trainerid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$files = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($files, $row);
		}

		return $files;
	}

	function getalltrainerfilecount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainerfile";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}

	function insertfile($savefile)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into trainerfile values('{$savefile['id']}','{$savefile['userid']}','{$savefile['filename']}','{$savefile['file']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deletefile($id){
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from trainerfile where id='$id'";

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