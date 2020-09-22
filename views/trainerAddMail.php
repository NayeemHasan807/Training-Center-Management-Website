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
	<title>Trainer Add Mail</title>
	<script type="text/javascript" src="../assets/js/trainerAddMail.js"></script>
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
						<input type="text" id="mailsubject" name="mailsubject" onclick ="click1()" onkeyup="validatesubject()"><br/>
						
						<div id="show1">
						</div>
						
						To:<br/>
						<select id="towhom" name="towhom" onclick="click2()">
				   			<option value="">None</option>
				   			<option value="Admin">Admin</option>
				   			<option value="Student">Student</option>
					   	</select><br/>
					   	
					   	<div id="show2">
						</div>
						
						Body:<br/>
						<textarea rows="5" cols="80" id="mailbody" name="mailbody" onclick ="click3()" onkeyup="validatebody()"></textarea><br/>
						
						<div id="show3">
						</div>
						
						<a href="trainerMail.php">
							<button type="button">
								Back
							</button>
						</a>
						<input type="button" id="addmail" name="addmail" value="Send" onclick="click1(),click2(),click3(),validate()">
						<input type="reset" name="reset" onclick="click1(),click2(),click3(),click4()">
						
						<div id="output">
						</div>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>