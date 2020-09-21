<?php
	require_once('../db/db.php');

	function getstudentmarksbyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from studentmarks where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function checkstudentid($studentid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from student where studentid = '{$studentid}'";
		$result = mysqli_query($conn, $sql);
		$info = [];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($info, $row);
		}
		return count($info);
	}

	function checkcoursename($coursename)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from course where coursename = '{$coursename}'";
		$result = mysqli_query($conn, $sql);
		$info = [];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($info, $row);
		}
		return count($info);
	}

	function checkexistance($studentid,$coursename)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from studentmarks where studentid='{$studentid}' and coursename= '{$coursename}'";
		$result = mysqli_query($conn, $sql);
		$info = [];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($info, $row);
		}
		return count($info);
	}

	function getallstudentmarkscount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from studentmarks";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}

	function getallstudentmarksbyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from studentmarks where trainerid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$mails = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($mails, $row);
		}

		return $mails;
	}

	function insertstudentmarks($savemarks)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into studentmarks values('{$savemarks['id']}','{$savemarks['userid']}','{$savemarks['studentid']}','{$savemarks['coursename']}','{$savemarks['marks']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updatestudentmarks($updatemarks)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "update studentmarks set studentid='{$updatemarks['studentid']}',coursename='{$updatemarks['coursename']}',marks='{$updatemarks['marks']}' where id='{$updatemarks['id']}'";

		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deletestudentmarks($id)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from studentmarks where id='$id'";

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