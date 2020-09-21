<?php
	require_once('../db/db.php');

	function validate($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from user where userid='{$user['userid']}' and password='{$user['password']}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}

	function changepass($userid,$newpassword){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update `user` SET `password`='{$newpassword}' WHERE userid='{$userid}'";
		$result = mysqli_query($conn, $sql);

		return "done";
	}

?>