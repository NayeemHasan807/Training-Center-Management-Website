<?php
	require_once('../db/db.php');

	
	function getinformationsbyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from information where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getalladmininformationscount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from information";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}


	function getallinformationsbyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from information where adminid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$informations = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($informations, $row);
		}

		return $informations;
	}


	function insertinformations($saveinformations)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into information values('{$saveinformations['id']}','{$saveinformations['userid']}','{$saveinformations['informationname']}','{$saveinformations['informationbody']}')";
		
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