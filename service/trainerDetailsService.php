<?php
	require_once('../db/db.php');
	
    function trainerDetails()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT t.name as 'name', t.trainerid as 'trainerid', t.email as 'email', t.eduqualification as 'eduqualification', c.coursename as 'coursename' FROM `trainer` as t, course as c where t.trainerid = c.trainerid";
		$result = mysqli_query($conn, $sql);
		$trainer = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($trainer, $row);
		}

		return $trainer;
	}

?>