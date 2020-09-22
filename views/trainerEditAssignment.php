<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerAssignmentService.php');


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
		$assignment = getassignmentbyid($_GET['id']);	
	}else{
		header('location: trainerViewAssignment.php');
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
	<title>Trainer Edit Assignment</title>
	<script type="text/javascript" src="../assets/js/trainerEditAssignment.js"></script>
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
					<form action="../php/trainerAssignmentController.php" method="POST" id="myform" onsubmit="return validate()">
						<table>
							<tr>
								<td>Assignment Name</td>
								<td>:</td>
								<td><input type="text" name="assignmentname" value="<?=$assignment['filename']?>" disabled></td>
								<td></td>
							</tr>
							<tr>
								<td>Marks</td>
								<td>:</td>
								<td><input type="text" id="marks" name="marks" onclick="click2()" value="<?=$assignment['marks']?>"></td>
								<td id="show2"></td>
							</tr>
							<tr>
								<td>Deadline</td>
								<td>:</td>
								<td><input type="text" id="deadline" name="deadline" onclick="click3()" value="<?=$assignment['deadline']?>">  [dd/mm/yyyy]</td>
								<td id="show3"></td>
							</tr>
							<tr>
								<td colspan="4">
									<a href="trainerViewAssignment.php">
										<button type="button">
											Back
										</button>
									</a>
									<input type="hidden" name="id" value="<?=$assignment['id']?>">
									<input type="submit" id="updateassignment" name="updateassignment" value="Update">
									<input type="reset" name="reset" onclick="click1(),click2(),click3()">
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