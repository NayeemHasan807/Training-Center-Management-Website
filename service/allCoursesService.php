<?php
	require_once('../db/db.php');
	
    function allcourses()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from course";
		$result = mysqli_query($conn, $sql);
		$allcourses = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($allcourses, $row);
		}

		return $allcourses;
	}

?>