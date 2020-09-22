<?php
	require_once('../db/db.php');
	
   	function getallcvfilecount()
   	{
   		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}
		$sql = "select * from applyforjob";
		$result = mysqli_query($conn, $sql);

		$values=0;

		while($row = mysqli_fetch_assoc($result))
		{
			$values=$row['id'];
			continue;
		}
		return $values;
   	}

   	function insertassignment($savecv)
   	{
   		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "insert into applyforjob values('{$savecv['id']}','{$savecv['userid']}','{$savecv['filename']}','{$savecv['file']}')";
		
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