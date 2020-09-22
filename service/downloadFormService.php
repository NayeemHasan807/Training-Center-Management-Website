<?php
	require_once('../db/db.php');
	
   	function getallformbyuserid($userid)
   	{
   		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}

		$sql = "select * from forms where towhom='Student'";
		$result = mysqli_query($conn, $sql);

		
		$forms = [];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($forms, $row);
		}
		return $forms;
   	}

?>