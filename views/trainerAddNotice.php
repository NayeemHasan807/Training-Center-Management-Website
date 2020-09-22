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
	<title>Trainer Add Notice</title>
	<script type="text/javascript" src="../assets/js/trainerAddNotice.js"></script>
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
					<form id="myform">
						Subject:<br/>
						<input type="text" id="noticesubject" name="noticesubject" onclick ="click1()"><br/>
						<div id="show1"></div>
						Body:<br/>
						<textarea rows="5" cols="80" id="noticebody" name="noticebody" onclick ="click2()"></textarea><br/>
						<div id="show2"></div>
						<a href="trainerNotice.php">
							<button type="button">
								Back
							</button>
						</a>
						<input type="button" id="addnotice" name="addnotice" value="Send" onclick="validate()">
						<input type="reset" id="reset" name="reset" onclick="click1(),click2(),click3()">
						<div id="output"></div>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>