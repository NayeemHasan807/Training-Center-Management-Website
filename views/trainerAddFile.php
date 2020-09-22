<?php

	require_once('../php/sessionAndCookieHeader.php');

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

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
		elseif ($_GET['error'] == 'null_error') {
			echo "null submission...please try again";
		}
		elseif ($_GET['error'] == 'too_long') {
			echo "Your uploaded file size is too long";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trainer Add File</title>
	<script type="text/javascript" src="../assets/js/trainerAddFile.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/trainerStyle.css">
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font >".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font >logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font >".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font >logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='trainerHome.php'><font >Home</font></a></li>
						<li><a href="viewProfileTrainer.php"><font >View Profile</font></a></li>
						<li><a href="editProfileTrainer.php"><font >Edit Profile</font></a></li>
						<li><a href="changePassword.php"><font >Change Password</font></a></li>
						<li><a href="trainerFile.php"><font >Files</font></a></li>
						<li><a href="trainerNotice.php"><font >Notices</font></a></li>
						<li><a href="studentMarks.php"><font >Student Marks</font></a></li>
						<li><a href="trainerMail.php"><font >Mails</font></a></li>
						<li><a href="trainerAssignment.php"><font >Assignments</font></a></li>
						<li><a href="trainerViewClasstime.php"><font >View Class Times</font></a></li>
						<li><a href="trainerAttendance.php"><font >Upload Attendance</font></a></li>
						<li><a href="../php/logout.php"><font >Logout</font></a></li>
					</ul>
				</td>
				<td>
					<form action="../php/trainerFileController.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
						<fieldset>
							<p align="Center"><font color="Orange">[Must need to be ppt,pdf or docx file]</font></p>
							<table cellspacing="0" cellpadding="10" border="0" align="Center">
								<tr>
									<td>
										Upload Class Lecture:	
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<input type="file" id="trainerfile" name="trainerfile" onclick="click1()">
									</td>
									<td id="show1"></td>
								</tr>
								<tr>
									<td>
										<a href="trainerFile.php">
											<button type="button">
												Back
											</button>
										</a>
										<input type="submit" name="addfile" value="Upload">
										<input type="reset" id="reset" name="reset" onclick="click1()">
									</td>
									<td></td>
								</tr>
							</table>
						</fieldset>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>