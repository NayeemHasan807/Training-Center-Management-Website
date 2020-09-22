<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerNoticeService.php');


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

	if (isset($_GET['id'])) 
	{
		$notice = getnoticebyid($_GET['id']);	
	}
	else
	{
		header('location: trainerViewNotice.php');
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
	<title>Trainer Edit Notice</title>
	<script type="text/javascript" src="../assets/js/trainerEditNotice.js"></script>
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
					<form action="../php/trainerNoticeController.php" method="POST">
						Subject:<br/>
						<input type="text" name="noticesubject" id="noticesubject" name="noticesubject" onclick ="click1()" value="<?=$notice['noticesubject']?>"><br/>
						<div id="show1"></div>
						Body:<br/>
						<textarea rows="5" cols="80" id="noticebody" name="noticebody" onclick ="click2()">
							<?=$notice['noticebody']?>
						</textarea><br/>
						<div id="show2"></div>
						<a href="trainerViewNotice.php">
							<button type="button">
								Back
							</button>
						</a>
						<input type="hidden" id="id" name="id" value="<?=$notice['id']?>">
						<input type="button" id="updatenotice" name="updatenotice" value="Update" onclick="click1(),click2(),validate()">
						<div id="output"></div>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>