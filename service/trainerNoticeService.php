<?php
	require_once('../db/db.php');

	
	function getnoticebyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainernotice where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getalltrainernoticecount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainernotice";
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

		$sql = "select * from trainernotice where trainerid='{$userid}'";
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

		$sql = "insert into trainernotice values('{$savenotice['id']}','{$savenotice['userid']}','{$savenotice['noticesubject']}','{$savenotice['noticebody']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function updatenotice($updatenotice)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "update trainernotice set noticesubject='{$updatenotice['noticesubject']}',noticebody='{$updatenotice['noticebody']}' where id='{$updatenotice['id']}'";

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

		$sql = "delete from trainernotice where id='$id'";

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