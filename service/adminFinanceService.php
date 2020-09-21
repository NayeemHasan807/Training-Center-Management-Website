<?php
	require_once('../db/db.php');

	
	function getfinancebyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from finance where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getalladminfinancecount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from finance";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}


	function getallfinance()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from finance";
		$result = mysqli_query($conn, $sql);
		$finances = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($finances, $row);
		}

		return $finances;
	}


	function insertfinance($savefinance)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into finance values('{$savefinance['id']}','{$savefinance['month']}','{$savefinance['year']}','{$savefinance['trainerssalary']}','{$savefinance['studentfees']}')";
		
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