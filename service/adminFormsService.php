<?php
	require_once('../db/db.php');

	function getadminformsbyid($id)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from forms where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getallformsbyuserid($userid)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from forms where adminid='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$formss = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($formss, $row);
		}

		return $formss;
	}

	function getalladminformscount()
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from forms";
		$result = mysqli_query($conn, $sql);
		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
	}

	function insertforms($saveforms)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into forms values('{$saveforms['id']}','{$saveforms['userid']}','{$saveforms['formsname']}','{$saveforms['forms']}','{$saveforms['towhom']}')";
		
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