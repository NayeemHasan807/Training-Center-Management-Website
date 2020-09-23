<?php
	require_once('../db/db.php');
	
	function checkid($trainerid)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from trainer where trainerid='{$trainerid}'";
		$result = mysqli_query($conn, $sql);
		$trainer = mysqli_fetch_assoc($result);

		return $trainer;
	}
	
	function gettrainerbyid($trainerid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainer where trainerid='{$trainerid}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getalltrainercount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainer";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}


	function getalltrainer()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainer";
		$result = mysqli_query($conn, $sql);
		$trainers = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($trainers, $row);
		}
		return $trainers;
	}


	function insertintotrainers($savetrainers,$adduser)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into trainer values('{$savetrainers['trainerid']}','{$savetrainers['name']}','{$savetrainers['email']}','{$savetrainers['gender']}','{$savetrainers['dob']}','{$savetrainers['phoneno']}','{$savetrainers['address']}','{$savetrainers['eduqualification']}')";
		$sql1 = "insert into user values('{$adduser['userid']}','{$adduser['password']}','{$adduser['usertype']}')";
		
		if(mysqli_query($conn, $sql))
		{
			if (mysqli_query($conn, $sql1)) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	function delete($trainerid)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from trainer where trainerid='$trainerid'";
		$sql1 = "delete from user where userid='$trainerid'";

		if(mysqli_query($conn, $sql))
		{
			if (mysqli_query($conn, $sql1)) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}		
	}

?>