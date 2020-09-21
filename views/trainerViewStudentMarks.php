<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerStudentMarksService.php');

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
?>

<!DOCTYPE html>
<html>
<head>
	<title>View All Added Marks</title>
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='ViewProfile.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='ViewProfile.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='trainerHome.php'><font color='red'>Home</font></a></li>
						<li><a href="viewProfile.php"><font color="red">View Profile</font></a></li>
						<li><a href="editProfile.php"><font color="red">Edit Profile</font></a></li>
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
				<td align="Center">
					<table border="1" width="100%" cellspacing="0" cellpadding="5">
						<tr>
							<td>Student Id</td>
							<td>Course Name</td>
							<td>Marks</td>
							<td>Action</td>
						</tr>

						<?php
							if (!empty($_SESSION['userid'])) 
							{
								$userid = $_SESSION['userid'];
							} 
							else
							{
								$userid = $_COOKIE['userid'];
							}
						?>
						<?php
							$marks = getallstudentmarksbyuserid($userid);
							for ($i=0; $i != count($marks); $i++)
							{
						?>
						<tr>
							<td><?=$marks[$i]['studentid']?></td>
							<td><?=$marks[$i]['coursename']?></td>
							<td><?=$marks[$i]['marks']?></td>
							<td>
								<a href="trainerEditStudentMarks.php?id=<?=$marks[$i]['id']?>">Edit</a> |
								<a href="trainerDeleteStudentMarks.php?id=<?=$marks[$i]['id']?>">Delete</a>
							</td>
						</tr>

						<?php 
							} 
						?>
						<tr>
							<td colspan="4" align="left">
								<a href="studentMarks.php">
									<button type="button">
										Back
									</button>
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>