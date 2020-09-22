<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerAttendanceService.php');


	if(!empty($_SESSION))
	{
		if($_SESSION['usertype']!="Trainer")
		{
			header('location:../php/logout.php');
		}
	}
	else
	{
		if($_COOKIE['usertype']!="Trainer")
		{
			header('location:../php/logout.php');
		}
	}

	if (isset($_GET['id'])) {
		$attendance = getattendancebyid($_GET['id']);	
	}else{
		header('location: trainerViewAttendance.php');
	}

	// if (isset($_GET['error'])) {
		
	// 	if($_GET['error'] == 'db_error'){
	// 		echo "Something went wrong...please try again";
	// 	}
	// 	elseif ($_GET['error'] == 'null_error') {
	// 		echo "null submission...please try again";
	// 	}
	// }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trainer Edit attendance</title>
	<script type="text/javascript" src="../assets/js/trainerEditAttendance.js"></script>
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='trainerHome.php'><font color='red'>Home</font></a></li>
						<li><a href="viewProfileTrainer.php"><font color="red">View Profile</font></a></li>
						<li><a href="editProfileTrainer.php"><font color="red">Edit Profile</font></a></li>
						<li><a href="changePassword.php"><font color="red">Change Password</font></a></li>
						<li><a href="trainerFile.php"><font color="red">Files</font></a></li>
						<li><a href="trainerNotice.php"><font color="red">Notices</font></a></li>
						<li><a href="studentMarks.php"><font color="red">Student Marks</font></a></li>
						<li><a href="trainerMail.php"><font color="red">Mails</font></a></li>
						<li><a href="trainerAssignment.php"><font color="red">Assignments</font></a></li>
						<li><a href="trainerViewClasstime.php"><font color="red">View Class Times</font></a></li>
						<li><a href="trainerAttendance.php"><font color="red">Upload Attendance</font></a></li>
						<li><a href="../php/logout.php"><font color="red">Logout</font></a></li>
					</ul>
				</td>
				<td>
					<form action="../php/trainerAttendanceController.php" method="POST" id="myform" onsubmit="return validate()">
						<table>
							<tr>
								<td>attendance Name</td>
								<td>:</td>
								<td><input type="text" name="attendancename" value="<?=$attendance['filename']?>" disabled></td>
							</tr>
							<tr>
								<td>Month</td>
								<td>:</td>
								<td>
									<select id="month" name="month" onclick="click2()">
										<option value="">None</option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</td>
								<td id="show2"></td>
							</tr>
							<tr>
								<td>Year</td>
								<td>:</td>
								<td>
									<select id="year" name="year" onclick="click3()">
										<option value="">None</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
									</select>
								</td>
								<td id="show3"></td>
							</tr>
							<tr>
								<td colspan="4">
									<a href="trainerViewAttendance.php">
										<button type="button">
											Back
										</button>
									</a>
									<input type="hidden" name="id" value="<?=$attendance['id']?>">
									<input type="submit" name="updateattendance">
									<input type="reset" name="reset" onclick="click2(),click3()">
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>