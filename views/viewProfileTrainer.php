<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerProfileService.php');

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
	<title>View Profile</title>
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>Logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>Logout</font></a></p>";
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
				<td>
					<table cellpadding="10" cellspacing="0" border="0">
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
							$details = gettrainerdetails($userid);
						?>
						<tr>
							<td>Trainer Id</td>
							<td>:</td>
							<td><?=$details['trainerid']?></td>
						</tr>
						<tr>
							<td>Trainer Name</td>
							<td>:</td>
							<td><?=$details['name']?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?=$details['email']?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td><?=$details['gender']?></td>
						</tr>
						<tr>
							<td>Date Of Birth</td>
							<td>:</td>
							<td><?=$details['dob']?></td>
						</tr>
						<tr>
							<td>Phone No</td>
							<td>:</td>
							<td><?=$details['phoneno']?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td><?=$details['address']?></td>
						</tr>
						<tr>
							<td>Qualification</td>
							<td>:</td>
							<td><?=$details['eduqualification']?></td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<a href="trainerHome.php">
									<button type="button">
										Back
									</button>
								</a>
							</td>
						</tr>
					</table>
					<hr/>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>