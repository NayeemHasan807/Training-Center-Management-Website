<?php
	require_once('../db/db.php');
	
    function getpeeridbyid($towhom)
    {
    	$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from student where studentid='{$towhom}'";
		$result = mysqli_query($conn, $sql);
		$info = [];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($info, $row);
		}
		return $info;
    }

    function getallmailcount()
    {
    	$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from studentmail";
		$result = mysqli_query($conn, $sql);
		$mails = [];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($mails, $row);
		}
		return count($mails);
    }

    function insertmail($savemail)
    {
    	$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into studentmail values('{$savemail['id']}','{$savemail['userid']}','{$savemail['towhom']}','{$savemail['subject']}','{$savemail['body']}')";
		
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