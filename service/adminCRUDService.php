<?php
	require_once('../db/db.php');
	
	function checkid($userid)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from user where userid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}
	
	function getadminbyid($adminid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from admin where adminid='{$adminid}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getalladmincount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from admin";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}


	function getalladmin()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from admin";
		$result = mysqli_query($conn, $sql);
		$admins = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($admins, $row);
		}
		return $admins;
	}


	function insertintoadmins($saveadmins,$adduser)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into admin values('{$saveadmins['adminid']}','{$saveadmins['name']}','{$saveadmins['email']}','{$saveadmins['gender']}','{$saveadmins['dob']}')";
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

	function delete($adminid)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from admin where adminid='$adminid'";
		$sql1 = "delete from user where userid='$adminid'";

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