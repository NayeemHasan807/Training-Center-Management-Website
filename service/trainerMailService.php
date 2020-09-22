<?php
	require_once('../db/db.php');

	function getmailbyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainermail where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getallmailbyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainermail where trainerid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$mails = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($mails, $row);
		}

		return $mails;
	}

	function getalltrainermailcount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from trainermail";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}

	function insertmail($savemail)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into trainermail values('{$savemail['id']}','{$savemail['userid']}','{$savemail['towhom']}','{$savemail['mailsubject']}','{$savemail['mailbody']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updatemail($updatemail)
	{
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "update trainermail set mailsubject='{$updatemail['mailsubject']}',towhom='{$updatemail['towhom']}',mailbody='{$updatemail['mailbody']}' where id='{$updatemail['id']}'";

		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deletemail($id){
		$conn = dbConnection();
		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "delete from trainermail where id='$id'";

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