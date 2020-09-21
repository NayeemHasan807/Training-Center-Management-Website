<?php

	require_once('../php/sessionAndCookieHeader.php');

	if(!empty($_SESSION))
	{
		if($_SESSION['usertype']!="Student")
		{
			header('location:../php/logout.php');
		}
	}
	else
	{
		if($_COOKIE['usertype']!="Student")
		{
			header('location:../php/logout.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Home</title>
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileStudent.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>Logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileStudent.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>Logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='studentHome.php'><font color='red'>Home</font></a></li>
						<li><a href="viewProfileStudent.php"><font color="red">View Profile</font></a></li>
					    <li><a href="editProfileStudent.php"><font color="red">Edit Profile</font></a></li>
					    <li><a href="changePassword.php"><font color="red">Change Password</font></a></li>
					    <li><a href="trainerdetails.php"><font color="red">All Trainer Details</font></a></li>
					    <li><a href="classroutinetime.php"><font color="red">Class Routine Time</font></a></li>
					    <li><a href="classdetails.php"><font color="red">Class Details</font></a></li>
						<li><a href="allcourses.php"><font color="red">All Courses</font></a></li>
						<li><a href="studentAssignmentHome.php"><font color="red">Assignment</font></a></li>
						<li><a href="marks.php"><font color="red">Marks</font></a></li>
						<li><a href="downloadform.php"><font color="red">Download Form</font></a></li>
						<li><a href="sendMailToTrainer.php"><font color="red">Send Mail To Trainer</font></a></li>
						<li><a href="sendMailToPeer.php"><font color="red">Send mail To Peers</font></a></li>
						<li><a href="studentViewNotice.php"><font color="red">Notice</font></a></li>
						<li><a href="applyForJobHome.php"><font color="red">Apply For Job</font></a></li>
						<li><a href="ownInformation.php"><font color="red">Own Information</font></a></li>
						<li><a href="../php/logout.php"><font color="red">Logout</font></a></li>
					</ul>
				</td>
				<td>
					<?php
						if(!empty($_SESSION))
						{
							echo "<h1 align='center'><font color='black'>Welcome ".$_SESSION['userid']."</font></h1>";
						}
						else
							echo "<h1 align='center'><font color='black'>Welcome ".$_COOKIE['userid']."</font></h1>";
					?>	
					<p align="center"><font size="3" color='black'>To NSS Training Center Student Home</font></p>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>