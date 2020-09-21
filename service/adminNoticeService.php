<?php
	require_once('../db/db.php');

	
	function getnoticebyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from adminnotice where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getalladminnoticecount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from adminnotice";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}


	function getallnoticebyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from adminnotice where adminid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$notices = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($notices, $row);
		}

		return $notices;
	}


	function insertnotice($savenotice)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into adminnotice values('{$savenotice['id']}','{$savenotice['userid']}','{$savenotice['noticesubject']}','{$savenotice['noticebody']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deletenotice($id){
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from adminnotice where id='$id'";

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